<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-text mx-3">Layanan Tendik</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    @role('admin')
    <div class="sidebar-heading">
        Master Data
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#masterData" aria-expanded="true"
            aria-controls="masterData">
            <i class="fas fa-fw fa-database"></i>
            <span>Master Data</span>
        </a>
        <div id="masterData" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('layanan.index') }}">Layanan</a>
                <a class="collapse-item" href="{{ route('golongan.index') }}">Golongan</a>
                <a class="collapse-item" href="{{ route('satpen.index') }}">Satpen</a>
                <a class="collapse-item" href="{{ route('tendik.index') }}">Tendik</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#daftarPengajuan"
            aria-expanded="true" aria-controls="daftarPengajuan">
            <i class="fas fa-fw fa-file-signature"></i>
            <span>Daftar Pengajuan</span>
        </a>
        <div id="daftarPengajuan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pilih Layanan:</h6>
                @foreach ($layananMenu as $layanan)
                <a class="collapse-item" href="{{ route('daftar.pengajuan.index',$layanan->nama_layanan_slug) }}">{{
                    $layanan->nama_layanan }}</a>
                @endforeach
            </div>
        </div>
    </li>
    @endrole

    @role('tendik')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuPengajuan" aria-expanded="true"
            aria-controls="menuPengajuan">
            <i class="fas fa-fw fa-file-signature"></i>
            <span>Pengajuan</span>
        </a>
        <div id="menuPengajuan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pilih Layanan:</h6>
                @foreach ($layananMenu as $layanan)
                <a class="collapse-item" href="{{ route('pengajuan.index',$layanan->nama_layanan_slug) }}">{{
                    $layanan->nama_layanan }}</a>
                @endforeach
            </div>
        </div>
    </li>
    @endrole

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
