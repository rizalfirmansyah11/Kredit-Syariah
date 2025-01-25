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

  <!-- Main Content -->
  <div class="content-wrapper">
    <div class="content">
      <div class="container mt-5">
        <h1 class="fw-bold text-primary text-center">Buat Akad Baru</h1>
        <div class="card shadow-lg border-0">
          <div class="card-body">
            <form action="{{ route('nasabah.simpanakad') }}" method="POST" enctype="multipart/form-data">
              @csrf
              
              <!-- Subjudul Data Diri -->
              <h3 class="fw-bold text-dark mb-4" style="font-family: 'Roboto', sans-serif;">Data Diri</h3>
              <div class="mb-4">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
              </div>
              <div class="mb-4">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" required maxlength="16">
              </div>
              <div class="mb-4">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" required></textarea>
              </div>
              <div class="mb-4">
                <label for="telepon" class="form-label">No. Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon" required>
              </div>
              <div class="mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              
              <!-- Subjudul Detail Benda -->
              <h3 class="fw-bold text-dark mb-4" style="font-family: 'Roboto', sans-serif;">Detail Benda</h3>
              <div class="mb-4">
                <label for="jenis_benda" class="form-label">Jenis Benda</label>
                <input type="text" class="form-control" id="jenis_benda" name="jenis_benda" required>
              </div>
              <div class="mb-4">
                <label for="merek_benda" class="form-label">Merek</label>
                <input type="text" class="form-control" id="merek_benda" name="merek_benda" required>
              </div>
              <div class="mb-4">
                <label for="tahun_pembuatan" class="form-label">Tahun Pembuatan</label>
                <input type="number" class="form-control" id="tahun_pembuatan" name="tahun_pembuatan" required>
              </div>
              <div class="mb-4">
                <label for="harga_benda" class="form-label">Harga Benda</label>
                <input type="number" class="form-control" id="harga_benda" name="harga_benda" required>
              </div>
              <div class="form-group">
                <label for="foto_benda">Foto Benda</label>
                <input type="file" name="foto_benda" id="foto_benda" class="form-control">
            </div>
              
              <!-- Subjudul Informasi Kredit -->
              <h3 class="fw-bold text-dark mb-4" style="font-family: 'Roboto', sans-serif;">Informasi Kredit</h3>
              <div class="mb-4">
                <label for="tanggal_pembuatan" class="form-label">Tanggal Pembuatan</label>
                <input type="date" class="form-control" id="tanggal_pembuatan" name="tanggal_pembuatan" required>
              </div>
              <div class="mb-4">
                <label for="jumlah_kredit" class="form-label">Jumlah Kredit</label>
                <input type="number" class="form-control" id="jumlah_kredit" name="jumlah_kredit" required>
              </div>
              <div class="mb-4">
                <label for="jangka_waktu" class="form-label">Jangka Waktu (bulan)</label>
                <input type="number" class="form-control" id="jangka_waktu" name="jangka_waktu" required>
              </div>
              
              <button type="submit" class="btn btn-primary w-100">Simpan Akad</button>
            </form>
          </div>
        </div>
      </div>
    </div>
 

  <footer class="main-footer text-center">
    <strong>Copyright &copy; 2024 Kredit Syariah</strong>
  </footer>
</div>

<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('lte/dist/js/adminlte.js') }}"></script>
</body>
</html>
