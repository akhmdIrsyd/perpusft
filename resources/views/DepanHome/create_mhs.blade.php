<div class="modal fade" id="modalTambahmhs" tabindex="-1" aria-labelledby="modalTambahmhs" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--FORM TAMBAH BARANG-->
                <form action="/mahasiswa" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="">Nama Buku</label>
                        <input type="text" class="form-control" id="addnama_buku" name="addnama">
                    </div>
                    <div class="form-group">
                        <label for="">NIM</label>
                        <input type="text" class="form-control" id="addpenerbit" name="addNIM">
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
                    <div class="form-group">
                        <label for="">No. Telpon</label>
                        <input type="text" class="form-control" id="addno_hp" name="addno_hp">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" id="addemail" name="addemail">
                    </div>
                    <div class="form-group">
</br>
                        <button type="submit" class=" btn btn-primary">Simpan Data</button>
                    </div>
                </form>
                <!--END FORM TAMBAH BARANG-->
            </div>
        </div>
    </div>
</div>