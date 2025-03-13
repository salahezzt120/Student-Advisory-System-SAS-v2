<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">HIM Admin <sup></sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Display "Profile" link only for admin users -->
  

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  

  <li class="nav-item">
    <a class="nav-link" href="{{ route('programs') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Programs</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('courses') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Courses</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('cassessments') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Manage Students</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('ameeting') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Advising meeting</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/profile">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Profile</span>
    </a>
  </li>

  

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>



