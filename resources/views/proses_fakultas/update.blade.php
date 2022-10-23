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
        @foreach($bukus as $buku)
        <input type="text" class="form-control" value="{{ $buku->kode_beli}}" hidden>
        <p hidden>{{$kode_beli=$buku->kode_beli}}</p>
        @endforeach
        <form action="/proses_fakultas/{{$kode_beli}}" method="post">
            @csrf
            @method('put')
            @foreach($bukus as $buku)
            <div class="form-group">

                <label for="">Buku</label>
                <select class="form-control" id="addid_buku" name="addid_buku" required focus>

                    <option value="{{$buku->id_buku}}">{{ $buku->Buku->nama_buku }}</option>

                </select>
                <input type="text" class="form-control" id="addnama_buku[]" name="addnama_buku[]" value="{{$buku->Buku->nama_buku }}" hidden>
                <input type="number" class="form-control" id="addjumlah[]" name="addjumlah[]" value="{{$buku->Buku->jumlah }}" hidden>
            </div>
            <div class="form-group ">
                <label for="">Nama Penerbit</label>
                <input type="text" class="form-control" value="{{ $buku->Buku->penerbit}}" readonly>
            </div>
            <div class="form-group ">
                <label for="">Nama Penulis</label>
                <input type="text" class="form-control" value="{{ $buku->Buku->penulis}}" readonly>
            </div>
            <div class="form-group ">
                <label for="">Nama Harga</label>
                <input type="text" class="form-control" value="{{ $buku->Buku->harga}}" readonly>
            </div>
            @endforeach
            Mahasiswa

            @foreach($bookings as $booking)
            <div class="row">
                <input type="text" class="form-control" id="addkode_beli[]" name="addkode_beli[]" value="{{$booking->kode_beli }}" hidden>
                <div class="form-group col-md-2">
                    <label for="">Nama Mahasiswa</label>
                    <input type="text" class="form-control" id="addnama_buku" name="addnama[]" value="{{ $booking->nama_mhs}}">
                </div>
                <div class="form-group col-md-2">
                    <label for="">NIM</label>
                    <input type="text" class="form-control" id="addpenerbit" name="addNIM[]" value="{{ $booking->NIM_mhs}}">
                </div>
                <div class="form-group col-md-2">

                    <label for="">Jurusan</label>
                    <select class="form-control" id="addid_jurusan" name="addid_jurusan[]" required focus>
                        <option value="" disabled selected>Pilih Jurusan</option>
                        @foreach($jurusans as $jurusan)
                        <option value="{{$jurusan->id}}" @if($jurusan->id == $booking->id_jurusan) selected @endif>{{ $jurusan->nama_jurusan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="">No. Telpon</label>
                    <input type="text" class="form-control" id="addno_hp" name="addno_hp[]" value="{{ $booking->no_hp}}">
                </div>
                <div class="form-group col-md-2">
                    <label for="">Email</label>
                    <input type="email" class="form-control" id="addemail" name="addemail[]" value="{{ $booking->email}}">
                </div>
                <div class="form-group col-md-2">

                    <label for="">Status</label>
                    <select class="form-control" id="addstatus" name="addstatus[]" required focus>
                        <option value="" disabled selected>Pilih Status</option>

                        <option value="1" @if ($booking->status == 1) selected @endif> Booking</option>
                        <option value="2" @if ($booking->status == 2) selected @endif> Batal</option>
                        <option value="3" @if ($booking->status == 3) selected @endif> Setuju</option>
                        <option value="4" @if ($booking->status == 4) selected @endif> Verifikasi</option>
                        <option value="5" @if ($booking->status == 5) selected @endif> Selesai</option>

                    </select>
                </div>
            </div>
            <input type="number" class="form-control" id="updateid" name="updateid[]" value="{{ $booking->id}}" hidden>
            @endforeach

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