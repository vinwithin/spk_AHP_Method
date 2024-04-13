<ul class="navbar-nav bg-dark sidebar-primary text-light sidebar accordion shadow-lg" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center text-light" href="#">
        <div class="sidebar-brand-icon ">
            <i class="fa-solid fa-user-tie"></i>
        </div>
        <div class="sidebar-brand-text mx-2">SAW METHOD</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item  {{ Request::is('/') ? 'active' : '' }}">
        <a class="nav-link" href="/" style="font-family: 'Times New Roman', Times, serif;">
            <i class="fa-solid fa-house"></i>
            <span class="fs-6">Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading mb-2">
        Menu
    </div>
    <li class="nav-item  {{ Request::is('alternatif*') ? 'active' : '' }}">
        <a class="nav-link " href="/alternatif" style="font-family: 'Times New Roman', Times, serif;">
            <i class="fa-solid fa-receipt"></i>
            <span class="fs-6">Alternatif</span></a>
    </li>
    <li class="nav-item  {{ Request::is('kriteria') ? 'active' : '' }}">
        <a class="nav-link" href="/kriteria" style="font-family: 'Times New Roman', Times, serif;">
            <i class="fa-regular fa-newspaper"></i>
            <span class="fs-6">Kriteria</span></a>
    </li>
    <li class="nav-item  {{ Request::is('nilai*') ? 'active' : '' }}">
        <a class="nav-link" href="/nilai" style="font-family: 'Times New Roman', Times, serif;">
            <i class="fa-regular fa-calendar-plus "></i>
            <span class="fs-6">Nilai</span></a>
    </li>
    <li class="nav-item  {{ Request::is('hitung*') ? 'active' : '' }}">
        <a class="nav-link" href="/hitung" style="font-family: 'Times New Roman', Times, serif;">
            <i class="fa-regular fa-calendar-plus "></i>
            <span class="fs-6">Hitung</span></a>
    </li>
    <!-- Divider -->
    @can('view', App\Models\User::class)
        <hr class="sidebar-divider">
        <div class="sidebar-heading mb-2">
            Master
        </div>
        <li class="nav-item  {{ Request::is('master*') ? 'active' : '' }}">
            <a class="nav-link" href="/master" style="font-family: 'Times New Roman', Times, serif;">
                <i class="fa-regular fa-user"></i>
                <span class="fs-6">Pengguna</span></a>
        </li>
    @endcan



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <div class="sidebar-heading">
        Other
    </div>
    <li class="nav-item ">
        <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal" style="font-family: 'Times New Roman', Times, serif;">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span class="fs-6">Logout</span></a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->


</ul>
