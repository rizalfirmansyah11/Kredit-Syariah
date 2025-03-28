@extends('layout.main')

@section('content')
<div class="container mx-auto p-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Edit Produk</h2>

    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-300 max-w-4xl mx-auto">
        <form action="{{ route('admin.admin.produk.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-wrapper">
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" name="nama_produk" value="{{ $product->nama_produk }}" required>
                </div>

                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" value="{{ $product->harga }}" required min="0" step="1000">
                </div>

                <div class="form-group">
                    <label>Tahun</label>
                    <input type="number" name="tahun" value="{{ $product->tahun }}" required>
                </div>

                <div class="form-group">
                    <label>Warna</label>
                    <input type="text" name="warna" value="{{ $product->warna }}" required>
                </div>

                <div class="form-group">
                    <label>Transmisi</label>
                    <input type="text" name="transmisi" value="{{ $product->transmisi }}" required>
                </div>

                <div class="form-group">
                    <label>Bahan Bakar</label>
                    <input type="text" name="bahan_bakar" value="{{ $product->bahan_bakar }}" required>
                </div>

                <div class="form-group">
                    <label>Kapasitas</label>
                    <input type="number" name="kapasitas" value="{{ $product->kapasitas }}" required min="1">
                </div>

                <div class="form-group">
                    <label>Kilometer</label>
                    <input type="number" name="kilometer" value="{{ $product->kilometer }}" required min="0">
                </div>

                <div class="form-group">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" value="{{ $product->lokasi }}" required>
                </div>

                <div class="form-group full-width">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" required>{{ $product->deskripsi }}</textarea>
                </div>

                <div class="form-group">
                    <label>Cicilan</label>
                    <input type="number" name="cicilan" value="{{ $product->cicilan }}" min="0" step="1000">
                </div>

             <!-- Menampilkan gambar utama dari kolom "gambar" di tabel products -->
<div class="image-preview-container">
    <div class="image-preview">
        <img src="{{ asset('storage/' . $product->gambar) }}" class="gambar-preview">
    </div>
</div>

<!-- Menampilkan semua gambar dari tabel "product_images" -->
@foreach ($images as $image)
    <div class="image-container">
        <img src="{{ asset('storage/' . $image->gambar) }}" width="100">
        <button class="btn-delete-image" data-id="{{ $image->id }}">Hapus</button>
    </div>
@endforeach



                <!-- Input untuk unggah lebih dari satu gambar -->
                <div class="form-group full-width">
                    <label>Unggah Gambar Baru</label>
                    <input type="file" name="gambar[]" multiple>
                </div>
            </div>

            <div class="submit-container">
                <button type="submit">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    .form-wrapper {
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
        justify-content: space-between;
        padding: 16px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #f9f9f9;
    }

    .form-group {
        width: 48%;
    }

    .form-group.full-width {
        width: 100%;
    }

    .form-group label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    .form-group input, 
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: white;
    }

    .image-preview-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .image-preview {
        position: relative;
        width: 120px;
        height: 120px;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .gambar-preview {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .delete-image {
        position: absolute;
        top: 5px;
        right: 5px;
        background-color: red;
        color: white;
        padding: 5px;
        font-size: 0.8rem;
        border-radius: 4px;
        cursor: pointer;
    }

    .submit-container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    button {
        background-color: #16A34A;
        color: white;
        padding: 12px 24px;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: bold;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease-in-out;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #15803D;
    }
</style>

<script>

    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".btn-delete-image").forEach(button => {
            button.addEventListener("click", function () {
                let imageId = this.getAttribute("data-id");
                let imageCard = this.closest(".image-container");

                if (confirm("Apakah Anda yakin ingin menghapus gambar ini?")) {
                    fetch(`/admin/product-image/${imageId}`, {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                            "Content-Type": "application/json"
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            imageCard.remove(); // Hapus elemen gambar dari tampilan
                            alert("Gambar berhasil dihapus!");
                        } else {
                            alert("Terjadi kesalahan saat menghapus gambar!");
                        }
                    })
                    .catch(error => console.error("Error:", error));
                }
            });
        });
    });
</script>



@endsection