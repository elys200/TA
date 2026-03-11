@extends('layouts.app')

@section('content')

<div class="page-heading mb-4">
    <h3>User</h3>
</div>


<div class="card">
    <div class="card-body">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3 gap-2">
            <div class="d-flex align-items-center gap-2">
                <label class="mb-0">Search:</label>
                <input type="text" id="searchInput" class="form-control form-control-sm">
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama Lengkap</th>
                        <th>Jurusan</th>
                        <th>Program Studi</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $index =>$user)
                    <tr class="user-item">
                        <td style="text-align: center;">{{ $users->firstItem() + $index}}.</td>
                        <td>{{ $user->nim}}</td>
                        <td>{{ $user->nama_lengkap}}</td>
                        <td>{{ $user->jurusan}}</td>
                        <td>{{ $user->program_studi}}</td>
                        <td style="text-align: center;">
                            @php
                            $role = $user->roles->isEmpty() ? 'PENDING' : strtoupper($user->getRoleNames()->first());
                            $badgeColor = match($role) {
                            'PENDING' => 'bg-secondary',
                            'ADMIN' => 'bg-primary',
                            'MAHASISWA' => 'bg-success',
                            'PAMDAL' => 'bg-warning',
                            'PIC_BARANG' => 'bg-info',
                            'PIC_RUANGAN' => 'bg-danger',
                            default => 'bg-secondary',
                            }
                            @endphp
                            <span class="badge {{ $badgeColor }} px-3 py-2" style="font-size: 0.875rem;">
                                {{ $role }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{route('user.edit', $user->id)}}"
                                    class="btn btn-primary btn btn-warning p-3 pt-2 pb-2"
                                    style="white-space: nowrap;">
                                    <span class="bi bi-pencil"></span>
                                </a>
                                <div class="d-flex justify-content-center gap-2">
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin mau menghapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-air-danger p-3 pt-2 pb-2"
                                            style="white-space: nowrap;">
                                            <span class="bi bi-trash"></span>
                                        </button>
                                    </form>

                                </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p id="notFound" style="display:none; text-align: center; font-size: 20px; color: red; ">Oops! Data Tidak Ditemukan!</p>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div style="margin-top: 5px;">
                        Menampilkan {{ $users->lastItem() }}
                        dari {{ $users->total() }} data
                    </div>

                    <div>
                        {{ $users->links() }}
                    </div>

            </div>
        </div>
    </div>
</div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {

    const searchInput = document.getElementById("searchInput");

    searchInput.addEventListener("keyup", function () {

        const keyword = this.value.toLowerCase();
        const items = document.querySelectorAll(".user-item");
        let ditemukan = false;

        items.forEach(function(item){

            const text = item.textContent.toLowerCase();

            if(text.includes(keyword)){
                item.style.display = "";
                ditemukan = true;
            } else {
                item.style.display = "none";
            }

        });

        if(!ditemukan){
            document.getElementById("notFound").style.display = "block";
        } else {
            document.getElementById("notFound").style.display = "none";
        }

    });

});
</script>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.faq-item').forEach(item => {
        item.addEventListener('click', () => {
            item.classList.toggle('active');
        });
    });

</script>
@endpush
