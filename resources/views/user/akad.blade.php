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
    /* Warna sidebar dan efek hover */
    .main-sidebar {
      background-color: #0391e9 !important;
    }
    .main-sidebar .nav-link {
      color: #ffffff !important; /* Warna default tulisan */
    }
    .main-sidebar .nav-link:hover {
      background-color: #f4f4f4 !important;
      color: #007bff !important; /* Warna tulisan saat hover */
    }

    /* Warna konten dan elemen lainnya */
    .content-wrapper {
      background-color: #ffffff !important;
    }
    .content-header h1 {
      color: #000000 !important;
    }
    .user-panel .info a {
      color: #000000 !important;
      font-size: 1.2rem;
      font-weight: bold;
      font-family: 'Source Sans Pro', sans-serif;
    }
    .user-panel .info a:hover {
      text-decoration: underline;
      color: #007bff;
    }
    .card {
    border: 2px solid #dcdcdc; /* Bingkai */
    border-radius: 12px; /* Sudut melengkung */
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Bayangan */
  }

  /* Penempatan kartu di tengah */
  .row.justify-content-center {
    display: flex;
    justify-content: center; /* Horizontal */
    align-items: center; /* Vertikal */
  }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">Home</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#"><i class="fas fa-expand-arrows-alt"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('nasabah.nasabah.logout') }}" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i>
        </a>
        <form id="logout-form" action="{{ route('nasabah.nasabah.logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    </ul>
  </nav>

  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      <img src="{{ asset('lte/dist/img/AdminLTELogo.png') }}" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
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
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <!-- Kartu Akad -->
        <div class="col-md-5">
          <div class="card">
            <div class="card-body text-center">
              <i class="fas fa-file-signature text-primary"></i>
              <h3 class="text-primary">Buat Akad Anda</h3>
              <p>Mulai membuat akad baru untuk kebutuhan Anda.</p>
              <a href="{{ route('nasabah.buatakad', ['id' => auth()->user()->id]) }}" class="btn btn-primary">Buat Akad</a>
            </div>
          </div>
        </div>
  
        <!-- Kartu Persetujuan -->
        <div class="col-md-5">
          <div class="card">
            <div class="card-body text-center">
              <i class="fas fa-check-circle text-success"></i>
              <h3 class="text-success">Lihat Akad Anda</h3>
              <p>Lihat status persetujuan akad Anda.</p>
              <a href="{{ route('nasabah.lihatakad', ['id' => auth()->user()->id]) }}" class="btn btn-success">Lihat Persetujuan</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
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
