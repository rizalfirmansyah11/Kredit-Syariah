@extends('layout.nasabah')

@section('title', 'Dashboard Nasabah')

@section('content')
 <!-- Main Content -->
 <div class="content-wrapper" style="padding: 20px; background: #f8f9fa; min-height: 100vh;">
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
              <input type="text" class="form-control" id="jenis_benda" name="jenis_benda" value="{{ old('jenis_benda', $nama_produk ?? '') }}" required>
            </div>
            
            
            <div class="mb-4">
              <label for="merek_benda" class="form-label">Merek</label>
              <input type="text" class="form-control" id="merek_benda" name="merek_benda" required>
            </div>
            <div class="mb-4">
              <label for="tahun_pembuatan" class="form-label">Tahun Pembuatan</label>
              <input type="number" class="form-control" id="tahun_pembuatan" name="tahun_pembuatan" required>
            </div>
          
<!-- Input Harga Produk -->
<div class="mb-4">
  <label for="harga_produk" class="form-label">Harga Produk</label>
  <input type="number" class="form-control" id="harga_produk" name="harga_produk" 
         value="{{ old('harga_produk', $hargaProduk ?? '') }}" required>
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



@endsection
