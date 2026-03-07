<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <img src="{{ asset('images/logo/logo1.png') }}" alt="Logo" srcset="">
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item active ">
                    <a href="{{route('dashboard')}}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item  ">
                    <a href="{{ route('ruangan') }}" class='sidebar-link'>
                        <i class="bi bi-door-open-fill"></i>
                        <span> Ruangan </span>
                    </a>
                </li>
                @hasanyrole('admin|pic_barang|pic_ruangan|mahasiswa')
                <li class="sidebar-item  ">
                    <a href="{{ route('barang') }}" class='sidebar-link'>
                        <i class="bi bi-archive-fill"></i>
                        <span> Barang </span>
                    </a>
                </li>
                @endhasanyrole
                @hasanyrole('admin|pic_barang|pic_ruangan|mahasiswa')
                <li class="sidebar-title">Peminjaman</li <li class="sidebar-item  ">
                <a href="{{ route('statuspeminjamanbarang') }}" class='sidebar-link'>
                    <i class="bi bi-exclamation-circle-fill"></i>
                    <span>Status Peminjaman</span>
                </a>
                </li>
                @endhasanyrole
                @hasanyrole('admin|pic_ruangan')
                <li class="sidebar-title">PIC Menu</li>
                <li class="sidebar-item  ">
                    <a href="{{ route('approvalruangan') }}" class='sidebar-link'>
                        <i class="bi bi-door-closed"></i>
                        <span>Approval Ruangan</span>
                    </a>
                </li>
                @endhasanyrole
                @hasanyrole('admin|pic_barang')
                <li class="sidebar-item  ">
                    <a href="{{ route('approvalbarang') }}" class='sidebar-link'>
                        <i class="bi bi-box-seam"></i>
                        <span>Approval Barang</span>
                    </a>
                </li>
                @endhasanyrole
                @hasanyrole('admin|pamdal')
                <li class="sidebar-title">Pamdal Menu</li>
                <li class="sidebar-item  ">
                    <a href="{{ route('kunci') }}" class='sidebar-link'>
                        <i class="bi bi-key-fill"></i>
                        <span>Kunci</span>
                    </a>
                </li>
                @endhasanyrole
                @role('admin')
                <li class="sidebar-title">Other</li>
                <li class="sidebar-item  ">
                    <a href="{{ route('tambahruangan') }}" class='sidebar-link'>
                        <i class="bi bi-door-open-fill"></i>
                        <span>Kelola Ruangan</span>
                    </a>
                </li>
                @endrole
                @hasanyrole('admin|pic_barang')
                <li class="sidebar-item  ">
                    <a href="{{ url('/ormawa') }}" class='sidebar-link'>
                        <i class="bi bi-diagram-3"></i>
                        <span>Ormawa</span>
                    </a>
                </li>
                @endhasanyrole
                @role('admin')
                <li class="sidebar-item  ">
                    <a href="{{ route('user') }}" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>User</span>
                    </a>
                </li>
                <li class="sidebar-item  ">
                    <a href="{{ route('role') }}" class='sidebar-link'>
                        <i class="bi bi-shield-lock"></i>
                        <span>Role</span>
                    </a>
                </li>
                @endrole
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
