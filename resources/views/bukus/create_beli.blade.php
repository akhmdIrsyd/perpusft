<!-- Modal Update Barang-->
<div class="modal fade" id="modalBeli{{ $buku->id }}" tabindex="-1" aria-labelledby="modalBeli" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Beli Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--FORM UPDATE BARANG-->
                <form action="/proses" method="post">
                    @csrf
                    @method('post')
                    <div class="form-group">

                        <label for="">Buku</label>
                        <select class="form-control" id="addid_buku" name="addid_buku" required focus>
                            <option value="{{$buku->id}}" selected>{{ $buku->nama_buku }}</option>

                        </select>
                        <input type="text" class="form-control" id="addnama_buku[]" name="addnama_buku[]" value="{{$buku->nama_buku }}" hidden>
                    </div>
                    Mahasiswa

                    <div class="row">

                        <div class="form-group col-md-3">

                            <label for="">Nama Mahasiswa</label>
                            <select class="form-control select2 " id=" addnama_buku" name="addnama[]" required>
                                <option value="" disabled selected>Pilih Mahasiswa</option>
                                @foreach($Mahasiswas_belum as $mhs)
                                <option value="{{$mhs->id}}">{{ $mhs->nim }}-{{ $mhs->nama_mhs }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <div {{ $errors->get('nim') ? 'has-error' : '' }}">
                                <label for="">NIM</label>
                                <input type="text" class="form-control" id="nim[]" name="nim[]">

                                @foreach($errors->get('nim') as $error)
                                <span class="help-block">{{ $error }}</span>
                                @endforeach

                            </div>
                        </div>
                        <div class="form-group col-md-2">

                            <label for="">Jurusan</label>
                            <select class="form-control" id="addid_jurusan[]" name="addid_jurusan[]" required focus>
                                <option value="" disabled selected>Pilih Jurusan</option>
                                @foreach($jurusans as $jurusan)
                                <option value="{{$jurusan->id}}">{{ $jurusan->nama_jurusan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="">No. Telpon</label>
                            <input type="text" class="form-control" id="addno_hp[]" name="addno_hp[]">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Email</label>
                            <input type="email" class="form-control" id="addemail[]" name="addemail[]">
                        </div>
                        <input type="number" class="form-control" id="addjumlah" name="addjumlah" value="{{ $buku->jumlah}}" hidden>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>
                <!--END FORM UPDATE BARANG-->
            </div>
        </div>
    </div>
</div>
<!-- End Modal UPDATE Barang-->
