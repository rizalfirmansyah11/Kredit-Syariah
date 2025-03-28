@extends('layout.nasabah')

@section('content')
<div class="container mt-4">
    <h2 class="text-primary">Buat Perjanjian</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mb-3 shadow">
        <div class="row g-0">
            <div class="col-md-4">
                @if($product->gambar)
                    <img src="{{ asset('storage/' . $product->gambar) }}" class="img-fluid rounded-start" alt="{{ $product->nama_produk }}" style="max-height: 200px; object-fit: cover; width: 100%;">
                @else
                    <p class="text-muted text-center">Tidak ada gambar</p>
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-primary">{{ $product->nama_produk }}</h5>
                    <p class="card-text"><strong>Harga:</strong> Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                    <p class="card-text"><strong>Warna:</strong> {{ $product->warna }}</p>
                    <p class="card-text"><strong>Tahun:</strong> {{ $product->tahun }}</p>
                    <p class="card-text"><strong>Cicilan:</strong> Rp {{ number_format($product->cicilan, 0, ',', '.') }} /bulan</p>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('nasabah.perjanjian.simpan') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">

        <div class="card p-4 shadow">
            <h5 class="text-primary">Formulir Perjanjian</h5>
            
            <div class="mb-3">
                <label for="uang_muka" class="form-label">Uang Muka</label>
                <input type="number" id="uang_muka" name="uang_muka" class="form-control" placeholder="Masukkan uang muka..." required>
            </div>

            <div class="mb-3">
                <label for="tenor" class="form-label">Tenor (bulan)</label>
                <select id="tenor" name="tenor" class="form-control" required>
                    <option value="6">6 Bulan</option>
                    <option value="12">12 Bulan</option>
                    <option value="24">24 Bulan</option>
                    <option value="36">36 Bulan</option>
                </select>
            </div>

            <h5 class="text-primary mt-3">Unggah Kartu Pendukung</h5>

            <div class="mb-3">
                <label for="slip_gaji" class="form-label">Slip Gaji</label>
                <input type="file" id="slip_gaji" name="slip_gaji" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="kartu_identitas" class="form-label">KTP</label>
                <input type="file" id="kartu_identitas" name="kartu_identitas" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="dokumen_tambahan" class="form-label">Kartu Keluarga</label>
                <input type="file" id="dokumen_tambahan" name="dokumen_tambahan" class="form-control">
            </div>

            <button type="submit" class="btn btn-success w-100">Simpan Perjanjian</button>
        </div>
    </form>
</div>
@endsection
