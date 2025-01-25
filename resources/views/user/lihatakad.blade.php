<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard 2</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">

  <style>
    /* Sidebar customization */
    .main-sidebar {
      background-color: #ffffff !important;
      color: #000000;
    }

    .main-sidebar .nav-link {
      color: #000000 !important;
    }

    .main-sidebar .nav-link:hover {
      background-color: #f0f0f0 !important;
      color: #007bff !important;
    }

    .main-sidebar .nav-link.active {
      background-color: #007bff !important;
      color: #ffffff !important;
      border-radius: 5px;
    }

    .main-sidebar .brand-link {
      background-color: #f4f4f4 !important;
      color: #007bff !important;
    }

    .main-sidebar .brand-link:hover {
      background-color: #e6e6e6 !important;
    }

    .user-panel .info a {
      color: #007bff !important;
      font-weight: bold;
    }

    .user-panel .info a:hover {
      text-decoration: underline;
    }

    .nav-sidebar > .nav-item > .nav-link {
      border-bottom: 1px solid #f4f4f4 !important;
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
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('lte/dist/img/logonyar.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-bold" 
       style="font-size: 15px; color: #00a7e9; margin-left: 15px; font-family: 'Scheherazade', serif;">Kredit Syariah</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- User Panel -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('lte/dist/img/contact.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
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
      <a href="{{ route('nasabah.nasabah.pembayaran') }}" class="nav-link">
        <i class="nav-icon fas fa-credit-card"></i>
        <p>Pembayaran</p>
      </a>


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
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Content Header -->
  
    <!-- /.content-header -->

    <!-- Main content -->
   <!-- Main content -->
   <div class="content">
    <div class="container-fluid">
        <!-- Statistik Ringkas -->
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="card card-success">
                    <div class="card-body">
                        <h5 class="text-success font-weight-bold">Akad Diterima</h5>
                        <p class="text-muted font-weight-bold">{{ $akads->where('status', 'accepted')->count() }} Akad</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-danger">
                    <div class="card-body">
                        <h5 class="text-danger font-weight-bold">Akad Ditolak</h5>
                        <p class="text-muted font-weight-bold">{{ $akads->where('status', 'rejected')->count() }} Akad</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-warning">
                    <div class="card-body">
                        <h5 class="text-warning font-weight-bold">Akad Pending</h5>
                        <p class="text-muted font-weight-bold">{{ $akads->where('status', 'pending')->count() }} Akad</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan CSS untuk meningkatkan keterbacaan -->
<style>
    .card-success {
        background-color: #d4edda;
    }

    .card-danger {
        background-color: #f8d7da;
    }

    .card-warning {
        background-color: #fff3cd;
    }

    .text-success {
        color: #28a745;
    }

    .text-danger {
        color: #dc3545;
    }

    .text-warning {
        color: #ffc107;
    }

    .text-muted {
        color: #6c757d;
    }

    .font-weight-bold {
        font-weight: bold;
    }
    .custom-table {
  border-collapse: separate;
  border-spacing: 0;
  width: 100%;
  background-color: #fff;
  border: 1px solid #dee2e6;
  border-radius: 5px;
  overflow: hidden;
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
}

.custom-table th {
  background-color: #f8f9fa; /* Warna abu-abu muda */
  color: #343a40; /* Warna teks */
  text-align: left;
  padding: 12px 15px;
  font-weight: bold;
  border-bottom: 1px solid #dee2e6;
}

.custom-table td {
  padding: 12px 15px;
  vertical-align: middle;
  border-bottom: 1px solid #dee2e6;
}

.custom-table tr:hover {
  background-color: #f1f1f1;
}

.custom-table .foto-benda {
  width: 70px;
  height: auto;
  border-radius: 5px;
}

.badge-success {
  background-color: #28a745;
  color: #fff;
  padding: 5px 10px;
  border-radius: 12px;
}

.badge-danger {
  background-color: #dc3545;
  color: #fff;
  padding: 5px 10px;
  border-radius: 12px;
}

.badge-warning {
  background-color: #ffc107;
  color: #212529;
  padding: 5px 10px;
  border-radius: 12px;
}

</style>




<div class="mb-2">
  <a href="{{ route('nasabah.buatakad') }}" class="btn btn-sm btn-primary">
    <i class="fas fa-plus-circle"></i> Buat Akad Baru
  </a>
</div>
<div class="table-responsive">
  <table class="table table-hover custom-table">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIK</th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th>Kredit</th>
        <th>Waktu</th>
        <th>Tanggal Pembuatan</th>
        <th>Foto Benda</th>
        <th>Status</th>
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
        <td>{{ $akad->created_at->format('d-m-Y') }}</td>
        <td>
          @if ($akad->foto_benda)
          <img src="{{ asset('storage/' . $akad->foto_benda) }}" alt="Foto Benda" class="foto-benda">
          @else
          <span class="text-muted">Tidak ada foto</span>
          @endif
        </td>
        <td id="status-{{ $akad->id }}">
          @if ($akad->status === null || $akad->status === 'pending')
          <span class="badge badge-warning">Pending</span>
          @elseif ($akad->status === 'accepted')
          <span class="badge badge-success">Diterima</span>
          @elseif ($akad->status === 'rejected')
          <span class="badge badge-danger">Ditolak</span>
          @else
          <span>-</span>
          @endif
        </td>
        <td class="action-cell">
          <div class="action-buttons">
            @if ($akad->status === null || $akad->status === 'pending')
            <form action="{{ route('nasabah.kirimAkad', $akad->id) }}" method="POST" class="kirim-form" data-id="{{ $akad->id }}">
              @csrf
              <button type="button" class="btn btn-sm btn-primary btn-kirim" data-id="{{ $akad->id }}">
                <i class="fas fa-paper-plane"></i> Kirim
              </button>
            </form>
            @endif
            <a href="{{ route('nasabah.editakad', $akad->id) }}" class="btn btn-sm btn-warning">
              <i class="fas fa-edit"></i> Edit
            </a>
            <form action="{{ route('nasabah.deleteakad', $akad->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akad ini?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </form>
          </div>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="11" class="text-center text-muted">
          <i class="fas fa-exclamation-circle"></i> Tidak ada data.
        </td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>


    <!-- /.content -->

    <!-- Footer -->
    <footer class="main-footer">
      <strong>Welcome, {{ auth()->user()->name }}.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div>
    </footer>
  </div>
  <!-- /.content-wrapper -->
</div>

<!-- Scripts -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('lte/dist/js/adminlte.js') }}"></script>
<script>
  $(document).on('click', '.btn-kirim', function(e) {
    e.preventDefault();
    var akadId = $(this).data('id');

    $.ajax({
      url: '{{ route('nasabah.kirimAkad', ':id') }}'.replace(':id', akadId),
      type: 'POST',
      data: {
        _token: '{{ csrf_token() }}',
      },
      success: function(response) {
        if (response.status === 'success') {
          $('#status-' + akadId).html('<span class="badge badge-warning">Pending</span>');
          alert(response.message || 'Akad berhasil dikirim!');
        } else {
          alert(response.message || 'Terjadi kesalahan.');
        }
      },
      error: function() {
        alert('Terjadi kesalahan. Silakan coba lagi.');
      }
    });
  });
</script>
</body>
</html>