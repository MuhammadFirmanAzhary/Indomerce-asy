<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
      </div>
      <div class="info d-flex row ">
        <img src="images/kribo.jpeg" class="rounded-circle">
        <a href="{{url('dashboard')}}" class="d-block my-auto ml-2">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-header"><b>MAIN</b></li>
        <li class="nav-item">
          <a href="{{url('dashboard')}}" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        {{-- <li class="nav-header"><b>ACCOUNT</b></li> --}}
        {{-- <li class="nav-item">
            <a href="{{ url('profile') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p class="text-red-600">Profile</p>
            </a>
          </li> --}}
          
        <li class="nav-item mb-2 mt-3">
          <a href="{{ route('logout') }}" class="nav-link btn-danger text-white"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p class="font-weight-bold">LOGOUT</p>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
      </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>