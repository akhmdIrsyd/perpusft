@extends('templates')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">BUKU</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel daftar buku</h6>
    </div>

    <div class="card-body">



        <button type="button" class="btn btn-success float-left mb-1" data-toggle="modal" data-target="#modalTambahBuku">Tambah</button>
        <button type="button" class="btn btn-primary float-left mb-1" data-toggle="modal" data-target="#ModalExcel">Export Excel</button>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th width="10">Nama Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Harga</th>
                        <th>Exemplar</th>
                        <th>Total</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Harga</th>
                        <th>Exemplar</th>
                        <th>Total</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($bukus as $buku)
                    <tr>
                        <td class="text-center"> {{ ++$i }}</td>
                        <td>{{ $buku->nama_buku }}</td>
                        <td>{{ $buku->penulis }}</td>
                        <td>{{ $buku->penerbit }}</td>
                        <td>{{ $buku->harga }}</td>
                        <td>{{ $buku->exemplar }}</td>
                        <td>
                            {{ $buku->jumlah }}
                        </td>
                        <td>{{ $buku->Jurusan->nama_jurusan }} </td>
                        <td>
                            <a href=" /buku/{{ $buku->id }}"><button class="btn btn-primary" data-toggle="modal">Tambah Sumbang</button></a>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#modalUpdateBuku{{ $buku->id }}">Update</button>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#modalHapusBuku{{ $buku->id }}">Delete</button>
                        </td>

                    </tr>
                    @include('bukus.create_beli')
                    @include('bukus.update')
                    @include('bukus.delete')
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@include('bukus.create')
@include('bukus.create_excel')



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

                                <label for="addnama_buku">Nama Mahasiswa</label>
                                <select data-select2-id="${uid}" class="form-control zxc" id="addnama_buku${uid}" name="addnama_buku[]" required style="width:100%">
                                    <option value="" selected>Pilih Mahasiswa</option>
                                    @foreach($Mahasiswas_belum as $mhs)
                                    <option value="{{$mhs->id}}">{{ $mhs->nim }} - {{ $mhs->nama_mhs }}</option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="form-group col-md-2">
                          <input type="text" name="jumlah" class="form-control" id="jumlah" placeholder="Jumlah">
                        </div>
                        <div class="form-group col-md-2">
                          <input type="text" name="nomor_dos" class="form-control" id="nomor_dos" placeholder="Nomor Dos">
                        </div>
                        <div class="form-group col-md-2">
                          <a href="#" class="remove_field btn btn-sm btn-danger"><i class="mdi mdi-close"></i></a>
                        </div>
                      </div>  
                    `);
                $('#addnama_buku' + uid).select2();
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

    }); //document ready
</script>
@endsection