{{-- Modal --}}
<div class="modal fade modal-warning" id="modal_show" tabindex="-1" role="dialog" aria-labelledby="modal_show_label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_show_label"><i class="fa fa-warning"></i> Konfirmasi Peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.booking.update', $dataPinjam->id) }}" id="idForm">
                    @csrf
                    @method('put')

                    <div class="form-group @error('status') has-error @enderror">
                        <label for="status" class="control-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">-Ubah Status-</option>
                            <option value="2" {{ $dataPinjam->status == 2 ? 'selected' : '' }}>Terima
                            </option>
                            <option value="3" {{ $dataPinjam->status == 3 ? 'selected' : '' }}>Tolak
                            </option>
                            <option value="4" {{ $dataPinjam->status == 4 ? 'selected' : '' }}>Dikembalikan
                            </option>
                        </select>
                        @error('status')
                            <small class="form-message text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="idForm" class="btn btn-warning">Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
