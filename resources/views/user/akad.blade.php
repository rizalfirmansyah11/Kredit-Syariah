<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Nasabah</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
  <style>
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
 
   </style>
   
 </head>
 <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

 <!-- Preloader -->
 <div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div>
<nav class="main-header navbar navbar-expand navbar-light bg-white border-bottom">
  <!-- Left navbar: Search Bar -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <form class="form-inline">
        <div class="input-group input-group-sm">
          <!-- Ikon search menyatu dengan input -->
          <div class="input-group-prepend">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
          <input class="form-control form-control-navbar" type="search" placeholder="Search..." aria-label="Search">
        </div>
      </form>
    </li>
  </ul>

  <!-- Right navbar: User Avatar -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <img src="{{ asset('lte/dist/img/user2-160x160.jpg') }}" alt="User Avatar" class="img-circle elevation-2" style="height: 30px; width: 30px;">
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="#" class="dropdown-item">Profile</a>
        <a href="#" class="dropdown-item">Settings</a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">Logout</a>
      </div>
    </li>
  </ul>
</nav>


  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      <img src="{{ asset('lte/dist/img/logonyar.png') }}" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-bold" 
       style="font-size: 15px; color: #00a7e9; margin-left: 15px; font-family: 'Scheherazade', serif;">Kredit Syariah</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('lte/dist/img/contact.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column">
          <li class="nav-item">
            <a href="{{ route('nasabah.dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('nasabah.simulasi') }}" class="nav-link">
              <i class="nav-icon fas fa-calculator"></i>
              <p>Simulasi Akad</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('nasabah.akad', ['id' => auth()->user()->id]) }}" class="nav-link">
              <i class="nav-icon fas fa-handshake"></i>
              <p>Akad</p>
            </a>
          </li>
          
    <li class="nav-item">
      <a href="{{ route('nasabah.nasabah.pembayaran') }}" class="nav-link">
        <i class="nav-icon fas fa-credit-card"></i>
        <p>Pembayaran</p>
      </a>

          <li class="nav-item">
            <a href="{{ route('nasabah.nasabah.logout') }}" 
               class="nav-link" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

<!-- Content Wrapper -->
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <!-- Judul Halaman -->
      <div class="row">
        <div class="col-md-12 text-center my-4">
          <h1 style="font-weight: bold; color: #007bff;">Selamat Datang di Kredit Syariah</h1>
          <p class="text-muted">Kelola akad dan pembiayaan Anda dengan mudah di sini.</p>
        </div>
      </div>

      <!-- Kartu-Kartu -->
      <div class="row justify-content-center">
        <!-- Kartu Akad -->
        <div class="col-md-5 mb-4">
          <div class="card shadow-lg border-0" style="border-radius: 15px;">
            <div class="card-body text-center">
              <div class="icon-container mb-3">
                <i class="fas fa-file-signature text-primary" style="font-size: 50px;"></i>
              </div>
              <h3 class="text-primary">Buat Akad Anda</h3>
              <p class="text-muted">Mulai membuat akad baru untuk kebutuhan Anda dengan proses yang mudah dan cepat.</p>
              <a href="{{ route('nasabah.buatakad', ['id' => auth()->user()->id]) }}" class="btn btn-primary">
                Buat Akad
              </a>
            </div>
          </div>
        </div>

      <!-- Kartu Persetujuan -->
<div class="col-md-5 mb-4">
  <div class="card shadow-lg border-0" style="border-radius: 15px;">
    <div class="card-body text-center">
      <div class="icon-container mb-3">
        <i class="fas fa-check-circle text-success" style="font-size: 50px;"></i>
      </div>
      <h3 class="text-success">Lihat Akad Anda</h3>
      <p class="text-muted">Cek status persetujuan akad Anda kapan saja dengan mudah.</p>
      <a href="{{ route('nasabah.lihatakad', ['id' => auth()->user()->id]) }}" class="btn btn-success">
        Lihat Persetujuan
      </a>
    </div>
  </div>
</div>

{{-- <div class="content-wrapper">
  <!-- Additional Information Section -->
  <div class="alert alert-info text-center mt-4 mx-4">
    <h5 class="mb-3">
      <i class="fas fa-info-circle"></i> Tips untuk Anda:
    </h5>
    <p>
      Jangan lupa untuk memastikan semua data yang Anda masukkan sudah benar sebelum memulai akad.
      Jika membutuhkan bantuan, Anda bisa menghubungi layanan pelanggan kami.
    </p>
  </div> --}}

  <!-- Footer Section -->
  <footer class="main-footer text-center mt-auto">
    <strong>Copyright &copy; 2024 Kredit Syariah</strong>
  </footer>
</div>

      
      


<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('lte/dist/js/adminlte.js') }}"></script>
</body>
</html>
