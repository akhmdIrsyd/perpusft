<!DOCTYPE html>
<html>

<head>
    <title>Perpustakaan Fakultas Teknik</title>
</head>

<body>

    <h1>{{ $details['title'] }}</h1>

    <p>Hallo {{ $details['nama_mhs'] }} dengan NIM : {{ $details['nim'] }}</p>
    <p>{{ $details['body'] }}</p>
    <p>Kode pembelian anda: {{ $details['kode'] }}</p>
    <p>Nama Buku: {{ $details['nama'] }}</p>
    <p>Nama Penerbit: {{ $details['penerbit'] }}</p>
    <p>Nama Penulis: {{ $details['penulis'] }}</p>
    <p>Harga: {{ $details['harga'] }}</p>

    <p>Thank you</p>
</body>

</html>