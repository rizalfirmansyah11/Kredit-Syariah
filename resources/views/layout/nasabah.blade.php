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
    /* body {
     font-family: 'Cairo', sans-serif;
   }
   h1, h2, h3, h4, h5, h6 {
     font-family: 'Amiri', serif;
   }
   
   
   .btn-primary {
     font-family: 'Cairo', sans-serif;
     font-size: 1.2rem;
     font-weight: 700;
   } */
  /* Sidebar background to white */
.main-sidebar {
 background-color: #ffffff !important; /* Background putih */
 color: #000000; /* Teks hitam untuk kontras */
}

/* Sidebar link colors */
.main-sidebar .nav-link {
 color: #000000 !important; /* Warna teks hitam */
}

.main-sidebar .nav-link:hover {
 background-color: #f0f0f0 !important; /* Warna hover abu-abu terang */
 color: #007bff !important; /* Warna teks biru saat dihover */
}

/* Active link styling */
.main-sidebar .nav-link.active {
 background-color: #007bff !important; /* Background biru untuk link aktif */
 color: #ffffff !important; /* Teks putih untuk link aktif */
 border-radius: 5px; /* Sedikit melengkung untuk sudut */
}

/* Sidebar header and footer */
.main-sidebar .brand-link {
 background-color: #f4f4f4 !important; /* Background abu-abu terang */
 color: #007bff !important; /* Teks biru */
}

.main-sidebar .brand-link:hover {
 background-color: #e6e6e6 !important; /* Hover abu-abu lebih gelap */
}

/* Sidebar user panel */
.user-panel .info a {
 color: #007bff !important; /* Warna teks biru */
 font-weight: bold;
}

.user-panel .info a:hover {
 text-decoration: underline;
}

/* Divider styling for separation */
.nav-sidebar > .nav-item > .nav-link {
 border-bottom: 1px solid #f4f4f4 !important; /* Garis pemisah */
}

/*  */
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
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
   


</nav>
<!-- /.navbar -->
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
   <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a style="display: flex; align-items: center; margin: 0; padding: 10px 15px; background-color: #f8f9fa;">
    <img src="{{ asset('lte/dist/img/logonyar2.png') }}" 
         class="brand-image img-circle elevation-3" 
         style="opacity: 1; width: 50px; height: 50px; object-fit: contain;">
         <span class="brand-text font-weight-bold" 
         style="font-size: 15px; color: #00a7e9; margin-left: 15px; font-family: 'Scheherazade', serif;">Kredit Syariah</span>
  
  </a>

 <!-- Sidebar -->
<div class="sidebar" style="margin: 0; padding: 0;">
 <!-- Sidebar user panel (optional) -->
<!-- Sidebar user panel (optional) -->
<div class="user-panel d-flex" style="margin: 10px 0; padding: 10px 15px; background-color: #ffffff;">
  <div class="image" style="margin-right: 10px;">
    <!-- Tambahkan kondisi untuk mengganti foto -->
    <img id="user-image" src="{{ asset('lte/dist/img/contact.png') }}" class="img-circle elevation-2" alt="User Image" style="height: 30px; width: 30px;">
  </div>
  <div class="info">
    <a href="#" class="d-block" style="color: #007bff; font-weight: bold;">
        Welcome, {{ Auth::user()->name ?? 'User' }}
    </a>
</div>

</div>

  

  <!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
    <li class="nav-item menu-open" style="margin-bottom: 10px;">
      <a href="{{ route('nasabah.dashboard') }}" class="nav-link">
        <i class="nav-icon fas fa-home"></i> <!-- Change to home icon -->
        <p>Dashboard</p> <!-- Removed the arrow icon -->
      </a>
    </li>



    <li class="nav-item" style="margin-bottom: 10px;">
      <a href="{{ route('nasabah.nasabah.produk') }}" class="nav-link">
        <i class="nav-icon fas fa-box"></i>
        <p>Produk</p>
      </a>
    </li>


    <li class="nav-item" style="margin-bottom: 10px;">
      <a href="{{ route('nasabah.simulasi') }}" class="nav-link">
        <i class="nav-icon fas fa-calculator"></i>
        <p>Simulasi Akad</p>
      </a>
    </li>

   
    


    <?php
      $id = auth()->user()->id; // contoh penggunaan id user yang sedang login
    ?>

    <li class="nav-item" style="margin-bottom: 10px;">
      <a href="{{ route('nasabah.lihatakad', ['id' => $id]) }}" class="nav-link">
        <i class="nav-icon fas fa-handshake"></i>
        <p>Akad</p>
      </a>
    </li>

    
    {{-- <li class="nav-item" style="margin-bottom: 10px;">
      <a href="{{ route('nasabah.nasabah.bikinAkad', ['id' => $id]) }}" class="nav-link">
        <i class="nav-icon fas fa-handshake"></i>
        <p>Akad Baru</p>
      </a>
    </li> --}}

    <li class="nav-item" style="margin-bottom: 10px;">
      <a href="{{ route('nasabah.nasabah.pembayaran') }}" class="nav-link">
        <i class="nav-icon fas fa-credit-card"></i>
        <p>Pembayaran</p>
      </a>
    </li>

    {{-- <!-- Katalog Barang -->
    <li class="nav-item" style="margin-bottom: 10px;">
      <a href="{{ route('nasabah.nasabah.katalog') }}" class="nav-link">
        <i class="nav-icon fas fa-box-open"></i>
        <p>Katalog Barang</p>
      </a>
    </li> --}}

    <!-- Form Logout untuk Nasabah -->
    <li class="nav-item">
      <a href="{{ route('nasabah.nasabah.logout') }}" 
         class="nav-link" 
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="nav-icon fas fa-sign-out-alt"></i> <!-- Ikon logout -->
        <p>Logout</p>
      </a>
      <form id="logout-form" action="{{ route('nasabah.nasabah.logout') }}" method="POST" style="display: none;">
        @csrf <!-- Token CSRF -->
      </form>
    </li>
  </ul>
</nav>




      <!-- /.sidebar-menu -->

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
