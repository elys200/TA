@extends('layouts.app')
@section('content')


<div class="container-fluid">
    <div class="bg-white p-4 rounded-3 shadow-sm">
        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2 mb-3">
            <h4 class="mb-0">{{ Str::title($role->name) }}</h4>
        </div>

        <form action="{{ route('role.permissions.update', $role->id) }}" method="POST">
            @csrf

            @foreach ($permissions as $permission)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                    id="perm{{ $permission->id }}" {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                <label class="form-check-label" for="perm{{ $permission->id }}">
                    {{ $permission->name }}
                </label>
            </div>
            @endforeach
            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Update</button>

        </form>

    </div>
</div>


@include('role.modal.tambah')
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
