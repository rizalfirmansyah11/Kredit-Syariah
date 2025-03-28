@extends('layout.main')

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm p-4">
            <h2 class="mb-4 text-center text-primary">Tambah Kategori</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.admin.marginKategori.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Nama Kategori</label>
                    <input type="text" id="name" name="name" class="form-control" required placeholder="Masukkan nama kategori">
                </div>

                <h5 class="fw-bold text-secondary mt-4">Margin Berdasarkan Tenor</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="margin_1" class="form-label fw-bold">≤ 1 Tahun (%)</label>
                        <input type="number" id="margin_1" name="margin_1" class="form-control" min="0" step="0.01" placeholder="0.00">
                    </div>
                    <div class="col-md-6">
                        <label for="margin_2" class="form-label fw-bold">2 - 3 Tahun (%)</label>
                        <input type="number" id="margin_2" name="margin_2" class="form-control" min="0" step="0.01" placeholder="0.00">
                    </div>
                    <div class="col-md-6">
                        <label for="margin_3" class="form-label fw-bold">4 - 5 Tahun (%)</label>
                        <input type="number" id="margin_3" name="margin_3" class="form-control" min="0" step="0.01" placeholder="0.00">
                    </div>
                    <div class="col-md-6">
                        <label for="margin_4" class="form-label fw-bold">6 - 10 Tahun (%)</label>
                        <input type="number" id="margin_4" name="margin_4" class="form-control" min="0" step="0.01" placeholder="0.00">
                    </div>
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('admin.admin.marginKategori.index') }}" class="btn btn-secondary px-4">Kembali</a>
                    <button type="submit" class="btn btn-success px-4">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
