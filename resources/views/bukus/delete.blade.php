<div class="modal fade" id="modalHapusBuku{{ $buku->id }}" tabindex="-1" aria-labelledby="modalHapusBarang" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="text-center">Apakah anda yakin menghapus Buku ini? :</h4>
            </div>
            <div class="modal-footer">
                <form action="buku/{{$buku->id}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary">Hapus Buku!</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak Jadi</button>
            </div>
        </div>
    </div>
</div>