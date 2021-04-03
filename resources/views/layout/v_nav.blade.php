@if(Auth::guard('petugas')->check())
@if(Auth::guard('petugas')->user()->level == 'Admin' && Auth::guard('petugas')->user()->status == 1)
<li class="nav-item">
    <a href="{{ route('admin.home') }}"><i class="fa fa-bank"></i><span> Dashboard</span></a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.users.index') }}"><i class="fa fa-user"></i><span> Admin</span></a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.users.indexPetugas') }}"><i class="fa fa-users"></i><span> Petugas</span></a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.users.indexMasyarakat') }}"><i class="fa fa-users"></i><span> Masyarakat</span></a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.pengaduan.index') }}"><i class="fa fa-file-text"></i><span> Pengaduan</span></a>
</li>
@elseif(Auth::guard('petugas')->user()->level == 'Petugas' && Auth::guard('petugas')->user()->status == 1)
<li class="nav-item">
    <a href="{{ route('petugas.home') }}"><i class="fa fa-bank"></i><span> Dashboard</span></a>
</li>
<li class="nav-item">
    <a href="{{ route('petugas.pengaduan.index') }}"><i class="fa fa-file-text"></i><span> Pengaduan</span></a>
</li>
@endif
@elseif(Auth::guard('masyarakat')->check())
<li class="nav-item">
    <a href="{{ route('masyarakat.home') }}"><i class="fa fa-bank"></i><span> Dashboard</span></a>
</li>
<li class="nav-item">
    <a href="{{ route('masyarakat.pengaduan.index') }}"><i class="fa fa-file-text"></i><span> Pengaduan</span></a>
</li>
@endif