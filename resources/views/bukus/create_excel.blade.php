<!-- Modal Update Barang-->
<div class="modal fade" id="ModalExcel" tabindex="-1" aria-labelledby="ModalExcel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--FORM UPDATE BARANG-->
                <form action="/ExportExcel" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    Silahkan ubah Header tabel menjadi nama_buku,id_jurusan penulis, penerbit, harga, jumlah_buku dan ubah format menjadi CSV.</br>
                    Ubah nama jurusan menjadi kode sesuai dengan petunjuk dibawah:</br>
                    Sistem Informasi = 2 </br>
                    Informatika = 3 </br>
                    Geologi = 4 </br>
                    Pertambangan = 5 </br>
                    Kimia = 6 </br>
                    Sipil = 7 </br>
                    Arsitektur = 8 </br>
                    Lingkungan = 9 </br>
                    Program Profesi Insinyur = 10 </br>
                    Elektro = 11 </br>
                    Industri = 12 </br>
                    </br>
                    <div class="form-group">

                        <label for=""><b>Excel</b></label>
                        <input type="file" class="form-control" id="nama_files" name="nama_files">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>
                <!--END FORM UPDATE BARANG-->
            </div>
        </div>
    </div>
</div>
<!-- End Modal UPDATE Barang-->