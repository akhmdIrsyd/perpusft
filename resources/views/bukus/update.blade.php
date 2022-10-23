<div class="modal fade" id="modalUpdateBuku{{ $buku->id }}" tabindex="-1" aria-labelledby="modalUpdateBuku" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--FORM TAMBAH BARANG-->
                <form action="/buku/{{ $buku->id }}" method="post">
                    {{csrf_field()}}
                    @method('put')
                    <div class="form-group">
                        <label for="">Nama Buku</label>
                        <input type="text" class="form-control" id="update_buku" name="update_buku" value="{{ $buku->nama_buku}}">
                    </div>
                    <div class=" form-group">
                        <label for="">Nama Penerbit</label>
                        <input type="text" class="form-control" id="updatepenulis" name="updatepenulis" value="{{ $buku->penulis}}">
                    </div>
                    <div class=" form-group">
                        <label for="">Nama Penerbit</label>
                        <input type="text" class="form-control" id="updatepenerbit" name="updatepenerbit" value="{{ $buku->penerbit}}">
                    </div>
                    <div class=" form-group">
                        <label for="">Harga</label>
                        <input type="number" class="form-control" id="updateharga" name="updateharga" value="{{ $buku->harga}}">
                    </div>
                    <div class=" form-group">
                        <label for="">Exemplar</label>
                        <input type="number" class="form-control" id="updateexemplar" name="updateexemplar" value="{{ $buku->exemplar}}">
                    </div>
                    <div class=" form-group">

                        <label for="">Jurusan</label>
                        <select class="form-control" id="updateid_jurusan" name="updateid_jurusan" required focus>
                            <option value="" disabled selected>Pilih Jurusan</option>
                            @foreach($jurusans as $jurusan)
                            <option value="{{$jurusan->id}}" @if($buku->id_jurusan == $jurusan->id) selected @endif>{{ $jurusan->nama_jurusan }}</option>
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