<!DOCTYPE html>
<html>

<head>
    <title>Perpustakaan Fakultas Teknik</title>
</head>

<body>

    <h1>{{ $details['title'] }}</h1>

    <p>{{ $details['body'] }}</p>
    <p>Kode sumbangan anda: {{ $details['kode'] }}</p>
    <p>Nama Buku: {{ $details['nama'] }}</p>
    <p>Nama Penerbit: {{ $details['penerbit'] }}</p>
    <p>Nama Penulis: {{ $details['penulis'] }}</p>
    <p>Harga: {{ $details['harga'] }}</p>
    <p>Dengan daftar mahasiswa sebagai berikut :</p>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIM</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($answers as $answer)
            <tr>
                <td>{{ $answer['nama_mhs'] }}</td>
                <td>{{ $answer['nim'] }}</td>


            </tr>
        </tbody>
        @endforeach
        <table>
        <p>apabila telah membeli buku silahkan menghubungi Perpustakaan untuk diverifikasi</p>
            <p>Thank you</p>
</body>

</html>