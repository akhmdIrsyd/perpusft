<div class="modal fade" id="modalTambahBuku" tabindex="-1" aria-labelledby="modalTambahBuku" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--FORM TAMBAH BARANG-->
                <form action="/buku" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="">Nama Buku</label>
                        <input type="text" class="form-control" id="addnama_buku" name="addnama_buku">
                    </div>
                    <div class="form-group">
                        <label for="">Nama penulis</label>
                        <input type="text" class="form-control" id="addpenulis" name="addpenulis">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Penerbit</label>
                        <input type="text" class="form-control" id="addpenerbit" name="addpenerbit">
                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="number" class="form-control" id="addharga" name="addharga">
                    </div>
                    <div class="form-group">
                        <label for="">Exemplar</label>
                        <input type="number" class="form-control" id="addexemplar" name="addexemplar">
                    </div>
                    <div class="form-group">

                        <label for="">Jurusan</label>
                        <select class="form-control" id="addid_jurusan" name="addid_jurusan" required focus>
                            <option value="" disabled selected>Pilih Jurusan</option>
                            @foreach($jurusans as $jurusan)
                            <option value="{{$jurusan->id}}">{{ $jurusan->nama_jurusan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>
                <!--END FORM TAMBAH BARANG-->
            </div>
        </div>
    </div>
</div>