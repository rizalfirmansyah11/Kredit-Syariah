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
          <div class="card shadow-lg border-0 h-100" style="border-radius: 15px;">
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
          <div class="card shadow-lg border-0 h-100" style="border-radius: 15px;">
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
      </div>

    </div>
  </section>
</div>
@endsection
