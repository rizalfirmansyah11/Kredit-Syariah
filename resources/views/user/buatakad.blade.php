<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard 2</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css')}}">

    <!-- Custom Styles -->
    <style>
        .content-wrapper {
            background-color: #f4f6f9 !important;
            color: #333;
        }
        
        .form-control {
            border-radius: 0.375rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .form-label {
            font-weight: bold;
            color: #4e4e4e;
        }

        .card {
            border-radius: 0.5rem;
            background-color: #ffffff;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 0.375rem;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .breadcrumb {
            background-color: transparent;
            padding: 0;
        }

        .breadcrumb-item a {
            color: #007bff;
        }

        .breadcrumb-item.active {
            color: #4e4e4e;
        }

        .mb-4 {
            margin-bottom: 30px !important;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a></li>
            <li class="nav-item"><a href="index3.html" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" data-widget="navbar-search" href="#" role="button"><i class="fas fa-search"></i></a></li>
            <li class="nav-item"><a class="nav-link" data-widget="fullscreen" href="#" role="button"><i class="fas fa-expand-arrows-alt"></i></a></li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="index3.html" class="brand-link">
            <img src="{{ asset('lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item menu-open">
                        <a href="{{ route('nasabah.dashboard') }}" class="nav-link"><i class="nav-icon fas fa-home"></i><p>Dashboard</p></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('nasabah.simulasi') }}" class="nav-link"><i class="nav-icon fas fa-calculator"></i><p>Simulasi Akad</p></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('nasabah.buatakad', ['id' => auth()->user()->id]) }}" class="nav-link"><i class="nav-icon fas fa-handshake"></i><p>Akad</p></a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6"><h1 class="m-0">Simulasi</h1></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v2</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mt-5">
            <h1 class="mb-4 text-center">Buat Akad Baru</h1>
            <div class="card shadow-sm p-4">
                <form action="{{ route('nasabah.simpanakad') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control shadow-sm" id="nama_lengkap" name="nama_lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control shadow-sm" id="nik" name="nik" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control shadow-sm" id="alamat" name="alamat" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">No. Telepon</label>
                        <input type="text" class="form-control shadow-sm" id="telepon" name="telepon" required>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_kredit" class="form-label">Jumlah Kredit</label>
                        <input type="number" class="form-control shadow-sm" id="jumlah_kredit" name="jumlah_kredit" required>
                    </div>
                    <div class="mb-3">
                        <label for="jangka_waktu" class="form-label">Jangka Waktu</label>
                        <input type="number" class="form-control shadow-sm" id="jangka_waktu" name="jangka_waktu" required>
                    </div>
                    <div class="mt-4 text-center">
                        <button type="submit" class="btn btn-primary px-5 py-2 shadow-sm">Simpan Akad</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>&copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        <div class="float-right d-none d-sm-inline-block"><b>Version</b> 3.2.0</div>
    </footer>
</div>

<!-- REQUIRED SCRIPTS -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('lte/dist/js/adminlte.js') }}"></script>

</body>
</html>
