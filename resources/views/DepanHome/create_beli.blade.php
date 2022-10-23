<!-- Modal Update Barang-->
<div class="modal fade" id="modalBeli{{ $buku->id }}" tabindex="-1" aria-labelledby="modalBeli" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--FORM UPDATE BARANG-->
                <form action="/" method="post">
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
                    <p hidden>{{ ($jml=$buku->orang) }} </p>
                    @if($jml<=1) <p hidden>{{$jml=1 }} </p>
                        @else
                        <p hidden>{{intval($jml) }} </p>
                        @endif


                        @for ($i=1; $i <= $jml ; $i++) <div class="row">

                            <div class="form-group col-md-3">
                                <label for="">Nama Mahasiswa</label>
                                <input type="text" class="form-control" id="addnama[]" name="addnama[]">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="">NIM</label>
                                <input type="text" class="form-control" id="addNIM[]" name="addNIM[]">
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
            @endfor
            <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
            <!--END FORM UPDATE BARANG-->
        </div>
    </div>
</div>
</div>
<!-- End Modal UPDATE Barang-->