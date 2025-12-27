<!DOCTYPE html>
<html>
<head>
    <title>Laporan Absensi</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .header { text-align: center; margin-bottom: 20px; }
        .info { margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>LAPORAN ABSENSI SISWA</h2>
        <h3>Periode: {{ $month }} {{ $year }}</h3>
    </div>

    <div class="info">
        <p>Kelas: {{ $kelas }}</p>
        <p>Mata Pelajaran: {{ $mapel }}</p>
    </div>

    @foreach($data as $tanggal => $absensis)
        <div style="margin-top: 20px;">
            <div style="background-color: #f2f2f2; padding: 10px; border-left: 4px solid #333; margin-bottom: 10px;">
                <strong>Tanggal: {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}</strong>
            </div>
            <table>
                <thead>
                    <tr>
                        <th width="30%">Nama Siswa</th>
                        <th width="20%">Kelas</th>
                        <th width="15%">Status</th>
                        <th width="35%">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($absensis as $item)
                        <tr>
                            <td>{{ $item->siswa->nama ?? '-' }}</td>
                            <td>{{ $item->kelas->nama_kelas ?? '-' }}</td>
                            <td>{{ strtoupper($item->status) }}</td>
                            <td>{{ $item->keterangan ?: '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</body>
</html>
