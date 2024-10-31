<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book-open-reader"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Online</div>
    </a>

    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Data
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('siswa.index') }}">
            <i class="fas fa-fw fa-user-graduate"></i>
            <span>Data Siswa</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('konfirm.index') }}">
            <i class="fas fa-fw fa-circle-check"></i>
            <span>Konfirmasi</span>
        </a>
    </li>

    <hr class="sidebar-divider">
</ul>