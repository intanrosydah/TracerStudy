<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-text mx-3">Tracer Study</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    @if (Auth::user()->role === 'superadmin' || Auth::user()->role === 'user')

        <!-- Heading -->
        <div class="sidebar-heading">
            Form Data
        </div>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('form-alumni.index') }}">
                <i class="fas fa-fw fa-file-invoice"></i>
                <span>Form Data Alumni</span></a>
        </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    @endif

    @if (Auth::user()->role == 'superadmin')

        <!-- Heading -->
        <div class="sidebar-heading">
            Master Base
        </div>

        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('alumni.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Data Alumni</span></a>
        </li> --}}

        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>Data User</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
    @endif

    @if (Auth::user()->role == 'superadmin')

        <!-- Heading -->
        <div class="sidebar-heading">
            Value List Base
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                aria-controls="collapsePages">
                <i class="fas fa-fw fa-list"></i>
                <span>Value List</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('status-pernikahan.index') }}">Status Pernikahan</a>
                    <a class="collapse-item" href="{{ route('jurusan.index') }}">Jurusan</a>
                    <a class="collapse-item" href="{{ route('alumni-angkatan.index') }}">Alumni Angkatan</a>
                    <a class="collapse-item" href="{{ route('posisi-saat-ini.index') }}">Posisi Saat Ini</a>
                    {{-- <a class="collapse-item" href="{{ route('kelas.index') }}">Kelas</a> --}}
                </div>
            </div>
        </li>

        <hr class="sidebar-divider my-0">
    @endif

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-3">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
