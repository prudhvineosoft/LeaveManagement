<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
</head>

<body>
  <aside class="main-sidebar sidebar-dark-primary bg-color elevation-4 ">



    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <div class="image pl-1">
        <img src="{{ asset('images/logo.png') }}" class="logo-sidebar" alt="logo" width="50"><br />
        <span class="brand-text font-weight-light brand-name">Leave Management System</span>
      </div>
    </a>

    <!-- Sidebar -->
    <div class="fix-sidebar">
      <div class="sidebar fixed">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel d-flex align-items-center  name">
          <div class="image pl-1">
            <img src="{{asset('uploads/'. Auth::user()->image_path)  }}" alt="image">
          </div>
          <div class="info  ml-3">
            <a href="/dashboard" class="name">{{ Auth::user()->name }}</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->

            <li class="nav-item mt-2">
              <a href="/dashboard" class="nav-link {{ (request()->is('dashbo*'))  ? 'active' : '' }}">
                <i class="fas fa-columns nav-icon"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            @if(Auth::user()->hasRole('HOD'))
            <li class="nav-item mt-2">
              <a href="/staff" class="nav-link {{ (request()->is('staff*'))  ? 'active' : '' }}">
                <i class="fas fa-users nav-icon"></i>
                <p>
                  Staff Management
                </p>
              </a>
            </li>
            @endif
            @if(Auth::user()->hasRole('HOD'))
            <li class="nav-item mt-2">
              <a href="/LeaveManagement" class="nav-link {{ (request()->is('leave*'))  ? 'active' : '' }}">
                <i class="fas fa-sign-out-alt nav-icon"></i>
                <p>
                  Leave Management
                </p>
              </a>
            </li>
            @endif
            @if(Auth::user()->hasRole('staff'))
            <li class="nav-item mt-2">
              <a href="/leaves" class="nav-link {{ (request()->is('leave*'))  ? 'active' : '' }}">
                <i class="fas fa-sign-out-alt nav-icon"></i>
                <p>
                  Leave Management
                </p>
              </a>
            </li>
            @endif
          </ul>

        </nav>


        <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>
</body>

</html>