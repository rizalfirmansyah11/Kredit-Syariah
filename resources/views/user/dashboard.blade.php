@extends('layout.nasabah')

@section('title', 'Dashboard Nasabah')

@section('content')
<div class="content-wrapper" style="margin-left: 250px; padding: 20px; background: #f8f9fa; min-height: 100vh;">
  <section class="content">
    <div class="container-fluid">
      <!-- Header Section -->
      <div class="row mb-4">
        <div class="col-md-12">
          <div class="card shadow-lg p-5 text-center bg-primary text-white rounded-4">
            <h1 class="mb-3 fw-bold">Kredit Syariah</h1>
            <h3 class="mb-3">Membangun Masa Depan dengan Prinsip Islami</h3>
            <p class="mb-0">
              Kredit syariah adalah layanan keuangan yang berlandaskan prinsip-prinsip syariah, seperti akad yang sesuai dengan hukum Islam.
            </p>
          </div>
        </div>
      </div>
      
      <!-- Benefits Section -->
      <div class="row">
        <div class="col-md-12">
          <div class="card shadow-sm p-5 rounded-4">
            <h2 class="mb-5 text-center text-primary fw-bold">Manfaat Kredit Syariah</h2>
            <div class="row">
              <!-- Transparansi -->
              <div class="col-md-6 mb-4">
                <div class="card p-4 shadow-sm border-0 rounded-3">
                  <div class="d-flex align-items-start">
                    <img src="{{ asset('lte/dist/img/transparency.png') }}" alt="Transparansi" class="me-3" style="width: 70px; height: 70px;">
                    <div>
                      <h5 class="text-primary fw-bold">Prinsip Transparansi</h5>
                      <p class="mb-0">Semua transaksi dilakukan dengan prinsip transparansi penuh.</p>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Tanpa Riba -->
              <div class="col-md-6 mb-4">
                <div class="card p-4 shadow-sm border-0 rounded-3">
                  <div class="d-flex align-items-start">
                    <img src="{{ asset('lte/dist/img/no-riba.png') }}" alt="Tanpa Riba" class="me-3" style="width: 70px; height: 70px;">
                    <div>
                      <h5 class="text-primary fw-bold">Tanpa Riba</h5>
                      <p class="mb-0">Kredit syariah tidak melibatkan bunga (riba) yang dilarang dalam Islam.</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Partisipasi Bersama -->
              <div class="col-md-6 mb-4">
                <div class="card p-4 shadow-sm border-0 rounded-3">
                  <div class="d-flex align-items-start">
                    <img src="{{ asset('lte/dist/img/group.png') }}" alt="Partisipasi" class="me-3" style="width: 70px; height: 70px;">
                    <div>
                      <h5 class="text-primary fw-bold">Partisipasi Bersama</h5>
                      <p class="mb-0">Nasabah memiliki partisipasi dalam proyek atau bisnis yang dibiayai.</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Akad yang Jelas -->
              <div class="col-md-6 mb-4">
                <div class="card p-4 shadow-sm border-0 rounded-3">
                  <div class="d-flex align-items-start">
                    <img src="{{ asset('lte/dist/img/contract.png') }}" alt="Akad Jelas" class="me-3" style="width: 70px; height: 70px;">
                    <div>
                      <h5 class="text-primary fw-bold">Akad yang Jelas</h5>
                      <p class="mb-0">Setiap transaksi berdasarkan akad yang sah, seperti murabaha, mudharabah, dan musyarakah.</p>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <!-- Footer CTA -->
            <div class="text-center mt-5">
              <a href="#" class="btn btn-lg btn-primary px-5 py-3 rounded-pill fw-bold">
                Pelajari Lebih Lanjut
              </a>
            </div>
          </div>
        </div>
      </div>
<!-- Product Section -->
<div class="row mt-5">
  <div class="col-md-12 text-center" >
    <h2 class="product-heading">Daftar Product</h2>
    <div class="row justify-content-center">
      @foreach ($products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4 d-flex justify-content-center">
          <div class="card shadow-sm border rounded-4 overflow-hidden" 
               style="transition: transform 0.3s ease-in-out; width: 100%; max-width: 320px; border: 2px solid #ddd;">
            <img src="{{ asset('storage/' . $product->gambar) }}" class="card-img-top" alt="{{ $product->nama_produk }}" 
                 style="height: 220px; object-fit: cover; border-bottom: 2px solid #ddd;">
            <div class="card-body text-center p-3">
              <h5 class="fw-bold text-primary">{{ $product->nama_produk }}</h5>
              <p class="text-muted fw-semibold mb-2">Rp{{ number_format($product->harga, 0, ',', '.') }}</p>
              <a href="{{ route('nasabah.nasabah.produk.detail', $product->id) }}" 
                 class="btn btn-outline-primary rounded-pill px-4 fw-bold">Ajukan Kredit</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>

    </div>
  </section>
</div>


<style>
  .card:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
  }
  * Gaya untuk heading */
  .product-heading {
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    font-size: 28px;
    text-align: center;
    color: #007bff;
    letter-spacing: 1px;
    margin-bottom: 20px;
  }
</style>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
@endsection
