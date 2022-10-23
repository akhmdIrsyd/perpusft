<div class="modal fade" id="modalHapus{{ $mahasiswa->id }}" tabindex="-1" aria-labelledby="modalHapus" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="text-center">Apakah anda yakin menghapus Mahasiswa ini? :</h4>
            </div>
            <div class="modal-footer">
                <form action="mahasiswa/{{$mahasiswa->id}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary">Hapus Mahasiswa!</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak Jadi</button>
            </div>
        </div>
    </div>
</div>