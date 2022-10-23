<!-- Modal Update Barang-->
<div class="modal fade" id="modalUpdate{{ $mahasiswa->id }}" tabindex="-1" aria-labelledby="modalUpdateBuku" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--FORM UPDATE BARANG-->
                <form action="/mahasiswa/{{$mahasiswa->id}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Nama </label>
                        <input type="text" class="form-control" id="updatenama" name="updatenama" value="{{ $mahasiswa->nama_mhs}}">
                    </div>
                    <div class="form-group">
                        <label for="">NIM</label>
                        <input type="text" class="form-control" id="updatenim" name="updatenim" value="{{ $mahasiswa->nim}}">
                    </div>
                    <div class="form-group">
                        <label for="">Jurusan</label>
                        <select name="updateid_jurusan" class="form-control custom-select">
                            <option value="">Pilih Jurusan</option>
                            @foreach($jurusans as $jurusan)
                            <option value="{{ $jurusan->id }}" @if($jurusan->id == $mahasiswa->id_jurusan) selected @endif>{{ $jurusan->nama_jurusan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">No. Telpon</label>
                        <input type="text" class="form-control" id="updateno_hp" name="updateno_hp" value="{{ $mahasiswa->no_hp}}">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" id="updateemail" name="updateemail" value="{{ $mahasiswa->email}}">
                    </div>
                    <div class="form-group">

                        <label for="">Status</label>
                        <select class="form-control" id="updatestatus" name="updatestatus" required focus>
                            <option value="" disabled selected>Pilih Status</option>

                            <option value="1" @if ($mahasiswa->status == 1) selected @endif> Sudah</option>
                            <option value="0" @if ($mahasiswa->status == 0) selected @endif> Belum</option>

                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>
                <!--END FORM UPDATE BARANG-->
            </div>
        </div>
    </div>
</div>
<!-- End Modal UPDATE Barang-->