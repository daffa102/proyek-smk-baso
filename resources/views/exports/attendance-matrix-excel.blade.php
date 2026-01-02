<table>
    <thead>
        <tr>
            <th colspan="{{ $daysInMonth + 6 }}" style="text-align: center;">LAPORAN ABSENSI SISWA</th>
        </tr>
        <tr>
            <th colspan="{{ $daysInMonth + 6 }}" style="text-align: center;">Periode: {{ $bulan }} | Tahun Ajaran: {{ $tahun_ajaran }}</th>
        </tr>
        <tr>
            <th colspan="{{ $daysInMonth + 6 }}">Kelas: {{ $kelas }} | Mata Pelajaran: {{ $mapel }}</th>
        </tr>
        <tr></tr>
        <tr>
            <th rowspan="2" style="background-color: #f2f2f2; border: 1px solid #000000; text-align: center; vertical-align: middle;">NO</th>
            <th rowspan="2" style="background-color: #f2f2f2; border: 1px solid #000000; vertical-align: middle;">Nama Siswa</th>
            <th colspan="{{ $daysInMonth }}" style="background-color: #f2f2f2; border: 1px solid #000000; text-align: center;">Bulan</th>
            <th colspan="4" style="background-color: #f2f2f2; border: 1px solid #000000; text-align: center;">Total</th>
        </tr>
        <tr>
            @for ($i = 1; $i <= $daysInMonth; $i++)
                <th style="background-color: #f2f2f2; border: 1px solid #000000; text-align: center;">{{ $i }}</th>
            @endfor
            <th style="background-color: #f2f2f2; border: 1px solid #000000; text-align: center;">H</th>
            <th style="background-color: #f2f2f2; border: 1px solid #000000; text-align: center;">S</th>
            <th style="background-color: #f2f2f2; border: 1px solid #000000; text-align: center;">I</th>
            <th style="background-color: #f2f2f2; border: 1px solid #000000; text-align: center;">A</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $index => $student)
            @php
                $h = 0; $s = 0; $i_count = 0; $a = 0;
            @endphp
            <tr>
                <td style="border: 1px solid #000000; text-align: center;">{{ $index + 1 }}</td>
                <td style="border: 1px solid #000000;">{{ $student->nama }}</td>
                @for ($d = 1; $d <= $daysInMonth; $d++)
                    @php
                        $attendance = $attendanceMatrix[$student->id][$d][0] ?? null;
                        $status = '-';
                        if ($attendance) {
                            $status = match($attendance->status) {
                                'hadir' => 'H',
                                'sakit' => 'S',
                                'izin' => 'I',
                                'alpha' => 'A',
                                default => '-'
                            };
                            
                            if($status == 'H') $h++;
                            if($status == 'S') $s++;
                            if($status == 'I') $i_count++;
                            if($status == 'A') $a++;
                        }
                    @endphp
                    <td style="border: 1px solid #000000; text-align: center;">{{ $status }}</td>
                @endfor
                <td style="border: 1px solid #000000; text-align: center;">{{ $h > 0 ? $h : '' }}</td>
                <td style="border: 1px solid #000000; text-align: center;">{{ $s > 0 ? $s : '' }}</td>
                <td style="border: 1px solid #000000; text-align: center;">{{ $i_count > 0 ? $i_count : '' }}</td>
                <td style="border: 1px solid #000000; text-align: center;">{{ $a > 0 ? $a : '' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
