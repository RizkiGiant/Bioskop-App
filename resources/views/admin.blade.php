<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bioskop | {{ $subtitle }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url ('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url ('dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{url('template/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{url('template/js/select.dataTables.min.css')}}">
  <link rel="stylesheet" href="{{url('https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
        </div> --}}
        <div class="info">
          {{-- <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
          {{-- <br><br/> --}}
          <a href="#" class="" style="text-align: center">Hi, <b> [{{ Auth::user()->role }}]</b></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          {{-- <li class="nav-header">LABELS</li> --}}
          <li class="nav-item">
            <a href="{{ url ('') }}" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p class="text">Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url ('products')}}" class="nav-link">
              <i class="nav-icon fa fa-box"></i>
              <p>Produk</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url ('transactions') }}" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>Transaksi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url ('ruang')}}" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>Teater</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url ('users') }}" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>User</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url ('log')}}" class="nav-link">
              <i class="nav-icon fa fa-history"></i>
              <p>Log</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route ('logout')}}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
              <p class="text-danger">Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    {{-- <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div> --}}
    <strong>Copyright &copy; 2014-2021 <a href="https://instagram.com/r.giants_">Rizki Giant</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{url ('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url ('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url ('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="../../dist/js/demo.js"></script> --}}
{{-- Datatable --}}
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="crossorigin="anonymous"></script>
<script type="text/javascript">let table = new DataTable('#myTable');</script>
</body>
</html>
