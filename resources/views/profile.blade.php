@extends('layouts.app')
@section('content')
<div class="container-fluid">

    <h3>Profile User</h3>

    <!-- WRAPPER PUTIH -->
    <div class="bg-white p-4 rounded-3 shadow-sm">

        <form action="#" method="POST" class="row g-3">
            <div class="col-md-6">
                <label for="penanggung_jawab" class="form-label">Nama Penaggung Jawab</label>
                <input type="text" class="form-control" id="nama_penanggung_jawab" name="nama_penanggung_jawab"
                    value="{{ old('nama_penanggung_jawab') }}" required>
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
