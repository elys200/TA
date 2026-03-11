@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="page-content-wrapper">
        <h3 class="mb-3">{{ $ruangan->nama_ruangan }}</h3>

        <div class="image-wrapper mb-4">
            <img src="{{ asset('storage/'.$ruangan->foto) }}" alt="" max-width="200px" class="rounded-3 shadow-sm">
        </div>

        <div class="bg-white p-4 rounded-3 shadow-sm">
            <h4 class="mb-3">Detail Ruangan</h4>

            <hr class="my-2">

            <table class="table table-borderless detail-table">
                <tbody>
                    <tr>
                        <th>Lokasi Ruangan</th>
                        <td>: {{ $ruangan->lokasi }}</td>
                    </tr>
                    <tr>
                        <th>Kode Ruangan</th>
                        <td>: {{ $ruangan->kode_ruangan }}</td>
                    </tr>
                    <tr>
                        <th>Kapasitas Ruangan</th>
                        <td>: {{ $ruangan->kapasitas }} Orang</td>
                    </tr>
                    <tr>
                        <th>PIC Ruangan</th>
                        <td>: {{ $ruangan->pic->nama_lengkap ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>No Telp PIC</th>
                        <td>: 089505631279</td>
                    </tr>
                </tbody>
            </table>

            <div class="d-grid gap-2">
                <a href="{{ route('ruangan.form', $ruangan->id) }}" class="btn btn-primary">
                    Ajukan Peminjaman
                </a>
            </div>
        </div>

        <div class="bg-white p-4 rounded-3 shadow-sm mt-4">
            <h5 class="mb-3">Jadwal Penggunaan Ruangan</h5>
            <hr class="my-2">

            <div id="calendar" style="width: 100%; max-width: 900px; margin: 0 auto; margin-top: 10px;"></div>
        </div>

    </div>
</div>

<script src="{{asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendors/apexcharts/apexcharts.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const calendarEl = document.getElementById('calendar');
    const ruanganId = {{ $ruangan->id }};

    let initialView = window.innerWidth < 768 ? 'timeGridDay' : 'dayGridMonth';

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: initialView,

        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },

        events: `/calendar-events/${ruanganId}`,

        eventTimeFormat: {
            hour: '2-digit',
            minute: '2-digit',
            hour12: false
        },

        height: 'auto'
    });

    calendar.render();

    window.addEventListener('resize', function () {
        if (window.innerWidth < 768) {
            calendar.changeView('timeGridDay');
        } else {
            calendar.changeView('dayGridMonth');
        }
    });

});
</script>

@endsection