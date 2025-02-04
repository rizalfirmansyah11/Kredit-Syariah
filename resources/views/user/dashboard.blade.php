<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard 2</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css')}}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  <style>
     body {
      font-family: 'Cairo', sans-serif;
    }
    h1, h2, h3, h4, h5, h6 {
      font-family: 'Amiri', serif;
    }
    .content-wrapper {
      background: #f8f9fa;
    }
    .btn-primary {
      font-family: 'Cairo', sans-serif;
      font-size: 1.2rem;
      font-weight: 700;
    }
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

body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    .card {
  margin-left: 20px; /* Atur jarak sesuai keinginan */
}
.container {
  padding-left: 10px; /* Sesuaikan nilai */
}

    .container-fluid {
      max-width: 1200px;
      margin: 20px auto;
      padding: 20px;
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card {
      background-color: #f8f9fa;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card h1 {
      color: #007bff;
      font-weight: bold;
      text-align: center;
      margin-bottom: 10px;
    }

    .card h3 {
      text-align: center;
      color: #555;
      margin-bottom: 20px;
    }

    .card p {
      font-size: 16px;
      line-height: 1.8;
      color: #333;
      margin-bottom: 20px;
    }

    .card ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .card ul li {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
    }

    .card ul li img {
      width: 24px;
      vertical-align: middle;
      margin-right: 10px;
    }

    .card ul li strong {
      color: #007bff;
    }

    .card-footer {
      text-align: center;
      padding: 10px;
      background-color: #e9ecef;
      border-radius: 0 0 10px 10px;
    }

    .card-footer a {
      color: #007bff;
      text-decoration: none;
      font-weight: bold;
    }

    .row {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .col-md-12 {
      flex: 1 1 100%;
    }
    content-wrapper {
  padding-left: 0 !important; /* Menghapus padding kiri */
  margin-left: 0 !important; /* Menghapus margin kiri */
}

.content-wrapper {
  padding-left: 10px; /* Sesuaikan nilai untuk membuat konten lebih ke kiri */
}

.card {
  margin-left: 0px; /* Pastikan margin kiri nol untuk setiap kartu */
  padding-left: 10px; /* Tambahkan padding internal agar teks tidak menempel */
}

.container {
  padding-left: 15px; /* Atur padding pada container */
}

.row {
  margin-left: 0; /* Hapus margin bawaan baris */
}
.navbar .form-control {
  border-radius: 10px;
  background-color: #f8f9fa; /* Warna latar belakang input */
  border: none; /* Hilangkan border */
  box-shadow: none; /* Hilangkan bayangan */
}

.navbar .img-circle {
  border: 1px solid #e9ecef;
}

.navbar .form-control-navbar {
  border-radius: 20px; /* Membulatkan tepi input */
  margin-left: 0; /* Jarak dari elemen lain */
  background-color: #f8f9fa; /* Warna latar belakang */
  border: none; /* Hilangkan border */
}

.navbar .btn-navbar {
  border: none; /* Hilangkan border tombol */
  background-color: transparent; /* Latar belakang transparan */
  color: #6c757d; /* Warna ikon */
  padding: 0; /* Hilangkan padding */
  margin: 0; /* Hilangkan margin */
}

.navbar .input-group-prepend {
  border-radius: 20px; /* Membuat ikon menyatu */
  background-color: transparent; /* Latar belakang transparan */
}

.navbar .input-group-prepend .btn-navbar i {
  margin: 0; /* Hilangkan jarak dalam ikon */
  color: #6c757d; /* Warna ikon */
}
.nav-sidebar .nav-item {
  margin-bottom: 10px; /* Mengatur jarak antar menu */
}

/* Menghilangkan margin terakhir */
.nav-sidebar .nav-item:last-child {
  margin-bottom: 0;
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
  



  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
<!-- Brand Logo -->
<!-- Brand Logo -->
<!-- Brand Logo -->
<a style="display: flex; align-items: center; margin: 0; padding: 10px 15px; background-color: #f8f9fa;">
  <img src="{{ asset('lte/dist/img/logonyar.png') }}" 
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
    <a href="#" class="d-block" style="color: #007bff; font-weight: bold;">Nasabah</a>
  </div>
</div>









      {{-- <!-- SidebarSearch Form -->
      <div class="form-inline">
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
      <a href="{{ route('nasabah.simulasi') }}" class="nav-link">
        <i class="nav-icon fas fa-calculator"></i>
        <p>Simulasi Akad</p>
      </a>
    </li>

    <?php
      $id = auth()->user()->id; // contoh penggunaan id user yang sedang login
    ?>

    <li class="nav-item" style="margin-bottom: 10px;">
      <a href="{{ route('nasabah.akad', ['id' => $id]) }}" class="nav-link">
        <i class="nav-icon fas fa-handshake"></i>
        <p>Akad</p>
      </a>
    </li>

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
    </div>
    <!-- /.sidebar -->
  </aside>
<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="padding: 0; margin: 0; background: #f8f9fa;">
  <section class="content">
    <div class="container-fluid p-4">

      <!-- Header Section -->
      <div class="row mb-4">
        <div class="col-md-12">
          <div class="card shadow-lg p-5 text-center bg-primary text-white rounded-4">
            <h1 class="mb-3 fw-bold">Kredit Syariah</h1>
            <h3 class="mb-3">Membangun Masa Depan dengan Prinsip Islami</h3>
            <p class="mb-0">
              Kredit syariah adalah layanan keuangan yang berlandaskan prinsip-prinsip syariah, seperti akad yang sesuai dengan hukum Islam.
            </p>
          </div>
        </div>
      </div>

      <!-- Benefits Section -->
      <div class="row">
        <div class="col-md-12">
          <div class="card shadow-sm p-5 rounded-4">
            <h2 class="mb-5 text-center text-primary fw-bold">Manfaat Kredit Syariah</h2>
            <div class="row">
              
              <!-- Transparansi -->
              <div class="col-md-6 mb-4">
                <div class="card p-4 shadow-sm border-0 rounded-3">
                  <div class="d-flex align-items-start">
                    <img src="{{ asset('lte/dist/img/transparency.png') }}" alt="Transparansi" class="me-3" style="width: 70px; height: 70px;">
                    <div>
                      <h5 class="text-primary fw-bold">Prinsip Transparansi</h5>
                      <p class="mb-0">Semua transaksi dilakukan dengan prinsip transparansi penuh.</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Tanpa Riba -->
              <div class="col-md-6 mb-4">
                <div class="card p-4 shadow-sm border-0 rounded-3">
                  <div class="d-flex align-items-start">
                    <img src="{{ asset('lte/dist/img/no-riba.png') }}" alt="Tanpa Riba" class="me-3" style="width: 70px; height: 70px;">
                    <div>
                      <h5 class="text-primary fw-bold">Tanpa Riba</h5>
                      <p class="mb-0">Kredit syariah tidak melibatkan bunga (riba) yang dilarang dalam Islam.</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Akad yang Jelas -->
              <div class="col-md-6 mb-4">
                <div class="card p-4 shadow-sm border-0 rounded-3">
                  <div class="d-flex align-items-start">
                    <img src="{{ asset('lte/dist/img/contract.png') }}" alt="Akad Jelas" class="me-3" style="width: 70px; height: 70px;">
                    <div>
                      <h5 class="text-primary fw-bold">Akad yang Jelas</h5>
                      <p class="mb-0">Setiap transaksi berdasarkan akad yang sah, seperti murabaha, mudharabah, dan musyarakah.</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Partisipasi Bersama -->
              <div class="col-md-6 mb-4">
                <div class="card p-4 shadow-sm border-0 rounded-3">
                  <div class="d-flex align-items-start">
                    <img src="{{ asset('lte/dist/img/group.png') }}" alt="Partisipasi" class="me-3" style="width: 70px; height: 70px;">
                    <div>
                      <h5 class="text-primary fw-bold">Partisipasi Bersama</h5>
                      <p class="mb-0">Nasabah memiliki partisipasi dalam proyek atau bisnis yang dibiayai.</p>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <!-- Footer CTA -->
            <div class="text-center mt-5">
              <a href="#" class="btn btn-lg btn-primary px-5 py-3 rounded-pill fw-bold">
                Pelajari Lebih Lanjut
              </a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>

  
    
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <footer class="main-footer">
    <strong>Welcome, {{ auth()->user()->name }}.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('lte/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('lte/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('lte/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('lte/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('lte/plugins/chart.js/Chart.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('lte/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('lte/dist/js/pages/dashboard2.js') }}"></script>
</body>
</html>
