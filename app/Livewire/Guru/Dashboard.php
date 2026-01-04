<?php

namespace App\Livewire\Guru;

use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Exports\AttendanceMatrixExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\Attributes\Layout;

class Dashboard extends Component
{
    #[Layout('components.layouts.guru')]
    public $kelas_id;
    public $mapel_id;
    public $tahun_ajaran;
    public $bulan;
    public $selected_attendance; // For modal keterangan

    public $search = '';
    
    // Attendance tracking
    public $attendance = []; // Format: ['siswa_id' => ['status' => 'hadir', 'keterangan' => '']]
    
    // Data list for filters
    public $list_kelas = [];
    public $list_mapel = [];
    public $list_tahun_ajaran = [];

    protected $queryString = [
        'kelas_id' => ['except' => ''],
        'mapel_id' => ['except' => ''],
        'tahun_ajaran' => ['except' => ''],
        'bulan' => ['except' => ''],
    ];

    public function mount()
    {
        $this->list_kelas = Kelas::all();
        $this->list_mapel = Mapel::all();
        
        $this->list_tahun_ajaran = Mapel::distinct()->pluck('tahun_ajaran')->filter()->values()->toArray();

        $this->bulan = $this->bulan ?: date('Y-m');
        $this->tahun_ajaran = $this->tahun_ajaran ?: ($this->list_tahun_ajaran[0] ?? '2024/2025');
        
        $this->loadTodayAttendance();
    }

    public function loadTodayAttendance()
    {
        if (!$this->kelas_id || !$this->mapel_id) {
            return;
        }

        $today = now()->format('Y-m-d');
        $existingAttendance = Absensi::where('kelas_id', $this->kelas_id)
            ->where('mapel_id', $this->mapel_id)
            ->where('guru_id', auth()->id())
            ->whereDate('tanggal', $today)
            ->get();

        foreach ($existingAttendance as $record) {
            $this->attendance[$record->siswa_id] = [
                'status' => $record->status,
                'keterangan' => $record->keterangan ?? '',
            ];
        }
    }

    public function updated($property)
    {
        // When filters change, reload attendance data
        if (in_array($property, ['kelas_id', 'mapel_id'])) {
            $this->attendance = [];
            $this->loadTodayAttendance();
        }
    }

    public function saveAttendance()
    {
        if (!$this->kelas_id || !$this->mapel_id) {
            session()->flash('error', 'Pilih kelas dan mata pelajaran terlebih dahulu!');
            return;
        }

        $today = now()->format('Y-m-d');
        $saved = 0;

        foreach ($this->attendance as $siswa_id => $data) {
            if (!isset($data['status'])) {
                continue;
            }

            Absensi::updateOrCreate(
                [
                    'siswa_id' => $siswa_id,
                    'kelas_id' => $this->kelas_id,
                    'mapel_id' => $this->mapel_id,
                    'tanggal' => $today,
                ],
                [
                    'guru_id' => auth()->id(),
                    'status' => $data['status'],
                    'keterangan' => $data['keterangan'] ?? null,
                ]
            );
            $saved++;
        }

        session()->flash('success', "Berhasil menyimpan absensi untuk {$saved} siswa!");
    }

    public function showKeterangan($attendanceId)
    {
        $this->selected_attendance = Absensi::with('siswa')->find($attendanceId);
        $this->dispatch('open-modal', 'keterangan-modal');
    }

    public function exportExcel()
    {
        $this->validateFilters();
        
        $filename = 'absensi_' . Carbon::parse($this->bulan)->format('M_Y') . '.xlsx';
        return Excel::download(new AttendanceMatrixExport($this->bulan, $this->kelas_id, $this->mapel_id, $this->tahun_ajaran), $filename);
    }

    public function exportPdf()
    {
        $this->validateFilters();

        $data = $this->getAttendanceData();
        $pdf = Pdf::loadView('exports.attendance-matrix-pdf', [
            'data' => $data['attendance_matrix'],
            'students' => $data['students'],
            'days' => $data['days_in_month'],
            'bulan' => Carbon::parse($this->bulan)->translatedFormat('F Y'),
            'kelas' => Kelas::find($this->kelas_id)->nama_kelas ?? '-',
            'mapel' => Mapel::find($this->mapel_id)->nama_mapel ?? '-',
            'tahun_ajaran' => $this->tahun_ajaran,
        ])->setPaper('a4', 'landscape');

        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->stream();
        }, 'absensi_' . Carbon::parse($this->bulan)->format('M_Y') . '.pdf');
    }

    protected function validateFilters()
    {
        $this->validate([
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'bulan' => 'required',
        ], [
            'kelas_id.required' => 'Silakan pilih kelas.',
            'mapel_id.required' => 'Silakan pilih mata pelajaran.',
            'bulan.required' => 'Silakan pilih bulan.',
        ]);
    }

    protected function getAttendanceData()
    {
        if (!$this->kelas_id || !$this->mapel_id || !$this->bulan) {
            return [
                'students' => [],
                'days_in_month' => 0,
                'attendance_matrix' => [],
            ];
        }

        $date = Carbon::parse($this->bulan);
        $daysInMonth = $date->daysInMonth;

        $students = Siswa::where('kelas_id', $this->kelas_id)
            ->where('nama', 'like', '%' . $this->search . '%')
            ->orderBy('nama', 'asc')
            ->get();

        $attendances = Absensi::where('kelas_id', $this->kelas_id)
            ->where('mapel_id', $this->mapel_id)
            ->whereMonth('tanggal', $date->month)
            ->whereYear('tanggal', $date->year)
            ->get()
            ->groupBy(['siswa_id', function ($item) {
                return Carbon::parse($item->tanggal)->format('j'); // Change to day of month
            }]);

        return [
            'students' => $students,
            'days_in_month' => $daysInMonth,
            'attendance_matrix' => $attendances,
        ];
    }

    public function render()
    {
        $data = $this->getAttendanceData();

        return view('livewire.guru.dashboard', [
            'students' => $data['students'],
            'daysInMonth' => $data['days_in_month'],
            'attendanceMatrix' => $data['attendance_matrix'],
            'currentMonth' => Carbon::parse($this->bulan),
            'kelases' => $this->list_kelas,
            'mapels' => $this->list_mapel,
            'tahunAjaranList' => $this->list_tahun_ajaran,
        ]);
    }
}
