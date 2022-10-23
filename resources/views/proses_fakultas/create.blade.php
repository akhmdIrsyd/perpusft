@extends('templates')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Mahasiswa</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Mahasiswa</h6>
    </div>

    <div class="card-body">

        <form action="/proses/" method="post">
            @csrf
            @method('post')
            <div class="form-group">

                <label for="">Buku</label>
                <select class="form-control" id="addid_buku" name="addid_buku" required focus>
                    <option value="" disabled selected>Pilih Buku</option>
                    @foreach($bukus as $buku)
                    <option value="{{$buku->id}}">{{ $buku->nama_buku }}</option>
                    @endforeach
                </select>
            </div>
            Mahasiswa
            <p hidden>{{ $jml=$buku->orang }} </p>
            @if($jml<=1) {{$jml=1  }} @endif @for ($i=0; $i < $jml ; $i++) <div class="row">

                <div class="form-group col-md-3">
                    <label for="">Nama Mahasiswa</label>
                    <input type="text" class="form-control" id="addnama_buku" name="addnama[]">
                </div>
                <div class="form-group col-md-2">
                    <label for="">NIM</label>
                    <input type="text" class="form-control" id="addpenerbit" name="addNIM[]">
                </div>
                <div class="form-group col-md-2">

                    <label for="">Jurusan</label>
                    <select class="form-control" id="addid_jurusan" name="addid_jurusan[]" required focus>
                        <option value="" disabled selected>Pilih Jurusan</option>
                        @foreach($jurusans as $jurusan)
                        <option value="{{$jurusan->id}}">{{ $jurusan->nama_jurusan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="">No. Telpon</label>
                    <input type="text" class="form-control" id="addno_hp" name="addno_hp[]">
                </div>
                <div class="form-group col-md-3">
                    <label for="">Email</label>
                    <input type="email" class="form-control" id="addemail" name="addemail[]">
                </div>
    </div>
    @endfor
    <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>
    <!--END FORM UPDATE BARANG-->
</div>
</div>



@endsection

@section('extrajs')

<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection