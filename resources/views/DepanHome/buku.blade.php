@extends('template_front')

@section('content')



<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-primary px-3">Daftar Buku</h6>
            <h1 class="mb-5"></h1>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Buku</th>
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
                        <td>{{ $buku->penerbit }}</td>
                        <td>{{ $buku->harga }}</td>
                        <td>{{ $buku->exemplar }}</td>
                        <td>
                            {{ $buku->jumlah }}
                        </td>
                        <td>{{ $buku->Jurusan->nama_jurusan }} </td>
                        <td>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalBeli{{ $buku->id }}">Beli</button>
                        </td>

                    </tr>
                    @include('DepanHome.create_beli')
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Testimonial End -->



@endsection

@section('extrajs')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection