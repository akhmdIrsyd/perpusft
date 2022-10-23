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

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Beli</th>
                        <th>Nama Buku</th>
                        <th>Harga</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kode Beli</th>
                        <th>Nama Buku</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($bookings as $booking)
                    <tr>
                        <td class="text-center"> {{ ++$i }}</td>
                        <td>{{ $booking->kode_beli }}</td>
                        <td>{{ $booking->Buku->nama_buku }}</td>
                        <td>{{ $booking->Buku->harga }}</td>
                        <td>
                            <a href="/proses_update/{{ $booking->kode_beli }}"> <button class="btn btn-primary">Detail</button></a>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#modalHapus{{ $i }}">Delete</button>
                            @include('proses.delete')
                        </td>

                    </tr>


                    @endforeach

                </tbody>
            </table>
        </div>
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