<!DOCTYPE html>
<html>
<head>
    <title>Laporan Peminjaman</title>
</head>
<body>

<h2>Laporan Peminjaman Buku</h2>

<table border="1" width="100%" cellpadding="6" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Buku</th>
        <th>Tanggal Pinjam</th>
        <th>Status</th>
    </tr>

    @foreach($laporans as $laporan)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $laporan->user->name }}</td>
        <td>{{ $laporan->buku->judul }}</td>
        <td>{{ $laporan->tanggal_peminjaman }}</td>
        <td>{{ $laporan->status }}</td>
    </tr>
    @endforeach
</table>

</body>
</html>
