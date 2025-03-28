@extends('layout.nasabah')

@section('title', 'Buat Akad')

@section('content')
<div class="container mt-5">
    <h1 class="fw-bold text-primary text-center">Buat Akad Baru</h1>
    <div class="card shadow-lg border-0">
        <div class="card-body">
            <form action="{{ route('nasabah.nasabah.simpanAkad') }}" method="POST">
                @csrf

                <h3 class="fw-bold text-dark mb-4">Detail Produk</h3>
                <div class="mb-4">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" name="nama_produk" value="{{ $nama_produk }}" readonly>
                </div>
                <div class="mb-4">
                    <label class="form-label">Harga Produk</label>
                    <input type="text" class="form-control" name="harga_produk" value="{{ $harga_produk }}" readonly>
                </div>

                <button type="submit" class="btn btn-primary w-100">Simpan Akad</button>
            </form>
        </div>
    </div>
</div>
@endsection
