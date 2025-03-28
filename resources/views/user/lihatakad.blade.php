@extends('layout.nasabah')

@section('title', 'Dashboard Nasabah')

@section('content')


<!-- Tambahkan Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }
    h1, h3 {
        font-weight: 600;
    }
    .card p {
        font-weight: 300;
        font-size: 14px;
    }
</style>

<div class="content-wrapper" style="padding: 20px; background: #f8f9fa; min-height: 100vh;">
  <!-- Content Wrapper -->

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
<div class="container-fluid mt-4">
  <div class="row justify-content-center">
      <div class="col-12 col-md-10">
          @forelse ($akads as $akad)
              <div class="card mb-3 shadow-sm border">
                  <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                          <div>
                              <h5 class="fw-bold text-dark mb-1">{{ $akad->nama_lengkap }}</h5>
                              <p class="text-muted mb-0">ID: {{ $akad->id }} • Diajukan: {{ $akad->created_at->format('d M Y') }}</p>
                          </div>
                          <span class="badge 
                              @if ($akad->status === 'accepted') bg-success
                              @elseif ($akad->status === 'rejected') bg-danger
                              @else bg-warning
                              @endif">
                              {{ ucfirst($akad->status ?? 'Pending') }}
                          </span>
                      </div>

                      <div class="mt-3 row">
                          <div class="col-md-4">
                              <p class="mb-1 text-muted">Harga:</p>
                              <p class="fw-bold text-dark">Rp {{ number_format($akad->jumlah_kredit, 0, ',', '.') }}</p>
                          </div>
                          <div class="col-md-4">
                              <p class="mb-1 text-muted">Uang Muka:</p>
                              <p class="fw-bold text-dark">Rp {{ number_format($akad->uang_muka, 0, ',', '.') }}</p>
                          </div>
                          <div class="col-md-4">
                              <p class="mb-1 text-muted">Tenor:</p>
                              <p class="fw-bold text-dark">{{ $akad->jangka_waktu }} bulan</p>
                          </div>
                      </div>
                  </div>
              </div>
          @empty
              <div class="text-center">
                  <div class="alert alert-warning">
                      <i class="fas fa-exclamation-circle"></i> Tidak ada data akad.
                  </div>
              </div>
          @endforelse
      </div>
  </div>
</div>

<style>
  .container-fluid {
      padding-left: 20px;
      padding-right: 20px;
  }

  .card {
      border-radius: 10px;
      border: 1px solid #dee2e6;
      padding: 15px;
  }

  .badge {
      font-size: 12px;
      padding: 6px 12px;
      border-radius: 12px;
  }
</style>

</div>
@endsection
