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
                <input type="text" class="form-control form-control-sm">
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
                    @foreach ($users as $user)
                    <tr>
                        <td style="text-align: center;">{{ $loop->iteration }}.</td>
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
                                    class="btn btn-primary btn-sm btn-air-primary p-3 pt-2 pb-2"
                                    style="white-space: nowrap;">
                                    <span class="bi bi-pencil"></span>
                                </a>
                                <div class="d-flex justify-content-center gap-2">
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin mau menghapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm btn-air-danger p-3 pt-2 pb-2"
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
        </div>
    </div>
</div>
</div>
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
