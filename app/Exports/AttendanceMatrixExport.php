<?php

namespace App\Exports;

use App\Models\Absensi;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Mapel;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AttendanceMatrixExport implements FromView, ShouldAutoSize, WithStyles
{
    protected $bulan;
    protected $kelas_id;
    protected $mapel_id;
    protected $tahun_ajaran;

    public function __construct($bulan, $kelas_id, $mapel_id, $tahun_ajaran)
    {
        $this->bulan = $bulan;
        $this->kelas_id = $kelas_id;
        $this->mapel_id = $mapel_id;
        $this->tahun_ajaran = $tahun_ajaran;
    }

    public function view(): View
    {
        $date = Carbon::parse($this->bulan);
        $daysInMonth = $date->daysInMonth;

        $students = Siswa::where('kelas_id', $this->kelas_id)->orderBy('nama', 'asc')->get();
        
        $attendances = Absensi::where('kelas_id', $this->kelas_id)
            ->where('mapel_id', $this->mapel_id)
            ->whereMonth('tanggal', $date->month)
            ->whereYear('tanggal', $date->year)
            ->get()
            ->groupBy(['siswa_id', function ($item) {
                return Carbon::parse($item->tanggal)->format('j');
            }]);

        return view('exports.attendance-matrix-excel', [
            'students' => $students,
            'daysInMonth' => $daysInMonth,
            'attendanceMatrix' => $attendances,
            'bulan' => $date->translatedFormat('F Y'),
            'kelas' => Kelas::find($this->kelas_id)->nama_kelas ?? '-',
            'mapel' => Mapel::find($this->mapel_id)->nama_mapel ?? '-',
            'tahun_ajaran' => $this->tahun_ajaran,
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'size' => 14]],
            2 => ['font' => ['bold' => true]],
            3 => ['font' => ['bold' => true]],
            4 => ['font' => ['bold' => true]],
        ];
    }
}
