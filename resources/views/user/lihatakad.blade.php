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
    /* Warna sidebar tetap biru muda */
    .main-sidebar {
      background-color: #0391e9 !important;
    }
    .main-sidebar .nav-link:hover {
      background-color: #f4f4f4 !important;
      color: #007bff !important;
    }

    /* Background tengah tetap putih */
    .content-wrapper {
      background-color: #ffffff !important;
      padding: 20px;
    }

    /* Judul dashboard */
    .content-header h1 {
      color: #000000 !important;
      font-size: 1.8rem;
      font-weight: bold;
      margin-bottom: 1rem;
    }

    /* Nama pengguna */
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

    /* Tabel styling */
    .table-responsive {
      max-width: 1000px;
      margin: 20px auto;
    }

    .table {
      border-collapse: collapse;
    }

    .table th, .table td {
      font-size: 16px;
      padding: 12px;
      color: #000000 !important;
      text-align: center;
    }

    .table thead th {
      background-color: #0391e9;
      color: #ffffff;
      text-transform: uppercase;
    }

    .table tbody tr:hover {
      background-color: #f9f9f9;
    }

    .btn-group .btn {
      margin-right: 5px;
    }

    /* Footer styling */
    .main-footer {
      background-color: #f8f9fa;
      padding: 10px 20px;
      border-top: 1px solid #dee2e6;
      text-align: center;
    }

    /* Tombol tetap di atas tabel */
    .button-container {
      position: sticky;
      top: 0;
      z-index: 1000;
      background-color: #ffffff;
      padding: 10px 0;
    }

    /* Responsif untuk layar kecil */
    @media (max-width: 768px) {
      .table th, .table td {
        font-size: 14px;
        padding: 8px;
      }

      .table-responsive {
        max-width: 100%;
      }

      .btn {
        font-size: 12px;
        padding: 5px;
      }
    }
    
  </style>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
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
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
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
            <a href="{{ route('nasabah.nasabah.logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
            <form id="logout-form" action="{{ route('nasabah.nasabah.logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard v2</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="button-container mb-2">
        <a href="{{ route('nasabah.buatakad') }}" class="btn btn-sm btn-primary">
          <i class="fas fa-plus-circle"></i> Buat Akad Baru
        </a>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>NIK</th>
              <th>Alamat</th>
              <th>Telepon</th>
              <th>Kredit</th>
              <th>Waktu</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($akads as $index => $akad)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $akad->nama_lengkap }}</td>
                <td>{{ $akad->nik }}</td>
                <td>{{ $akad->alamat }}</td>
                <td>{{ $akad->telepon }}</td>
                <td>Rp {{ number_format($akad->jumlah_kredit, 0, ',', '.') }}</td>
                <td>{{ $akad->jangka_waktu }} bln</td>
                <td>
                  <div class="btn-group">
                    <a href="{{ route('nasabah.surat', $akad->id) }}" class="btn btn-sm btn-success" title="Kirim Surat">
                      <i class="fas fa-paper-plane"></i>
                    </a>
                    <a href="{{ route('nasabah.editakad', $akad->id) }}" class="btn btn-sm btn-primary" title="Edit Akad">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('nasabah.deleteakad', $akad->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger" title="Hapus Akad">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="8" class="text-center text-muted">
                  <i class="fas fa-exclamation-circle"></i> Tidak ada data.
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

    </div>

  </div>

  <footer class="main-footer">
    <strong>Welcome, {{ auth()->user()->name }}.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>

<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('lte/dist/js/adminlte.js') }}"></script>
</body>
</html>
