<?php

namespace App\Livewire\Admin;

use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AttendanceMatrixExport;
use Livewire\Attributes\Layout;

class Dashboard extends Component
{
    use WithPagination;

    public $month;
    public $year;
    public $kelas_id;
    public $mapel_id;

    public function mount()
    {
        $this->month = now()->month;
        $this->year = now()->year;
    }

    public function exportExcel()
    {
        $this->validateFilters();

        $mapel = Mapel::find($this->mapel_id);
        $tahun_ajaran = $mapel->tahun_ajaran ?? '2024/2025';

        $bulan = Carbon::create($this->year, $this->month, 1)->format('Y-m');
        $filename = "Laporan-Absensi-{$this->month}-{$this->year}.xlsx";
        return Excel::download(new AttendanceMatrixExport($bulan, $this->kelas_id, $this->mapel_id, $tahun_ajaran), $filename);
    }

    public function exportPdf()
    {
        $this->validateFilters();

        $bulan_str = Carbon::create($this->year, $this->month, 1)->format('Y-m');
        $data = $this->getMatrixData($bulan_str);
        
        $pdf = Pdf::loadView('exports.attendance-matrix-pdf', [
            'data' => $data['attendance_matrix'],
            'students' => $data['students'],
            'days' => $data['days_in_month'],
            'bulan' => Carbon::create($this->year, $this->month, 1)->translatedFormat('F Y'),
            'kelas' => $this->kelas_id ? Kelas::find($this->kelas_id)->nama_kelas : 'Semua Kelas',
            'mapel' => $this->mapel_id ? Mapel::find($this->mapel_id)->nama_mapel : 'Semua Mapel',
            'tahun_ajaran' => $this->mapel_id ? Mapel::find($this->mapel_id)->tahun_ajaran : '2024/2025',
        ])->setPaper('a4', 'landscape');

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, "Laporan-Absensi-{$this->month}-{$this->year}.pdf");
    }

    protected function validateFilters()
    {
        $this->validate([
            'kelas_id' => 'required',
            'mapel_id' => 'required',
        ], [
            'kelas_id.required' => 'Pilih kelas terlebih dahulu untuk format matriks.',
            'mapel_id.required' => 'Pilih mata pelajaran terlebih dahulu untuk format matriks.',
        ]);
    }

    protected function getMatrixData($bulan)
    {
        $date = Carbon::parse($bulan);
        $daysInMonth = $date->daysInMonth;

        $students = Siswa::where('kelas_id', $this->kelas_id)
            ->orderBy('nama', 'asc')
            ->get();

        $attendances = Absensi::where('kelas_id', $this->kelas_id)
            ->where('mapel_id', $this->mapel_id)
            ->whereMonth('tanggal', $date->month)
            ->whereYear('tanggal', $date->year)
            ->get()
            ->groupBy(['siswa_id', function ($item) {
                return Carbon::parse($item->tanggal)->format('j');
            }]);

        return [
            'students' => $students,
            'days_in_month' => $daysInMonth,
            'attendance_matrix' => $attendances,
        ];
    }

    public function getReportData()
    {
        // Hanya tampilkan data jika kelas dan mapel sudah dipilih
        if (!$this->kelas_id || !$this->mapel_id) {
            return collect();
        }

        return Absensi::query()
            ->whereMonth('tanggal', $this->month)
            ->whereYear('tanggal', $this->year)
            ->where('kelas_id', $this->kelas_id)
            ->where('mapel_id', $this->mapel_id)
            ->with(['siswa', 'kelas', 'mapel'])
            ->orderBy('tanggal', 'asc')
            ->get()
            ->groupBy('tanggal');
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        Carbon::setLocale('id');

        $siswaCount = Siswa::query()
            ->when($this->kelas_id, fn($q) => $q->where('kelas_id', $this->kelas_id))
            ->when($this->mapel_id, fn($q) => $q->whereHas('mapels', fn($sq) => $sq->where('mapels.id', $this->mapel_id)))
            ->count();

        return view('livewire.admin.dashboard', [
            'totalGuru' => \App\Models\User::where('role', 'guru')->count(),
            'totalSiswa' => $siswaCount,
            'totalMapel' => Mapel::count(),
            'totalKelas' => Kelas::count(),
            'kelases' => Kelas::all(),
            'mapels' => Mapel::all(),
            'reportData' => $this->getReportData(),
            'months' => collect(range(1, 12))->map(fn($m) => [
                'val' => $m,
                'label' => Carbon::create()->month($m)->translatedFormat('F')
            ]),
            'years' => range(now()->year - 2, now()->year),
        ]);
    }
}
