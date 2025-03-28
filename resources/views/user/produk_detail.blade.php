@extends('layout.nasabah')

@section('content')
<div class="container-fluid py-4 bg-light">
    <div class="row">
        <div class="col-md-10 offset-md-2">
            <div class="row g-4 bg-custom-gray p-4 rounded shadow-sm">
                <div class="col-md-5">
                    <div class="card shadow-sm p-3">
                        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('storage/' . $product->gambar) }}" class="d-block w-100 rounded img-border-shadow" alt="Gambar Utama">
                                </div>
                                @foreach($product->images as $image)
                                    <div class="carousel-item">
                                        <img src="{{ asset('storage/' . $image->gambar) }}" class="d-block w-100 rounded img-border-shadow" alt="Gambar Tambahan">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev custom-carousel-btn" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon custom-carousel-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next custom-carousel-btn" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon custom-carousel-icon" aria-hidden="true"></span>
                            </button>
                        </div>
                        <div class="mt-3 d-flex justify-content-center">
                            @foreach($product->images as $index => $image)
                                <img src="{{ asset('storage/' . $image->gambar) }}" class="img-thumbnail mx-1 thumbnail-img" data-bs-target="#productCarousel" data-bs-slide-to="{{ $index + 1 }}" alt="Thumbnail">
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <div class="col-md-7">
                    <h2 class="fw-bold text-primary display-5">{{ $product->nama_produk ?? 'Nama Tidak Tersedia' }}</h2>
                    <div class="row g-3 mt-3">
                        <div class="col-6 col-md-4 info-item"><i class="bi bi-calendar-fill"></i> Tahun: <strong>{{ $product->tahun }}</strong></div>
                        <div class="col-6 col-md-4 info-item"><i class="bi bi-speedometer2"></i> Kilometer: <strong>{{ number_format($product->kilometer, 0, ',', '.') }} km</strong></div>
                        <div class="col-6 col-md-4 info-item"><i class="bi bi-palette"></i> Warna: <strong>{{ ucfirst($product->warna) }}</strong></div>
                        <div class="col-6 col-md-4 info-item"><i class="bi bi-gear-wide-connected"></i> Transmisi: <strong>{{ ucfirst($product->transmisi) }}</strong></div>
                        <div class="col-6 col-md-4 info-item"><i class="bi bi-ev-station-fill"></i> Bahan Bakar: <strong>{{ ucfirst($product->bahan_bakar) }}</strong></div>
                        <div class="col-6 col-md-4 info-item"><i class="bi bi-people-fill"></i> Kapasitas: <strong>{{ $product->kapasitas }} orang</strong></div>
                        <div class="col-6 col-md-4 info-item"><i class="bi bi-geo-alt"></i> Lokasi: <strong>{{ $product->lokasi }}</strong></div>
                    </div>
                    
                    <div class="mt-4">
                        <h3 class="price-main">Rp {{ number_format($product->harga, 0, ',', '.') }}</h3>
                        <p class="price-discount"><s>Rp {{ number_format($product->harga + 500000, 0, ',', '.') }}</s></p>
                        <p class="price-installment">Cicilan mulai Rp {{ number_format($product->harga / 120, 0, ',', '.') }} / bulan</p>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="p-4 bg-white rounded shadow-sm border border-3 border-dark">
                        <h3 class="fw-bold text-primary">Deskripsi Produk</h3>
                        <p class="text-muted">{{ $product->deskripsi }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-4 bg-white rounded shadow-sm border border-3 border-dark">
                        <h3 class="fw-bold text-primary">Simulasi Kredit</h3>
                        <p class="text-muted">Hitung simulasi kredit sesuai dengan tenor yang Anda inginkan.</p>
                        <form id="credit-form">
                            <div class="mb-3">
                                <label for="harga-mobil" class="form-label">Harga Mobil</label>
                                <input type="text" id="harga-mobil" class="form-control" value="200000000">
                            </div>
                            <div class="mb-3">
                                <label for="uang-muka" class="form-label">Uang Muka</label>
                                <input type="text" id="uang-muka" class="form-control" value="50000000">
                            </div>
                            <div class="mb-3">
                                <label for="tenor" class="form-label">Pilih Tenor</label>
                                <select class="form-control" id="tenor">
                                    <option value="12">12 Bulan</option>
                                    <option value="24">24 Bulan</option>
                                    <option value="36" selected>36 Bulan</option>
                                    <option value="48">48 Bulan</option>
                                    <option value="60">60 Bulan</option>
                                    <option value="72">72 Bulan</option>
                                </select>
                            </div>
                            <input type="hidden" id="margin" value="33.75">
                            <button type="submit" class="btn btn-primary w-100">Hitung</button>
                        </form>
                        
                        <div class="mt-4">
                            <h5>Hasil Simulasi:</h5>
                            <p><strong>Harga Kredit:</strong> <span id="harga-kredit">Rp 0</span></p>
                            <p><strong>Sisa Pembayaran:</strong> <span id="sisa-pembayaran">Rp 0</span></p>
                            <p><strong>Cicilan per Bulan:</strong> <span id="cicilan-bulanan">Rp 0</span></p>
                        </div>
                
                        <a href="{{ route('nasabah.nasabah.perjanjian.buat', $product->id) }}" class="btn btn-primary">
                            Ajukan Perjanjian
                        </a>
                        
                        
                        
                        
                        
                        
                        
                     
    
    <a href="https://wa.me/6281234567890" class="btn btn-outline-primary w-75 rounded-pill fw-semibold mt-2" target="_blank">Hubungi Penjual</a>
</div>

                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }
    .info-item {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 1.2rem;
        color: #555;
    }
    .info-item i {
        font-size: 1.5rem;
        color: #343a40;
    }
    .price-main {
        font-size: 2.5rem;
        font-weight: bold;
        color: #dc3545;
    }
    .price-discount {
        font-size: 1.5rem;
        text-decoration: line-through;
        color: #6c757d;
    }
    .price-installment {
        font-size: 1.5rem;
        font-weight: bold;
        color: #28a745;
    }
    .thumbnail-img {
        width: 80px;
        height: 60px;
        cursor: pointer;
        transition: opacity 0.3s;
    }
    .thumbnail-img:hover {
        opacity: 0.7;
    }
</style>
<script>

document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("credit-form");
    const hargaMobilInput = document.getElementById("harga-mobil");
    const uangMukaInput = document.getElementById("uang-muka");

    // Fungsi format angka dengan titik pemisah ribuan
    function formatRupiah(angka) {
        return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    // Fungsi membersihkan angka dari titik
    function cleanNumber(str) {
        return str.replace(/\./g, "");
    }

    // Fungsi menangani input angka dengan format titik ribuan
    function handleInputFormat(input) {
        let angkaAsli = cleanNumber(input.value);
        
        if (!angkaAsli) {
            input.value = "";
            return;
        }

        let angkaBaru = parseFloat(angkaAsli);
        if (isNaN(angkaBaru)) {
            input.value = "";
            return;
        }

        // Simpan posisi kursor sebelum perubahan
        let cursorPos = input.selectionStart;
        let beforeLength = input.value.length;

        // Terapkan format angka dengan titik
        input.value = formatRupiah(angkaBaru);

        // Hitung perbedaan panjang setelah format
        let afterLength = input.value.length;
        let diff = afterLength - beforeLength;
        input.setSelectionRange(cursorPos + diff, cursorPos + diff);
    }

    // Event listener untuk input
    [hargaMobilInput, uangMukaInput].forEach(input => {
        input.addEventListener("input", function () {
            handleInputFormat(this);
        });
    });

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        // Ambil nilai input dengan format angka yang bersih
        let hargaMobil = parseFloat(cleanNumber(hargaMobilInput.value)) || 0;
        let uangMuka = parseFloat(cleanNumber(uangMukaInput.value)) || 0;
        let tenor = parseInt(document.getElementById("tenor").value) || 1;
        let margin = parseFloat(document.getElementById("margin").value) || 0;

        // Hitung Harga Kredit
        let hargaKredit = hargaMobil + (hargaMobil * (margin / 100));

        // Hitung Sisa Pembayaran
        let sisaPembayaran = hargaKredit - uangMuka;

        // Hitung Cicilan per Bulan
        let cicilanBulanan = sisaPembayaran / tenor;

        // Format hasil ke Rupiah
        let formatter = new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            minimumFractionDigits: 0
        });

        document.getElementById("harga-kredit").textContent = formatter.format(hargaKredit);
        document.getElementById("sisa-pembayaran").textContent = formatter.format(sisaPembayaran);
        document.getElementById("cicilan-bulanan").textContent = formatter.format(cicilanBulanan);
    });

    // Update margin otomatis berdasarkan tenor
    document.getElementById("tenor").addEventListener("change", function () {
        let tenor = parseInt(this.value);
        let marginInput = document.getElementById("margin");

        let margin = 0;
        if (tenor === 12) margin = 10;
        else if (tenor === 24) margin = 22.5;
        else if (tenor === 36) margin = 33.75;
        else if (tenor === 48) margin = 45.0;
        else if (tenor === 60) margin = 56.25;
        else if (tenor === 72) margin = 67.5;

        marginInput.value = margin.toFixed(2);
    });
});



</script>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

@endsection
