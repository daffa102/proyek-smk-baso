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

class Dashboard extends Component
{
    public $kelas_id;
    public $mapel_id;
    public $tahun_ajaran;
    public $bulan;
    public $selected_attendance; // For modal keterangan

    public $search = '';
    
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
        
        // Example static academic years, usually would come from a model or config
        $this->list_tahun_ajaran = [
            '2023/2024',
            '2024/2025',
            '2025/2026',
        ];

        $this->bulan = $this->bulan ?: date('Y-m');
        $this->tahun_ajaran = $this->tahun_ajaran ?: '2024/2025';
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
        ]);
    }
}
