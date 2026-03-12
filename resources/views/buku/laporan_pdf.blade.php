<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Buku Perpustakaan</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #000; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #999; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; text-transform: uppercase; }
        .footer { margin-top: 30px; text-align: right; font-style: italic; }
    </style>
</head>
<body>
    <div class="header">
        <h2>LAPORAN DATA KOLEKSI BUKU</h2>
        <p>Perpustakaan Digital SMKN 11 Malang</p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th width="15%">Tahun Terbit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($buku as $key => $b)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $b->Judul }}</td>
                <td>{{ $b->Penulis }}</td>
                <td>{{ $b->Penerbit }}</td>
                <td>{{ $b->TahunTerbit }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Dicetak pada: {{ date('d/m/Y H:i') }}</p>
    </div>
</body>
</html>