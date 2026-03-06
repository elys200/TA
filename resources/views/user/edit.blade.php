@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <h2>Edit User</h2>

    <!-- WRAPPER PUTIH -->
    <div class="bg-white p-4 rounded-3 shadow-sm" style="margin-top: 10px">

        <form class="row g-3" action="{{route('user.update', $users->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <label for="" class="form-label fw-bold">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control"
                    value="{{ old('nama_lengkap', $users->nama_lengkap) }}">
            </div>
            <div class="col-md-6">
                <label for="" class="form-label fw-bold">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $users->email) }}">
            </div>
            <div class="col-md-6">
                <label for="inputState" class="form-label fw-bold">Role</label>
                <select name="role" class="form-select">
                    @foreach ($roles as $role)
                    <option value="{{ $role->name }}" {{ $users->hasRole($role->name) ? 'selected' : '' }}>
                        {{ \Illuminate\Support\Str::title(str_replace('_', ' ', $role->name)) }}

                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label fw-bold">NIM</label>
                <input type="text" name="nim" class="form-control" value="{{ old('nim', $users->nim) }}">
            </div>
            <div class="col-md-6">
                <label for="" class="form-label fw-bold">Jurusan</label>
                <input type="text" name="program_studi" class="form-control"
                    value="{{ old('jurusan', $users->jurusan) }}">
            </div>
            <div class="col-md-6">
                <label for="" class="form-label fw-bold">Program Studi</label>
                <input type="text" name="program_studi" class="form-control"
                    value="{{ old('program_studi', $users->program_studi) }}">
            </div>
            <div class="col-md-6">
                <label for="inputState" class="form-label fw-bold">Status User</label>
                <select name="status" class="form-select">
                    <option value="1" {{ old('status', $users->status) == '1' ? 'selected' : ''}}>
                        Aktif</option>
                    <option value="0" {{ old('status', $users->status) == '0' ? 'selected' : ''}}>Non Aktif
                    </option>
                </select>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Update</button>
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
