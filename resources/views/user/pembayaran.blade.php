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
      <img src="{{ asset('lte/dist/img/contact.png') }}" class="img-circle elevation-2" alt="User Image">
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

  
   
    <!-- /.content-header -->

    <div class="content-wrapper">
      <form id="hitungPembayaranForm">
          <div class="card mt-4">
              <div class="card-header">
                  <h3 class="card-title">Data Akad yang Disetujui</h3>
              </div>
              <div class="card-body">
                  <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Nama Lengkap</th>
                              <th>NIK</th>
                              <th>Alamat</th>
                              <th>Telepon</th>
                              <th>Jumlah Kredit</th>
                              <th>Jangka Waktu</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          @forelse ($akadAccepted as $akad)
                              <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $akad->nama_lengkap }}</td>
                                  <td>{{ $akad->nik }}</td>
                                  <td>{{ $akad->alamat }}</td>
                                  <td>{{ $akad->telepon }}</td>
                                  <td>Rp{{ number_format($akad->jumlah_kredit, 0, ',', '.') }}</td>
                                  <td>{{ $akad->jangka_waktu }} bulan</td>
                                  <td>
                                      <button class="btn btn-success btn-sm" type="button" onclick="bayarAkad({{ $akad->id }})">
                                          Bayar
                                      </button>
                                  </td>
                              </tr>
                          @empty
                              <tr>
                                  <td colspan="8" class="text-center">Data tidak ditemukan.</td>
                              </tr>
                          @endforelse
                      </tbody>
                  </table>
              </div>
          </div>
      </form>
  
      <div id="hasilPembayaran" class="mt-4">
          <!-- Hasil pembayaran akan ditampilkan di sini -->
      </div>
  
      <script>
          function bayarAkad(akadId) {
              const akad = @json($akadAccepted).find(item => item.id === akadId);
  
              if (akad) {
                  const jumlahKredit = akad.jumlah_kredit;
                  const jangkaWaktu = akad.jangka_waktu;
  
                  // Hitung cicilan per bulan
                  const cicilanPerBulan = jumlahKredit / jangkaWaktu;
  
                  // Fungsi untuk format angka ke Rupiah
                  const formatRupiah = (angka) => {
                      return "Rp" + angka.toFixed(0).replace(/\d(?=(\d{3})+$)/g, '$&,');
                  };
  
                  // Dapatkan tanggal saat ini
                  const startDate = new Date();
                  startDate.setDate(1); // Atur ke tanggal 1 setiap bulan
  
                  // Buat daftar cicilan dengan tanggal pembayaran dan input
                  let hasilHTML = `
                      <h4>Pembayaran Cicilan untuk ${akad.nama_lengkap}</h4>
                      <table class="table table-bordered">
                          <thead>
                              <tr>
                                  <th>Bulan</th>
                                  <th>Tanggal Pembayaran</th>
                                  <th>Jumlah Cicilan</th>
                                  <th>Jumlah yang Dibayar</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                  `;
  
                  for (let i = 1; i <= jangkaWaktu; i++) {
                      const paymentDate = new Date(startDate);
                      paymentDate.setMonth(paymentDate.getMonth() + (i - 1));
                      const paymentDateString = paymentDate.toLocaleDateString('id-ID', {
                          year: 'numeric',
                          month: 'long',
                          day: 'numeric'
                      });
  
                      hasilHTML += `
                          <tr>
                              <td>Bulan ke-${i}</td>
                              <td>${paymentDateString}</td>
                              <td>${formatRupiah(cicilanPerBulan)}</td>
                              <td>
                                  <input type="number" class="form-control" id="bayarBulan${i}" placeholder="Masukkan jumlah bayar">
                              </td>
                              <td>
                                  <button class="btn btn-primary btn-sm" type="button" onclick="prosesPembayaran(${akadId}, ${i}, ${cicilanPerBulan})">
                                      Bayar
                                  </button>
                              </td>
                          </tr>
                      `;
                  }
  
                  hasilHTML += `
                          </tbody>
                      </table>
                  `;
  
                  // Tampilkan hasil di elemen hasilPembayaran
                  document.getElementById('hasilPembayaran').innerHTML = hasilHTML;
              } else {
                  alert('Data akad tidak ditemukan!');
              }
          }
  
          function prosesPembayaran(akadId, bulan, cicilanPerBulan) {
              const inputBayar = document.getElementById(`bayarBulan${bulan}`).value;
  
              if (inputBayar === "") {
                  alert("Jumlah pembayaran harus diisi!");
                  return;
              }
  
              const jumlahBayar = parseFloat(inputBayar);
  
              if (jumlahBayar < cicilanPerBulan) {
                  alert("Jumlah pembayaran tidak mencukupi!");
              } else {
                  alert(`Pembayaran untuk bulan ke-${bulan} berhasil!`);
                  document.getElementById(`bayarBulan${bulan}`).setAttribute("disabled", true);
              }
          }
      </script>
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
