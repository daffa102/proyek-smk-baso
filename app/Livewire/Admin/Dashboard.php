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
use App\Exports\AttendanceExport;
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
        $filename = "Laporan-Absensi-{$this->month}-{$this->year}.xlsx";
        return Excel::download(new AttendanceExport($this->month, $this->year, $this->kelas_id, $this->mapel_id), $filename);
    }

    public function exportPdf()
    {
        $data = $this->getReportData();
        $pdf = Pdf::loadView('exports.attendance-pdf', [
            'data' => $data,
            'month' => Carbon::create()->month($this->month)->translatedFormat('F'),
            'year' => $this->year,
            'kelas' => $this->kelas_id ? Kelas::find($this->kelas_id)->nama_kelas : 'Semua Kelas',
            'mapel' => $this->mapel_id ? Mapel::find($this->mapel_id)->nama_mapel : 'Semua Mapel',
        ]);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, "Laporan-Absensi-{$this->month}-{$this->year}.pdf");
    }

    public function getReportData()
    {
        return Absensi::query()
            ->whereMonth('tanggal', $this->month)
            ->whereYear('tanggal', $this->year)
            ->when($this->kelas_id, fn($q) => $q->where('kelas_id', $this->kelas_id))
            ->when($this->mapel_id, fn($q) => $q->where('mapel_id', $this->mapel_id))
            ->with(['siswa', 'kelas', 'mapel'])
            ->orderBy('tanggal', 'asc')
            ->get()
            ->groupBy('tanggal');
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        Carbon::setLocale('id');
        return view('livewire.admin.dashboard', [
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
