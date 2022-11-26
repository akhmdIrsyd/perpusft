<!-- Modal Update Barang-->
@extends('template_front')

@section('content')
<!-- Page Heading -->

<!-- DataTales Example -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h1 class="h3 mb-2 text-gray-800">Mahasiswa</h1>
            <h6 class="section-title bg-white text-center text-primary px-3">Daftar Buku</h6>
            <h1 class="mb-5"></h1>
        </div>

        <form action="/sumbang" method="post">
            @csrf
            @method('post')
            @foreach($bukus as $buku)
            <div class="form-group">

                <label for="">Buku</label>
                <select class="form-control" id="id_buku" name="id_buku" required focus>
                    <option value="{{$buku->id}}" selected>{{ $buku->nama_buku }}</option>

                </select>
                <input type="text" class="form-control" id="nama_buku[]" name="nama_buku[]" value="{{$buku->nama_buku }}" hidden>
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
            </br>
            @endforeach
            Mahasiswa
            <div class="navbar-nav float-end">
                <button class="add_field_button btn btn-sm btn-primary"><i class="mdi mdi-plus"></i> Tambah Mahasiswa</button>
            </div>
            <hr />
            <div class="input_fields_wrap">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="">Nama Mahasiswa</label>
                        <input type="text" class="form-control" id="nama[]" name="nama[]" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">NIM</label>
                        <input type="text" class="form-control" id="nim[]" name="nim[]" required>
                    </div>
                    <div class="form-group col-md-2">

                        <label for="">Jurusan</label>
                        <select class="form-control" id="id_jurusan[]" name="id_jurusan[]" required focus>
                            <option value="" disabled selected>Pilih Jurusan</option>
                            @foreach($jurusans as $jurusan)
                            <option value="{{$jurusan->id}}">{{ $jurusan->nama_jurusan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">No. Telpon</label>
                        <input type="text" class="form-control" id="no_hp[]" name="no_hp[]" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">Email</label>
                        <input type="email" class="form-control" id="addemail[]" name="addemail[]" required>
                    </div>
                    <input type="number" class="form-control" id="addjumlah" name="addjumlah" value="{{ $buku->jumlah}}" hidden>
                </div>
            </div>

            </br>
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
                         <div class="form-group col-md-3">
                            <label for="">Nama Mahasiswa</label>
                            <input type="text" class="form-control" id="nama[]" name="nama[]" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="">NIM</label>
                            <input type="text" class="form-control" id="nim[]" name="nim[]" required>
                        </div>
                        <div class="form-group col-md-2">

                            <label for="">Jurusan</label>
                            <select class="form-control" id="id_jurusan[]" name="id_jurusan[]" required focus>
                                <option value="" disabled selected>Pilih Jurusan</option>
                                @foreach($jurusans as $jurusan)
                                <option value="{{$jurusan->id}}">{{ $jurusan->nama_jurusan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="">No. Telpon</label>
                            <input type="text" class="form-control" id="no_hp[]" name="no_hp[]" required>
                        </div>
                        <div class="form-group col-md-2">
                        <label for="">Email</label>
                        <input type="email" class="form-control" id="addemail[]" name="addemail[]" required>
                        </div>
                        <input type="number" class="form-control" id="addjumlah" name="addjumlah" value="{{ $buku->jumlah}}" hidden>
                        
                        <div class="form-group col-md-1">
                          <a href="#" class="remove_field btn btn-sm btn-danger"><i class="mdi mdi-close"></i></a>
                        </div>
                      </div>  
                      
                    `);
                $('#nim' + uid).select2();
            }
        });

        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').parent('div').remove();
            x--;
        })
    });
</script>

<script>
    $(document).ready(function() {
        $(".zxc").select2();

        $("#addnama_buku").select2();
    }); //document ready
</script>
@endsection