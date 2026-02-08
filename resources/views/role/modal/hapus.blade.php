<div class="modal fade" id="modalHapusRole" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">

            <form action="{{ route('role.destroy', $role->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <div class="modal-body text-center p-4">

                    <img src="{{ asset('images/tanya.png') }}" class="mb-3"
                        style="width: 150px; height: auto; object-fit: contain;">

                    <h6 class="fw-bold mb-2">
                        Hapus Role
                    </h6>

                    <p class="text-muted mb-4">
                        Apakah Anda yakin ingin menghapus role ini ?

                    </p>

                    <div class="d-flex justify-content-center gap-3">
                        <button type="submit" class="btn btn-danger btn-sm">
                            Ya, Hapus
                        </button>
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">
                            Batal
                        </button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>
