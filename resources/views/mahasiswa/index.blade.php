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

        <button type="button" class="btn btn-success float-left mb-1" data-toggle="modal" data-target="#modalTambah">Tambah</button>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Mahasiswa</th>
                        <th>NIM</th>
                        <th>Jurusan</th>
                        <th>Email</th>
                        <th>No. Telpon</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Mahasiswa</th>
                        <th>NIM</th>
                        <th>Jurusan</th>
                        <th>Email</th>
                        <th>No. Telpon</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($Mahasiswas as $mahasiswa)
                    <tr>
                        <td class="text-center"> {{ ++$i }}</td>
                        <td>{{ $mahasiswa->nama_mhs }}</td>
                        <td>{{ $mahasiswa->nim }}</td>
                        <td>{{ $mahasiswa->Jurusan->nama_jurusan }}</td>
                        <td>{{ $mahasiswa->email }} </td>
                        <td>{{ $mahasiswa->no_hp }} </td>
                        <td>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalUpdate{{ $mahasiswa->id }}">Update</button>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#modalHapus{{ $mahasiswa->id }}">Delete</button>
                        </td>

                    </tr>
                    @include('mahasiswa.update')
                    @include('mahasiswa.delete')
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@include('mahasiswa.create')



@endsection

@section('extrajs')

<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection