<!-- Modal Update Barang-->
@extends('templates')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Mahasiswa</h1>
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Mahasiswa</h6>
    </div>

    <div class="card-body">
        <form action="/proses" method="post">
            @csrf
            @method('post')
            @foreach($bukus as $buku)
            <div class="form-group">

                <label for="">Buku</label>
                <select class="form-control" id="addid_buku" name="addid_buku" required focus>
                    <option value="{{$buku->id}}" selected>{{ $buku->nama_buku }}</option>

                </select>
                <input type="text" class="form-control" id="addnama_buku[]" name="addnama_buku[]" value="{{$buku->nama_buku }}" hidden>
                <p hidden>{{ $id=$buku->id }} </p>

            </div>
            <div class="form-group ">
                <label for="">Penulis</label>
                <input type="text" class="form-control" id="penulis[]" name="penulis[]" value="{{$buku->penulis }}" readonly>
            </div>
            <div class="form-group ">
                <label for="">Penerbit</label>
                <input type="text" class="form-control" id="penerbit[]" name="penerbit[]" value="{{$buku->penerbit }} " readonly>
            </div>
            <div class="form-group ">
                <label for="">Harga</label>
                <input type="text" class="form-control" id="harga[]" name="harga[]" value="{{$buku->harga }}" readonly>
            </div>
            @endforeach
            Mahasiswa
            <div class="navbar-nav float-end">
                <button class="add_field_button btn btn-sm btn-primary"><i class="mdi mdi-plus"></i> Tambah Kolom</button>
            </div>

            <div class="input_fields_wrap">

                <div class="form-group ">

                    <label for="nim">Nama Mahasiswa</label>
                    <select data-select2-id="$id" class="form-control zxc" id="nim[]" name="nim[]" required style="width:100%">
                        <option value="" selected>Pilih Mahasiswa</option>
                        @foreach($Mahasiswas_belum as $mhs)
                        <option value="{{$mhs->nim}}">{{ $mhs->nim }} - {{ $mhs->nama_mhs }}</option>
                        @endforeach
                    </select>


                </div>


            </div>
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
        <!--END FORM UPDATE BARANG-->
    </div>
</div>
<!-- End Modal UPDATE Barang-->
@endsection

@section('extrajs')

<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

<script type="text/javascript">
    // add row
    $(document).ready(function() {
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                let uid = Math.random().toString(16).slice(2);

                $(wrapper).append(`
                      <div class="row">
                        <div class="form-group col-md-11">
                        <label for="">Nama Mahasiswa</label>
                          <select data-select2-id=${uid}" class="form-control zxc" id="nim${uid}" name="nim[]" required style="height:100%">
                                    <option value="" selected>Pilih Mahasiswa</option>
                                    @foreach($Mahasiswas_belum as $mhs)
                                     <option value="{{$mhs->nim}}">{{ $mhs->nim }} - {{ $mhs->nama_mhs }}</option>

                                    @endforeach
                                </select>
                        </div>

                        <div class="form-group col-md-1">
                          <a href="#" class="remove_field btn btn-sm btn-danger"><i class="mdi mdi-close"></i></a>
                        </div>
                      </div>  
                    `);

                $('#nim' + uid).select2({});
            }
        });

        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').parent('div').remove();
            x--;
        })
    });
</script>

<script type="text/javascript">
    // select
    $(document).ready(function() {
        $('.zxc').select2({
            placeholder: 'Pilih Mahahsiswa',
        });


    });
</script>
@endsection