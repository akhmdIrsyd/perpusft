<div class="modal fade" id="modalHapus{{ $i }}" tabindex="-1" aria-labelledby="modalHapus" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="text-center">Apakah anda yakin menghapus Data ini? :</h4>
            </div>
            <div class="modal-footer">
                <form action="{{ route('proses_delete', [$booking->kode_beli, $booking->id_buku]) }}" method="post">

                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary">Hapus Data!</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak Jadi</button>
            </div>
        </div>
    </div>
</div>