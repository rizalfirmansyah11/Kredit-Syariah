@extends('layout.main')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Produk</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-12">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pilihKategoriModal">
                        <i class="fas fa-plus"></i> Tambah Produk
                    </button>
                </div>
            </div>

            <div class="modal fade" id="pilihKategoriModal" tabindex="-1" aria-labelledby="pilihKategoriModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="pilihKategoriModalLabel">Pilih Kategori Produk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Silakan pilih kategori produk yang ingin Anda tambahkan:</p>
                            <div class="d-flex flex-column">

                                <a href="{{ route('admin.admin.produk.create') }}" class="btn btn-success mb-2">Kendaraan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            @if ($product->gambar)
                                <img src="{{ asset('storage/' . $product->gambar) }}" 
                                    class="img-fluid rounded shadow-sm" 
                                    style="max-width: 100%; height: 200px; object-fit: cover;">
                            @else
                                <img src="{{ asset('storage/default-image.jpg') }}" 
                                    class="img-fluid rounded shadow-sm" 
                                    style="max-width: 100%; height: 200px; object-fit: cover;">
                            @endif
                            <h5 class="mt-3">{{ $product->nama_produk }}</h5>
                            <p class="text-muted">{{ $product->warna }} | {{ $product->transmisi }} | {{ $product->bahan_bakar }}</p>
                            <h6 class="text-primary">Rp {{ number_format($product->harga, 0, ',', '.') }}</h6>
                            <div class="d-flex gap-1">
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal{{ $product->id }}">
                                    <i class="fas fa-eye"></i> Detail
                                </button>
                                <a href="{{ route('admin.admin.produk.edit', $product->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.admin.produk.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="detailModal{{ $product->id }}" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="detailModalLabel">Detail Produk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered">
                                    <tr><th>Nama Produk</th><td>{{ $product->nama_produk }}</td></tr>
                                    <tr><th>Harga</th><td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td></tr>
                                    <tr><th>Warna</th><td>{{ $product->warna }}</td></tr>
                                    <tr><th>Transmisi</th><td>{{ $product->transmisi }}</td></tr>
                                    <tr><th>Bahan Bakar</th><td>{{ $product->bahan_bakar }}</td></tr>
                                    <tr><th>Deskripsi</th><td>{{ $product->deskripsi }}</td></tr>
                                    <tr>
                                        <th>Gambar</th>
                                        <td>
                                            <img src="{{ asset('storage/' . $product->gambar) }}" alt="Gambar Produk" class="img-fluid" width="200">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

<footer class="main-footer">
    <strong>Copyright &copy; 2024 <a href="#">Your Company</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
    </div>
</footer>
@endsection