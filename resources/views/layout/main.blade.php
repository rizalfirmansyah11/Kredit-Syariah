<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/summernote/summernote-bs4.min.css') }}">
 

  <style>
    .main-sidebar {
      background-color: #009990!important; /* Hijau tua */
    }
    .main-sidebar .nav-link, 
    .main-sidebar .brand-link, 
    .main-sidebar .user-panel .info a {
      color: white !important; /* Mengubah warna teks menjadi putih */
    }

    .welcome-text {
    font-family: 'Quicksand', sans-serif;
    font-size: 14px;
    font-weight: bold;
    color: #2E7D32; /* Hijau tua profesional */
}
  
    .main-sidebar .nav-link:hover {
      color: #ccc !important; /* Mengubah warna teks saat hover menjadi abu-abu terang */
      
    }
  </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('lte/dist/img/logonyar.png') }}" alt="Kredit Syariah" height="60" width="60">


  </div>

  <!-- Navbar -->
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
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
   <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a style="display: flex; align-items: center; margin: 0; padding: 10px 15px; background-color: #009990;">
    <img src="{{ asset('lte/dist/img/logonyar3.png') }}" 
         class="brand-image img-circle elevation-3" 
         style="opacity: 1; width: 50px; height: 50px; object-fit: contain;">
         <span class="brand-text font-weight-bold" 
         style="font-size: 15px; color: #ffffff; margin-left: 15px; font-family: 'Scheherazade', serif;">Kredit Syariah</span>
  
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <i class="fas fa-user-circle fa-2x text-white"></i>
    </div>
    
    <div class="info">
      <a class="d-block welcome-text">
          Welcome, Admin {{ Auth::user()->name ?? 'Guest' }}
      </a>
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
    <!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Dashboard -->
    <li class="nav-item">
      <a href="{{ route('admin.dashboard') }}" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i> <!-- Ikon dashboard -->
        <p>Dashboard</p>
      </a>
    </li>

    <!-- Produk -->
    <li class="nav-item">
      <a href="{{ route('admin.admin.produk') }}" class="nav-link">
        <i class="nav-icon fas fa-box"></i> <!-- Ikon produk -->
        <p>Produk</p>
      </a>
    </li>

    <!-- Simulasi Kredit -->
    <li class="nav-item">
      <a href="{{ route('admin.admin.simulasi') }}" class="nav-link">
        <i class="nav-icon fas fa-calculator"></i> <!-- Ikon kalkulator -->
        <p>Simulasi Kredit</p>
      </a>
    </li>

    {{-- <!-- Manajemen Margin Kategori -->
    <li class="nav-item">
      <a href="{{ route('admin.admin.marginKategori.index') }}" class="nav-link">
        <i class="nav-icon fas fa-percentage"></i> <!-- Ikon persentase -->
        <p>Margin Management</p>
      </a>
    </li> --}}

    <!-- User Management -->
    <li class="nav-item">
      <a href="{{ route('admin.index') }}" class="nav-link">
        <i class="nav-icon fas fa-user-cog"></i> <!-- Ikon user management -->
        <p>User Management</p>
      </a>
    </li>

    <!-- Akad -->
    <li class="nav-item">
      <a href="{{ route('admin.admin.akads') }}" class="nav-link">
        <i class="nav-icon fas fa-handshake"></i> <!-- Ikon akad (handshake) -->
        <p>Akad</p>
      </a>
    </li>

    <!-- Riwayat Akad -->
    <li class="nav-item">
      <a href="{{ route('admin.admin.akads.riwayat') }}" class="nav-link">
        <i class="nav-icon fas fa-history"></i> <!-- Ikon riwayat -->
        <p>Riwayat Akad</p>
      </a>
    </li>

    <!-- Logout -->
    <li class="nav-item">
      <a href="{{ route('admin.admin.logout') }}" class="nav-link" 
         onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">
        <i class="nav-icon fas fa-sign-out-alt"></i> <!-- Ikon logout -->
        <p>Logout</p>
      </a>
      <form id="admin-logout-form" action="{{ route('admin.admin.logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </li>
  </ul>
</nav>

            
         
      

    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
  <!-- Content  Wrapper. Contains page content -->
 

  <!-- Content Wrapper. Contains page content -->
 @yield('content')
  <!-- /.content-wrapper -->
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('lte/plugins/chart.js/Chart.min') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('lte/plugins/sparklines/sparkline') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('lte/plugins/jqvmap/jquery.vmap.min') }}"></script>
<script src="{{ asset('lte/plugins/jqvmap/maps/jquery.vmap.usa') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('lte/plugins/jquery-knob/jquery.knob.min') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('lte/plugins/moment/moment.min') }}"></script>
<script src="{{ asset('lte/plugins/daterangepicker/daterangepicker') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min') }}"></script>
<!-- Summernote -->
<script src="{{ asset('lte/plugins/summernote/summernote-bs4.min') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('lte/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('lte/dist/js/pages/dashboard.js') }}"></script>
</body>
</html>
