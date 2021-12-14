<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('siswa.index')}}">
        <div class="sidebar-brand-icon ">
            <img src="{{asset('homepage/img/logocastle.png')}}" style="width: 50px">
        </div>
        <div class="sidebar-brand-text mx-3">SMAN1Puri</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span></a>
    </li>
    @php
    $a = Auth::user()->level;
    $b = Auth::user()->verif_daftar;
    @endphp

    @if($a == 1)
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Calon Siswa
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('siswa.profile')}}"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Profile User</span>
        </a>

        <a class="nav-link collapsed" href="{{route('siswa.daftar')}}"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>PPDB</span>
        </a>
        @endif
        {{-- @endif --}}

    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">


    @if($a == 0)
    <!-- Heading -->
    <div class="sidebar-heading">
        Admin
    </div>

    <li class="nav-item">

        <a class="nav-link collapsed" href="{{route('biaya.index')}}" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Biaya Pendaftaran</span>
        </a>
        <a class="nav-link collapsed" href="{{route('formulir.index')}}" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Pribadi Calon Siswa</span>
        </a>
        <a class="nav-link collapsed" href="{{route('daftar-ulang.index')}}" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Daftar Ulang</span>
        </a>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admin"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Master</span>
        </a>
        <div id="admin" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('user.index')}}">Data User Terdaftar</a>
                <a class="collapse-item" href="{{route('admin.index')}}">Data Admin</a>
                <div class="collapse-divider"></div>
            </div>
        </div>
    </li>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->

</ul>