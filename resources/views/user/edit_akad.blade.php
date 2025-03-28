@extends('layout.nasabah')

@section('title', 'Dashboard Nasabah')

@section('content')
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }
    .card {
        border-radius: 15px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        padding: 40px;
    }
    h1 {
        font-weight: 600;
        color: #007bff;
    }
    label {
        font-weight: 500;
    }
    .form-control {
        border-radius: 8px;
        padding: 12px;
        font-size: 16px;
    }
    .btn {
        border-radius: 8px;
        padding: 12px 20px;
        font-size: 16px;
        font-weight: 500;
    }
</style>

<!-- Main Content -->
<div class="content-wrapper" style="padding: 20px; background: #f8f9fa; min-height: 100vh;">
    <div class="content">
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-10"> <!-- Lebar lebih besar -->
                    <div class="card">
                        <h1 class="text-center mb-4">Edit Data Akad</h1>
                        <form action="{{ route('nasabah.updateakad', $akad->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" value="{{ $akad->nama_lengkap }}">
                            </div>

                            <div class="form-group mb-3">
                                <label>NIK</label>
                                <input type="text" name="nik" class="form-control" value="{{ $akad->nik }}">
                            </div>

                            <div class="form-group mb-3">
                                <label>Alamat</label>
                                <input type="text" name="alamat" class="form-control" value="{{ $akad->alamat }}">
                            </div>

                            <div class="form-group mb-3">
                                <label>No Telepon</label>
                                <input type="text" name="telepon" class="form-control" value="{{ $akad->telepon }}">
                            </div>

                            <div class="form-group mb-3">
                                <label>Jumlah Kredit</label>
                                <input type="number" name="jumlah_kredit" class="form-control" value="{{ $akad->jumlah_kredit }}">
                            </div>

                            <div class="form-group mb-4">
                                <label>Jangka Waktu (bulan)</label>
                                <input type="number" name="jangka_waktu" class="form-control" value="{{ $akad->jangka_waktu }}">
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-success w-48">Update</button>
                                <a href="{{ route('nasabah.akad') }}" class="btn btn-secondary w-48">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
