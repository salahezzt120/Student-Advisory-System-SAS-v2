<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">HIM STUDENT<sup></sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>



    <li class="nav-item">
    <a class="nav-link" href="{{ route('cregistration') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Course Registration</span></a>
  </li>

    <li class="nav-item">
    <a class="nav-link" href="{{ route('catalog') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Catalog</span></a>
  </li>

  <li class="nav-item">
  <!-- Link to the student's own scheduled meetings -->
  <a class="nav-link" href="{{ route('student.meetings') }}">
    <i class="fas fa-fw fa-calendar-alt"></i>
    <span>Your Scheduled Meetings</span>
  </a>
</li>


  <li class="nav-item">
    <a class="nav-link" href="{{ route('Students') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Profile</span>
    </a>
  </li>


  <!-- Other user-specific links -->
  <!-- Add your other links here -->

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>