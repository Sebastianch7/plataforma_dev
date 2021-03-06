<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fa fa-cube"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SERINPO</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  <!-- Divider -->
  @if(auth()->user()->role == 1 || auth()->user()->role == 2)
  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('role.index') }}">
      <i class="fas fa-fw fa-tags"></i>
      <span>Perfiles</span></a>
  </li>
  @endif
  @if(auth()->user()->role == 1 || auth()->user()->role == 2)
  <li class="nav-item">
    <a class="nav-link" href="{{ route('company.index') }}">
      <i class="fas fa fa-users"></i>
      <span>Clientes</span></a>
  </li>
  @endif
  @if(auth()->user()->role == 1 || auth()->user()->role == 2)
  <li class="nav-item">
    <a class="nav-link" href="{{ route('user.index') }}">
      <i class="fas fa-fw fa-address-book"></i>
      <span>Usuarios</span></a>
  </li>
  @endif
  @if(auth()->user()->role == 1 || auth()->user()->role == 2)
  <li class="nav-item">
    <a class="nav-link" href="{{ route('service.index') }}">
      <i class="fas fa-fw fa-tags"></i>
      <span>Servicios</span></a>
  </li>
  @endif
  @if(auth()->user()->role == 1 || auth()->user()->role == 2 || auth()->user()->role == 5 || auth()->user()->role == 6)
  <li class="nav-item">
    <a class="nav-link" href="{{ route('solicitude.index') }}">
      <i class="fas fa fa-check-circle"></i>
      <span>Solicitudes</span></a>
  </li>
  @endif
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->