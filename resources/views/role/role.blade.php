@extends('layouts.app')
@section('content')


<div class="container-fluid">
    <div class="bg-white p-4 rounded-3 shadow-sm">
        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2 mb-3">
            <h4 class="mb-0">Role Management</h4>
            <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambahRole">
                Create New Role
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr style="text-align: center;">
                        <th style="width: 80px;">No</th>
                        <th>Name</th>
                        <th style="width: 260px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <td style="text-align: center;">{{ $loop->iteration }}.</td>
                        <td>{{ Str::title($role->name) }}</td>
                        <td class="text-center align-middle">
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <a href="{{ route('role.permissions', $role->id) }}"
                                    class="btn btn-info btn-sm text-white">
                                    Show
                                </a>


                                <button type="button" class="btn btn-primary btn-sm btn-edit" data-id="{{$role->id}}"
                                    data-name="{{$role->name}}" data-bs-toggle="modal" data-bs-target="#modalEditRole">
                                    Edit
                                </button>

                                <form action="{{ route('role.destroy', $role->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin mau menghapus role ini?')" class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Hapus
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

{{-- HTML kamu di atas --}}

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', function () {

                let id = this.dataset.id;
                let name = this.dataset.name;

                document.getElementById('editRoleName').value = name;
                document.getElementById('editRoleForm').action = '/role/' + id;
            });
        });
    });

</script>

@include('role.modal.tambah')
@include('role.modal.hapus')
@include('role.modal.edit')

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
