<!DOCTYPE html>
<html>
<head>
    <title>Laporan Absensi</title>
    <style>
        body { font-family: sans-serif; font-size: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 4px; text-align: center; }
        th { background-color: #f2f2f2; }
        .header { text-align: center; margin-bottom: 20px; }
        .student-name { text-align: left; }
        .footer { margin-top: 20px; text-align: right; }
    </style>
</head>
<body>
    <div class="header">
        <h2>LAPORAN ABSENSI SISWA</h2>
        <p>Periode: {{ $bulan }} | Tahun Ajaran: {{ $tahun_ajaran }}</p>
        <p>Kelas: {{ $kelas }} | Mata Pelajaran: {{ $mapel }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 150px;">Nama Siswa</th>
                @for ($i = 1; $i <= $days; $i++)
                    <th>{{ $i }}</th>
                @endfor
                <th>H</th>
                <th>I</th>
                <th>S</th>
                <th>A</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                @php
                    $h = 0; $i_count = 0; $s = 0; $a = 0;
                @endphp
                <tr>
                    <td class="student-name">{{ $student->nama }}</td>
                    @for ($d = 1; $d <= $days; $d++)
                        @php
                            $attendance = $data[$student->id][$d][0] ?? null;
                            $status = '';
                            if ($attendance) {
                                switch($attendance->status) {
                                    case 'hadir': $status = 'H'; $h++; break;
                                    case 'izin': $status = 'I'; $i_count++; break;
                                    case 'sakit': $status = 'S'; $s++; break;
                                    case 'alpha': $status = 'A'; $a++; break;
                                }
                            }
                        @endphp
                        <td>{{ $status }}</td>
                    @endfor
                    <td>{{ $h > 0 ? $h : '' }}</td>
                    <td>{{ $i_count > 0 ? $i_count : '' }}</td>
                    <td>{{ $s > 0 ? $s : '' }}</td>
                    <td>{{ $a > 0 ? $a : '' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Keterangan: H=Hadir, I=Izin, S=Sakit, A=Alpha</p>
        <p>Dicetak pada: {{ now()->translatedFormat('d F Y H:i') }}</p>
    </div>
</body>
</html>
