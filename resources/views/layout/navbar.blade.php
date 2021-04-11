<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-icon">
      <img src="{{ asset('template')}}/logo.svg ">
    </div>
    <div class="sidebar-brand-text mx-3">PENGADUAN MASYARAKAT</div>
  </a>
  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  @if(Auth::guard('petugas')->check())
  @if(Auth::guard('petugas')->user()->level == 'Admin' && Auth::guard('petugas')->user()->status == 1)

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.home') }}">
      <i class="fas fa-fw fa-home"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Interface
  </div>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.users.index') }}">
      <i class="fas fa-fw fa-user"></i>
      <span>Admin</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.users.indexPetugas') }}">
      <i class="fas fa-fw fa-user-friends"></i>
      <span>Petugas</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.users.indexMasyarakat') }}">
      <i class="fas fa-fw fa-users"></i>
      <span>Masyarakat</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.pengaduan.index') }}">
      <i class="fas fa-fw fa-file-alt"></i>
      <span>Pengaduan</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.laporan.index') }}">
      <i class="fas fa-fw fa-file-word"></i>
      <span>Laporan</span></a>
  </li>
  @elseif(Auth::guard('petugas')->user()->level == 'Petugas' && Auth::guard('petugas')->user()->status == 1)
  <li class="nav-item">
    <a class="nav-link" href="{{ route('petugas.home') }}">
      <i class="fas fa-fw fa-home"></i>
      <span>Dashboard</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('petugas.pengaduan.index') }}">
      <i class="fas fa-fw fa-file-alt"></i>
      <span>Pengaduan</span></a>
  </li>
  @endif
  @elseif(Auth::guard('masyarakat')->check())
  <li class="nav-item">
    <a class="nav-link" href="{{ route('masyarakat.home') }}">
      <i class="fas fa-fw fa-home"></i>
      <span>Dashboard</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('masyarakat.pengaduan.index') }}">
      <i class="fas fa-fw fa-file-alt"></i>
      <span>Pengaduan</span></a>
  </li>
  @endif

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>