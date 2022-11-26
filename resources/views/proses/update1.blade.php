@extends('templates')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Mahasiswa</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Mahasiswa</h6>
        <button class="btn btn-primary" onclick="myFunction()"><i class="fa fa-print me-3"></i></button>
    </div>

    <div class="card-body">
        @foreach($bukus as $buku)
        <input type="text" class="form-control" value="{{ $buku->kode_beli}}" hidden>
        <p hidden>{{$kode_beli=$buku->kode_beli}}</p>
        @endforeach
        <form action="/sumbang" method="post">
            @csrf
            @method('put')
            @foreach($bukus as $buku)
            <div class="form-group">
                <div class="form-group ">
                    <label for="">Kode Beli</label>
                    <input type="text" class="form-control" id="kode_beli" name="kode_beli" value="{{$kode_beli}}" readonly>
                </div>
                <label for="">Buku</label>
                <select class="form-control" id="addid_buku" name="addid_buku" required focus>

                    <option value="{{$buku->id_buku}}">{{ $buku->Buku->nama_buku }}</option>

                </select>

                <input type="text" class="form-control" id="addnama_buku[]" name="addnama_buku[]" value="{{$buku->Buku->nama_buku }}" hidden>
                <input type="text" class="form-control" id="addjumlah[]" name="addjumlah[]" value="{{$buku->Buku->jumlah}}" hidden>

            </div>
            <div class="form-group ">
                <label for="">Nama Penerbit</label>
                <input type="text" class="form-control" id="penerbit[]" name="penerbit[]" value="{{ $buku->Buku->penerbit}}" readonly>
            </div>
            <div class="form-group ">
                <label for="">Nama Penulis</label>
                <input type="text" class="form-control" id="penulis[]" name="penulis[]" value="{{ $buku->Buku->penulis}}" readonly>
            </div>
            <div class="form-group ">
                <label for="">Nama Harga</label>
                <input type="text" class="form-control" id="harga[]" name="harga[]" value="{{ $buku->Buku->harga}}" readonly>
            </div>
            @endforeach
            Mahasiswa
            <div class="navbar-nav float-end">
                <button class="add_field_button btn btn-sm btn-primary"><i class="mdi mdi-plus"></i> Tambah Kolom</button>
            </div>
            <div class="input_fields_wrap">
                @foreach($bookings as $booking)
                <div class="row">
                    <input type="text" class="form-control" id="addkode_beli[]" name="addkode_beli[]" value="{{$booking->kode_beli }}" hidden>
                    <div class="form-group col-md-9">
                        <label for="">Nama Mahasiswa</label>
                        <select data-select2-id="{{ $booking->id }}" class="form-control zxc" id="nim[]" name="nim[]" required style="height:100%">
                            <option value="" selected>Pilih Mahasiswa</option>
                            @foreach($Mahasiswas_belum as $mhs)
                            <option value="{{$mhs->nim}}" @if($booking->NIM_mhs == $mhs->nim) selected @endif>{{ $mhs->nim }} - {{ $mhs->nama_mhs }}</option>

                            @endforeach
                        </select>
                    </div>


                    <div class="form-group col-md-2">

                        <label for="">Status</label>
                        <select class="form-control" id="addstatus" name="addstatus[]" required focus>
                            <option value="" disabled selected>Pilih Status</option>

                            <option value="1" @if ($booking->status == 1) selected @endif> Booking</option>
                            <option value="2" @if ($booking->status == 2) selected @endif> Batal</option>
                            <option value="3" @if ($booking->status == 3) selected @endif> Verifikasi</option>

                        </select>
                    </div>
                    @if ($loop->iteration !=1)
                    <div class="form-group col-md-1">
                        <a href="#" class="remove_field btn btn-sm btn-danger"><i class="mdi mdi-close"></i></a>
                    </div>
                    @endif
                </div>

                <input type="text" class="form-control" id="addpenerbit" name="addNIM[]" value="{{ $booking->NIM_mhs}}" hidden>
                <input type="number" class="form-control" id="updateid" name="updateid[]" value="{{ $booking->id}}" hidden>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
        <!--END FORM UPDATE BARANG-->
    </div>
</div>



@endsection

@section('extrajs')
<script>
    function myFunction() {
        var myParameters = window.location.search; // Get the parameters from the current page

        var URL = "/surat/{{$kode_beli}}" + myParameters;

        var W = window.open(URL);

        W.window.print(); // Is this the right syntax ? This prints a blank page and not the above URL
    }
</script>
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>


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
                        <div class="form-group col-md-9">
                        <label for="">Nama Mahasiswa</label>
                          <select data-select2-id=${uid}" class="form-control zxc" id="nim${uid}" name="nim[]" required style="height:100%">
                                    <option value="" selected>Pilih Mahasiswa</option>
                                    @foreach($Mahasiswas_belum as $mhs)
                                     <option value="{{$mhs->nim}}">{{ $mhs->nim }} - {{ $mhs->nama_mhs }}</option>

                                    @endforeach
                                </select>
                        </div>
                    <div class="form-group col-md-2">

                        <label for="">Status</label>
                        <select class="form-control" id="addstatus" name="addstatus[]" required focus>
                            <option value="" disabled selected>Pilih Status</option>

                            <option value="1" @if ($booking->status == 1) selected @endif> Booking</option>
                            <option value="2" @if ($booking->status == 2) selected @endif> Batal</option>
                            <option value="3" @if ($booking->status == 3) selected @endif> Verifikasi</option>n>
                            <option value="5" @if ($booking->status == 5) selected @endif> Selesai</option>

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