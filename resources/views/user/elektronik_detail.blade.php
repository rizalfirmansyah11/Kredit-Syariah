@extends('layout.nasabah')

@section('content')
<div class="container-fluid py-4 bg-light"> <!-- Background abu-abu -->
    <div class="row">
        <!-- Konten Utama -->
        <div class="col-md-10 offset-md-2">
            <div class="row g-4 bg-custom-gray p-4 rounded shadow-sm">
                <!-- Kolom Gambar Produk -->
                <div class="col-md-5">
                    <div class="card shadow-sm p-3">
                        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($elektronik->gambar as $key => $image)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ Storage::url($gambar->path) }}" class="d-block w-100 rounded img-border-shadow" alt="Gambar Produk Elektronik">
                                    </div>
                                @endforeach
                            </div>
                            
                            <!-- Tombol Next dan Prev -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                        </div>
                        
                        <!-- Thumbnail Gambar Kecil -->
                        <div class="mt-3 px-3 d-flex justify-content-start overflow-auto">
                            @foreach($elektronik->images as $key => $image)
                                <img src="{{ Storage::url($image->path) }}" class="thumbnail-img mx-1 img-border-shadow"
                                     onclick="setActiveSlide({{ $key }})" alt="Gambar Thumbnail">
                            @endforeach
                        </div>
                    </div>
                </div>
            
                <!-- Kolom Detail Produk -->
                <div class="col-md-7">
                    <h4 class="fw-bold text-primary">{{ $elektronik->name }}</h4>
            
                    <!-- Harga dan Promo -->
                    <div class="d-flex align-items-center">
                        <h3 class="text-danger fw-bold mb-0">Rp {{ number_format($elektronik->price, 0, ',', '.') }}</h3>
                        <span class="badge bg-warning text-dark ms-3">PROMO</span>
                    </div>
                    <p class="text-muted"><s>Rp {{ number_format($elektronik->price + 500000, 0, ',', '.') }}</s></p>
            
                    <!-- Deskripsi -->
                    <p class="text-muted">{{ $elektronik->description }}</p>
            
                    <!-- Estimasi Cicilan -->
                    <p class="text-success fw-bold">
                        Cicilan mulai dari Rp {{ number_format($elektronik->price / 120, 0, ',', '.') }} / bulan
                    </p>
            
                    <!-- Simulasi Kredit -->
                    <div class="p-3 border rounded bg-white shadow-sm">
                        <h5 class="fw-bold mb-3 text-center">Simulasi Kredit</h5>
                        <form>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Tenor (bulan)</label>
                                <input type="number" id="tenor" class="form-control text-center" value="12" min="1">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Cicilan per bulan</label>
                                <input type="text" id="cicilan" class="form-control text-center bg-white" readonly>
                            </div>
                        </form>
                    </div>
            
                    <!-- Tombol Ajukan via WhatsApp -->
                    <a href="https://wa.me/6281234567890?text=Saya ingin mengajukan kredit untuk {{ $elektronik->name }}"
                       class="btn btn-success w-100 fw-bold rounded-pill mt-3 d-flex align-items-center justify-content-center gap-2"
                       style="font-size: 1.1rem; padding: 10px;">
                       <i class="bi bi-whatsapp"></i> Ajukan via WhatsApp
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let tenorInput = document.getElementById("tenor");
        let cicilanInput = document.getElementById("cicilan");

        function hitungCicilan() {
            let harga = {{ $elektronik->price }};
            let tenor = parseInt(tenorInput.value);
            let cicilan = (harga / tenor).toLocaleString("id-ID");
            cicilanInput.value = "Rp " + cicilan;
        }

        tenorInput.addEventListener("input", hitungCicilan);
        hitungCicilan();

        // Pastikan tombol next/prev bisa diklik
        let carousel = new bootstrap.Carousel(document.getElementById('productCarousel'), {
            interval: false,
            wrap: true
        });

        document.querySelector('.carousel-control-prev').addEventListener('click', function() {
            carousel.prev();
        });

        document.querySelector('.carousel-control-next').addEventListener('click', function() {
            carousel.next();
        });
    });
</script>

<style>
    body {
        background-color: #e2dfdf; /* Background abu-abu */
    }

    .img-border-shadow {
        border: 2px solid #ddd;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    }

    .thumbnail-img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        cursor: pointer;
        border-radius: 5px;
        transition: 0.3s;
        border: 2px solid #ccc; /* Border abu-abu */
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1); /* Shadow lembut */
    }

    .thumbnail-img:hover, .thumbnail-img:focus {
        transform: scale(1.1);
        border: 2px solid #007bff;
    }

    .carousel-inner img {
        height: 300px;
        object-fit: contain;
        background: #f8f9fa;
        border: 3px solid #ccc; /* Border abu-abu */
        box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.2); /* Shadow lebih kuat */
    }

    .carousel-control-prev, .carousel-control-next {
        background: rgba(131, 125, 125, 0.3);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
    }

    .carousel-control-prev-icon, .carousel-control-next-icon {
        filter: invert(1);
    }
</style>
@endsection
