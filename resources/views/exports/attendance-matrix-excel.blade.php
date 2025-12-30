<table>
    <thead>
        <tr>
            <th colspan="{{ $daysInMonth + 1 }}" style="text-align: center;">LAPORAN ABSENSI SISWA</th>
        </tr>
        <tr>
            <th colspan="{{ $daysInMonth + 1 }}" style="text-align: center;">Periode: {{ $bulan }} | Tahun Ajaran: {{ $tahun_ajaran }}</th>
        </tr>
        <tr>
            <th colspan="{{ $daysInMonth + 1 }}">Kelas: {{ $kelas }} | Mata Pelajaran: {{ $mapel }}</th>
        </tr>
        <tr></tr>
        <tr>
            <th style="background-color: #f2f2f2; border: 1px solid #000000;">Nama Siswa</th>
            @for ($i = 1; $i <= $daysInMonth; $i++)
                <th style="background-color: #f2f2f2; border: 1px solid #000000; text-align: center;">{{ $i }}</th>
            @endfor
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
            <tr>
                <td style="border: 1px solid #000000;">{{ $student->nama }}</td>
                @for ($i = 1; $i <= $daysInMonth; $i++)
                    @php
                        $attendance = $attendanceMatrix[$student->id][$i][0] ?? null;
                        $status = '-';
                        if ($attendance) {
                            $status = match($attendance->status) {
                                'hadir' => 'H',
                                'izin' => 'I',
                                'sakit' => 'S',
                                'alpha' => 'A',
                                default => '-'
                            };
                        }
                    @endphp
                    <td style="border: 1px solid #000000; text-align: center;">{{ $status }}</td>
                @endfor
            </tr>
        @endforeach
    </tbody>
</table>
