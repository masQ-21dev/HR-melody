<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title', '|| SIAPEG')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    {{-- Font Awasome --}}

    <link rel="stylesheet" href="{{ asset('/') }}assets/plugins/AdminLTE/fontawesome-free/css/all.min.css">
    {{-- data tables --}}
    <link rel="stylesheet" href="{{ asset('/') }}assets/plugins/AdminLTE/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/plugins/AdminLTE/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/plugins/AdminLTE/datatables-buttons/css/buttons.bootstrap4.min.css">
    {{-- theme style --}}
    <link rel="stylesheet" href="{{ asset('/') }}assets/plugins/AdminLTEstyle/dist/css/adminlte.min.css">

    {{-- Bootstraps --}}
    <link href="{{ asset('/') }}assets/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    @yield('style')
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            {{-- <li class="nav-item d-none d-sm-inline-block">
              <a href="" class="nav-link">Home</a>
            </li> --}}
          </ul>

          <!-- Right navbar links -->
          <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
              <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
              </a>
            </li> --}}
          </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
          <!-- Brand Logo -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                <img src="{{ asset('/') }}assets/images/Logo-Gatra.png" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                <span  class="d-block brand-text font-weight-light text-white">SIAPEG GATRA MAPAN</span>
              </div>
          </div>

          <!-- Sidebar -->
          <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel pb-3 mb-3 d-flex">
              <div class="info">
                <span class="d-block text-white">{{Auth::user()->username}} as  {{Auth::user()->role->role_name}}</span>
              </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-header">MENU</li>
                <li class="nav-item">
                  <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-user-friends"></i>
                    <p>
                      Beranda
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('karyawan.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-user-friends"></i>
                    <p>
                      Karyawan
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('departemen.filter') }}" class="nav-link">
                        <i class="nav-icon far fa-building"></i>
                        <p>
                            Departemen
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-table"></i>
                      <p>
                        Input data
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('deparatement.create') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>input Departemen</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('karyawan.create') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>input Karyawan</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="../tables/jsgrid.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>input dengan exel</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                @if (Auth::user()->role->id == '1')
                    <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                        Akun User
                        </p>
                    </a>
                    </li>
                @endif
                <li class="nav-item">
                  <a href="{{route('logout')}}" class="nav-link">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p class="text">Logout</p>
                  </a>
                </li>
              </ul>
            </nav>
            <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper px-2">
            <main>
                @yield('content')
            </main>
        </div>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
              <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2023 <a href="https://melody-id.com/">PT. GATRA MAPAN</a>.</strong> All rights reserved.
          </footer>

          <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>

    <script src="{{ asset('/') }}assets/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="{{ asset('/') }}assets/plugins/AdminLTE/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/') }}assets/plugins/AdminLTE/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('/') }}assets/plugins/AdminLTE/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}assets/plugins/AdminLTE/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('/') }}assets/plugins/AdminLTE/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('/') }}assets/plugins/AdminLTE/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('/') }}assets/plugins/AdminLTE/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('/') }}assets/plugins/AdminLTE/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('/') }}assets/plugins/AdminLTE/jszip/jszip.min.js"></script>
    <script src="{{ asset('/') }}assets/plugins/AdminLTE/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('/') }}assets/plugins/AdminLTE/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('/') }}assets/plugins/AdminLTE/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('/') }}assets/plugins/AdminLTE/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('/') }}assets/plugins/AdminLTE/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/') }}assets/plugins/AdminLTEstyle/dist/js/adminlte.min.js"></script>
    {{-- <script src="{{ asset('/') }}assets/plugins/AdminLTEstyle/dist/js/demo.js"></script> --}}


    @yield('script')
</body>
</html>
