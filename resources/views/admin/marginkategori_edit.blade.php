@extends('layout.main')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6"> <!-- Ukuran lebih ideal untuk form -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0"><i class="fas fa-edit"></i> Edit Kategori</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle"></i> {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    
                    <form action="{{ route('admin.admin.marginKategori.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                    
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}" required>
                        </div>
                    
                        <h5 class="mt-3">Margin Berdasarkan Tenor</h5>
                        <div class="form-group">
                            <label>≤ 1 Tahun (%)</label>
                            <input type="number" name="margin_1" class="form-control" value="{{ old('margin_1', $category->margin_1) }}" step="0.01" min="0">
                        </div>
                        <div class="form-group">
                            <label>2 - 3 Tahun (%)</label>
                            <input type="number" name="margin_2" class="form-control" value="{{ old('margin_2', $category->margin_2) }}" step="0.01" min="0">
                        </div>
                        <div class="form-group">
                            <label>4 - 5 Tahun (%)</label>
                            <input type="number" name="margin_3" class="form-control" value="{{ old('margin_3', $category->margin_3) }}" step="0.01" min="0">
                        </div>
                        <div class="form-group">
                            <label>6 - 10 Tahun (%)</label>
                            <input type="number" name="margin_4" class="form-control" value="{{ old('margin_4', $category->margin_4) }}" step="0.01" min="0">
                        </div>
                    
                        <button class="btn btn-warning updateMarginBtn" data-category-id="{{ $category->id }}">
                            ✏ Edit
                        </button>
                
                        <a href="{{ route('admin.admin.marginKategori.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelector("form").addEventListener("submit", function () {
            const categoryId = "{{ $category->id }}"; // Ambil ID kategori
            localStorage.setItem("editedCategory", categoryId); // Simpan ID kategori yang baru saja diedit
        });
    });
</script>

@endsection
