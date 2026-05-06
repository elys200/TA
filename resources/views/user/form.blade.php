@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <h2>Tambah User</h2>

    <!-- WRAPPER PUTIH -->
    <div class="bg-white p-4 rounded-3 shadow-sm" style="margin-top: 10px">
        <form class="row g-3" action="{{ route('user.store') }}" method="POST">
            @csrf

            <div class="col-md-6">
                <label class="form-label fw-bold">NIM / Username</label>
                <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror"
                    value="{{ old('nim') }}">
                @error('nim') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror"
                    value="{{ old('nama_lengkap') }}">
                @error('nama_lengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">No. Telepon</label>
                <input type="text" name="no_tlp" class="form-control" value="{{ old('no_tlp') }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Status</label>
                <select name="status" class="form-select">
                    <option value="1" selected>Aktif</option>
                    <option value="0">Non Aktif</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Role</label>
                <select name="role" class="form-select">
                    @foreach ($roles as $role)
                    <option value="{{ $role->name }}">
                        {{ \Illuminate\Support\Str::title(str_replace('_', ' ', $role->name)) }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </form>
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
