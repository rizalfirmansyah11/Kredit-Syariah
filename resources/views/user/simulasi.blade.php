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
  <style>
    /* Mengubah warna sidebar menjadi biru muda */
    .main-sidebar {
      background-color: #0391e9 !important; /* Warna biru muda */
    }
    .main-sidebar .nav-link:hover {
      background-color: #f4f4f4 !important; /* Warna hover lebih terang */
      color: #007bff !important; /* Warna teks hover menjadi biru */
    }
    /* Mengubah background tengah menjadi putih */
    .content-wrapper {
      background-color: #ffffff !important; /* Warna putih */
    }
    /* Mengubah warna teks judul dashboard menjadi hitam */
    .content-header h1 {
      color: #000000 !important; /* Warna hitam */
    }
    /* Mengubah warna nama pengguna yang sedang login menjadi hitam */
    .user-panel .info a {
      color: #000000 !important; /* Warna hitam */
      font-size: 1.2rem; /* Ukuran font sedikit lebih besar */
      font-weight: bold; /* Membuat teks lebih tebal */
      font-family: 'Source Sans Pro', sans-serif; /* Font Google yang sudah diimpor */
    }
    .user-panel .info a:hover {
      text-decoration: underline; /* Garis bawah saat dihover */
      color: #007bff; /* Biru saat dihover */
    }
  </style>
  
</head>
<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
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
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('lte/dist/img/logonyar.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold" 
      style="font-size: 15px; color: #00a7e9; margin-left: 15px; font-family: 'Scheherazade', serif;">Kredit Syariah</span>
    </a>

   <!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="{{ asset('lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">{{ auth()->user()->name }}</a>
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
    <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
    <li class="nav-item menu-open">
      <a href="{{ route('nasabah.dashboard') }}" class="nav-link">
        <i class="nav-icon fas fa-home"></i>  <!-- Change to home icon -->
        <p>Dashboard</p> <!-- Removed the arrow icon -->
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('nasabah.simulasi') }}" class="nav-link">
        <i class="nav-icon fas fa-calculator"></i>
        <p>Simulasi Akad</p>
      </a>
    </li>

    <?php
      $id = auth()->user()->id; // contoh penggunaan id user yang sedang login
    ?>

    <li class="nav-item">
      <a href="{{ route('nasabah.akad', ['id' => $id]) }}" class="nav-link">
        <i class="nav-icon fas fa-handshake"></i>
        <p>Akad</p>
      </a>
    </li>

    
    <li class="nav-item">
      <a href="{{ route('nasabah.nasabah.pembayaran') }}" class="nav-link">
        <i class="nav-icon fas fa-credit-card"></i>
        <p>Pembayaran</p>
      </a>


    <!-- Form Logout untuk Nasabah (ditempatkan di posisi kiri bersama item lainnya) -->
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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  
   
    <!-- /.content-header -->

    <!-- Main content -->
     <!-- ISIE -->
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
   .content-wrapper {
  margin-left: -20px;
}

     </style>
     
   </head>
<!-- Content Wrapper -->
<div class="content-wrapper" style="margin-left: -20px;">
  <!-- Content Header -->
  <div class="content-header">
    <div class="container-fluid">
      <h1 class="text-center mt-4" style="font-weight: bold; color: #007bff;">Simulasi Pembiayaan Kredit Syariah</h1>
      <p class="text-center text-muted">Gunakan simulasi ini untuk menghitung estimasi pembiayaan Anda.</p>
    </div>
  </div>

  <!-- Main Content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- Form Simulasi -->
        <div class="col-md-6">
          <div class="card shadow-lg">
            <div class="card-header bg-success text-white text-center">
              <h5>Form Simulasi</h5>
            </div>
            <div class="card-body">
              <form action="{{ route('nasabah.simulasi.hitung') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="nama_barang">Nama Barang</label>
                  <input type="text" name="nama_barang" id="nama_barang" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="harga_barang">Harga Barang</label>
                  <input type="number" name="harga_barang" id="harga_barang" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="uang_muka">Uang Muka</label>
                  <input type="number" name="uang_muka" id="uang_muka" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="tenor">Tenor (Bulan)</label>
                  <select name="tenor" id="tenor" class="form-control" required>
                    <option value="12">12 Bulan</option>
                    <option value="24">24 Bulan</option>
                    <option value="36">36 Bulan</option>
                    <option value="48">48 Bulan</option>
                    <option value="60">60 Bulan</option>
                  </select>
                </div>
                <div class="d-grid mt-3">
                  <button type="submit" class="btn btn-primary btn-block">Hitung</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Kotak Hasil Simulasi -->
        <div class="col-md-6">
          @if(session('hasil'))
          <!-- Hasil Simulasi -->
          <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">
              <h5>Hasil Simulasi</h5>
            </div>
            <div class="card-body">
              <table class="table table-hover table-striped text-center">
                <thead class="bg-primary text-white">
                  <tr>
                    <th>Bulan</th>
                    <th>Pembiayaan Setelah DP</th>
                    <th>Margin Keuntungan (%)</th>
                    <th>Total Pembayaran</th>
                    <th>Angsuran Bulanan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach(session('hasil')['simulasi'] as $row)
                  <tr>
                    <td>{{ $row['bulan'] }} Bulan</td>
                    <td>Rp {{ $row['pembiayaan_setelah_dp'] }}</td>
                    <td>{{ $row['margin_keuntungan'] }}%</td>
                    <td>Rp {{ $row['total_pembayaran'] }}</td>
                    <td>Rp {{ $row['angsuran_bulanan'] }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          @else
          <!-- Placeholder jika belum ada hasil -->
          <div class="w-100 border rounded d-flex justify-content-center align-items-center" 
               style="height: 300px; border-style: dashed; border-color: #007bff;">
            <h5 style="color: #007bff; font-weight: bold;">Hasil Simulasi</h5>
          </div>
          @endif
        </div>
      </div>

      <!-- Tips atau Informasi Tambahan -->
      <div class="row mt-4">
        <div class="col-md-12">
          <div class="alert alert-info text-center">
            <h5 class="mb-3"><i class="fas fa-info-circle"></i> Tips:</h5>
            <p>Pastikan data yang Anda masukkan sesuai dengan kebutuhan Anda. Untuk informasi lebih lanjut, silakan hubungi layanan pelanggan kami.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="text-center py-3 bg-light">
  <p class="mb-0">&copy; {{ date('Y') }} Kredit Syariah. All Rights Reserved.</p>
</footer>

    
  
  

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
