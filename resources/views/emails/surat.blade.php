@foreach ($Bookings as $booking)
<!DOCTYPE html>
<html>


<head>
    <title>Surat Bebas Pustaka</title>
    <style type="text/css">
        table {
            border-style: double;
            border-width: 3px;
            border-color: white;
        }

        table tr .text2 {
            text-align: right;
            font-size: 15px;
        }

        table tr .text {
            text-align: center;
            font-size: 15px;
        }

        table tr td {
            font-size: 15px;
        }

        .tab {
            display: inline-block;
            margin-left: 34px;
        }

        @media print {
            .pagebreak {
                page-break-before: always;
            }

            /* page-break-after works, as well */
        }
    </style>
</head>


<body>
    <div class="pagebreak">
        <center>
            <table>
                <tr>
                    <td><img src="{{ asset('img/Logo Unmul Universitas Mulawarman.png') }}" alt="Univ. mulawarman" width="90" height="90"></td>
                    <td>
                        <center>
                            <font size="4"><b>Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi</b></font><br>
                            <font size="4">Universitas Mulawarman</font><br>
                            <font size="4"><b>Fakultas Teknik</b></font><br>
                            <font size="2">Alamat : Jl. Kuaro, Gn. Kelua, Kec. Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75119</font><br>
                            <font size="2">Email: dekan@ft.unmul.ac.id, laman https://ft.unmul.ac.id/</font><br>
                            <font size="2">Email: fteknik.unmuk@ft.unmul.ac.id/</font><br>
                            <font size="2"><i>Telp. (0541) 749343 Fax. (0541) 749315</i></font>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <hr width="625">
                    </td>
                </tr>
                <table width="625">
                    <tr>
                        <td class="text2">Samarinda, {{ $date}} </td>
                    </tr>
                </table>
            </table>
            <table>
                <tr class="text2">
                    <td>Nomer</td>
                    <td width="572">: </td>
                </tr>
                <tr>
                    <td>Perihal</td>
                    <td width="564">: </td>
                </tr>
            </table>
            <br>
            <!-- Page level plugins 
        <table width="625">
            <tr>
                <td>
                    <font size="2">Kpd yth.<br>Siswa Smk Baitul Hikmah kelas x<br>Di tempat</font>
                </td>
            </tr>
        </table>
        -->
            <br>
            <table width="625">
                <tr>
                    <td>
                        <span class="tab"></span>
                        Kepala UPT Perpustakaan Fakultas Teknik Universitas Mulawarman Samarinda Menerangkan:
                    </td>
                </tr>
            </table>
            </table>
            <table width="627">
                <tr class="text2">
                    <td>Nama</td>
                    <td width="541">: <b>{{ $booking->nama_mhs }}</b></td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td width="525">: {{ $booking->nim }}</td>
                </tr>
                <tr>
                    <td width="100">Program Studi</td>
                    <td width="525">: {{ $booking->nama_jurusan }}</td>
                </tr>
            </table>
            <table width="627">
                <tr>
                    <td>
                        <span class="tab"></span>Bahwa yang bersangkutan telah bebas pustaka :<br>
                        1. Tidak sedang terkait perjanjian pengembalian buku.<br>
                        2. Tidak mempunyai tanggungan pinjaman buku atau inventaris perpustakaan.<br>
                        3. Telah menyumbang 1 buah buku

                    </td>
                </tr>
            </table>
            <table width="627">
                <tr class="text2">
                    <td width="100">Nama Buku</td>
                    <td width="541">: {{ $booking->nama_buku }}</td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td width="525">: {{ $booking->penerbit }}</td>
                </tr>
                <tr>
                    <td>Penulis</td>
                    <td width="525">: {{ $booking->penulis }}</td>
                </tr>
            </table>
            <br>
            <table width="627">
                <tr>
                    <td>
                        <span class="tab"></span>Demikian surat keterangan ini di Demikian surat keterangan ini di buat untuk dapat d buat untuk dapat dipergunkan sebagaimana dipergunkan sebagaimana mestinya.

                    </td>
                </tr>
            </table>

            <table width="625">
                <tr>
                    <td width="430"><br><br><br><br></td>
                    <td class="text" align="center">Kepala UPT Perpustakaan Fakultas Teknik,<br><br><br><br>Muahmmad Jarnih</td>
                </tr>
            </table>
        </center>
    </div>
    @endforeach
</body>

</html>

x