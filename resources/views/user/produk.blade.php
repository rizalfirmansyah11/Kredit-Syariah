@extends('layout.nasabah')

@section('content')
<div class="d-flex flex-column" style="min-height: 100vh; background: #f8f9fa; padding-top: 50px;">
    <div class="container" style="margin-left: 270px; max-width: calc(100% - 270px);">
        <div class="row mb-4 justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg p-5 text-center bg-gradient text-white rounded-4 mx-auto" 
                    style="max-width: 80vw; width: 100%; background: linear-gradient(135deg, #007bff, #6610f2);">
                    <h1 class="mb-3 title-font">Daftar Produk</h1>
                    <p class="fw-semibold custom-font">Wujudkan Impian dengan Akad Syariah</p>                
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-left: 270px; max-width: calc(100% - 270px);">
       
    </div>

    <div class="content-wrapper p-4 flex-grow-1" style="margin-left: 18vw; margin-top: 20px; min-width: 500px;">
        <div class="card p-4 shadow-lg rounded-lg">
            <div class="row g-4 row-gap-4" id="productList">
                @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 product-card" 
                     data-category="{{ $product->kategori }}" 
                     data-price="{{ $product->harga }}"
                     data-name="{{ $product->nama_produk }}"
                     data-image="{{ asset('storage/' . ($product->gambar ?? 'default-image.jpg')) }}"
                     data-description="Tahun: {{ $product->tahun }}, Warna: {{ $product->warna }}, Transmisi: {{ $product->transmisi }}, BBM: {{ $product->bahan_bakar }}">
                    
                    <div class="card border-0 shadow-lg rounded-lg h-100 hover-scale">
                        <img src="{{ asset('storage/' . ($product->gambar ?? 'default-image.jpg')) }}" 
                             class="card-img-top product-img" 
                             alt="{{ $product->nama_produk }}" 
                             style="height: 200px; object-fit: cover; border-radius: 10px 10px 0 0; cursor: pointer;">
                        <div class="card-body text-center">
                            <h6 class="card-title font-weight-bold text-primary" style="font-family: 'Poppins', sans-serif;">{{ strtoupper($product->nama_produk) }}</h6>
                            <span class="badge bg-secondary text-white mb-2">{{ ucfirst($product->kategori) }}</span>
                            <h6 class="text-danger font-weight-bold">Rp {{ number_format($product->harga, 0, ',', '.') }}</h6>
                            <p class="text-success fw-bold">Cicilan mulai Rp {{ number_format($product->harga / 120, 0, ',', '.') }} / bulan</p>
                        </div>
                        <div class="card-footer bg-white border-0 text-center">
                            <a href="{{ route('nasabah.nasabah.produk.detail', ['id' => $product->id]) }}" 
                                class="btn btn-outline-primary w-100 fw-bold rounded-pill d-flex align-items-center justify-content-center gap-2 p-2" 
                                style="z-index: 10; position: relative; transition: 0.3s; border-width: 2px;">
                                <i class="bi bi-eye"></i> Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    
                {{-- @foreach($elektroniks as $elektronik)
                @php
                    // Ambil gambar pertama yang terkait dengan produk ini
                    $gambar = $elektronik->images->isNotEmpty() ? asset('storage/' . ltrim($elektronik->images->first()->path, '/')) : asset('storage/default-image.jpg');
                @endphp
            
                <div class="col-lg-3 col-md-4 col-sm-6 product-card" 
                     data-category="{{ $elektronik->category }}" 
                     data-price="{{ $elektronik->harga }}"
                     data-name="{{ $elektronik->nama_produk }}"
                     data-image="{{ $gambar }}"
                     data-description="{{ $elektronik->description }}">
            
                    <div class="card border-0 shadow-lg rounded-lg h-100 hover-scale">
                        <img src="{{ $gambar }}" 
                             class="card-img-top product-img" 
                             alt="{{ $elektronik->nama_produk }}" 
                             style="height: 200px; object-fit: cover; border-radius: 10px 10px 0 0; cursor: pointer;">
                        
                        <div class="card-body text-center">
                            <h6 class="card-title font-weight-bold text-primary" style="font-family: 'Poppins', sans-serif;">
                                {{ strtoupper($elektronik->nama_produk) }}
                            </h6>
                            <span class="badge bg-secondary text-white mb-2">{{ ucfirst($elektronik->category) }}</span>
                            <h6 class="text-danger font-weight-bold">Rp {{ number_format($elektronik->harga, 0, ',', '.') }}</h6>
                            <p class="text-success fw-bold">
                                Cicilan mulai Rp {{ number_format($elektronik->harga / 120, 0, ',', '.') }} / bulan
                            </p>
                        </div>
                        <div class="card-footer bg-white border-0 text-center" style="margin-top: -10px; padding-bottom: 10px;">
                            <a href="{{ route('nasabah.nasabah.produk.detail', ['id' => $elektronik->id]) }}" 
                                class="btn btn-outline-primary w-100 fw-bold rounded-pill d-flex align-items-center justify-content-center gap-2 p-2" 
                                style="z-index: 10; position: relative; transition: 0.3s; border-width: 2px;">
                                <i class="bi bi-search"></i> Lihat Simulasi
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
             --}}

            </div>
        </div>
    </div>
</div>

<style>
    .custom-font {
            font-family: 'Nunito', sans-serif;
            font-weight: 600;
            font-size: 1.1rem;
        }
    .title-font {
        font-family: 'Quicksand', sans-serif;
        font-weight: 700;
    }
</style>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&family=Playfair+Display:wght@400;700&family=Nunito:wght@400;600&display=swap" rel="stylesheet">
@endsection
