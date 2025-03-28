@extends('layout.main')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Produk Elektronik</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Produk Elektronik</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Form Tambah Produk Elektronik
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.elektronik.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- Nama Produk -->
                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <input type="text" name="nama_produk" class="form-control" placeholder="Masukkan nama produk" required>
                                </div>

                                <!-- Harga -->
                                <div class="form-group">
                                    <label>Harga (Rp)</label>
                                    <input type="number" name="harga" class="form-control" placeholder="Masukkan harga produk" required>
                                </div>

                                <!-- Merek -->
                                <div class="form-group">
                                    <label>Merek</label>
                                    <input type="text" name="merek" class="form-control" placeholder="Masukkan merek produk" required>
                                </div>

                                <!-- Garansi -->
                                <div class="form-group">
                                    <label>Garansi</label>
                                    <select name="garansi" class="form-control">
                                        <option value="">Tidak Ada</option>
                                        <option value="6 Bulan">6 Bulan</option>
                                        <option value="1 Tahun">1 Tahun</option>
                                        <option value="2 Tahun">2 Tahun</option>
                                    </select>
                                </div>

                                <!-- Lokasi -->
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <input type="text" name="lokasi" class="form-control" placeholder="Masukkan lokasi produk">
                                </div>

                                <!-- Deskripsi -->
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" rows="3" placeholder="Masukkan deskripsi produk"></textarea>
                                </div>

                                <!-- Gambar Produk (Multiple dengan tombol tambah) -->
                                <div class="form-group">
                                    <label>Gambar Produk</label>
                                    <div id="image-input-container">
                                        <div class="input-group mb-2">
                                            <input type="file" name="gambar[]" class="form-control" accept="image/*" onchange="previewImages(event)">
                                            <button type="button" class="btn btn-danger remove-image-btn" onclick="removeImageInput(this)">X</button>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary mt-2" id="add-image-btn">Tambah Gambar</button>
                                    <div class="mt-2" id="image-preview"></div>
                                </div>

                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ route('admin.admin.produk') }}" class="btn btn-secondary">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- JavaScript untuk Menambah & Preview Gambar -->
<script>
    document.getElementById('add-image-btn').addEventListener('click', function() {
        let container = document.getElementById('image-input-container');
        let newInput = document.createElement('div');
        newInput.classList.add('input-group', 'mb-2');
        newInput.innerHTML = `
            <input type="file" name="gambar[]" class="form-control" accept="image/*" onchange="previewImages(event)">
            <button type="button" class="btn btn-danger remove-image-btn" onclick="removeImageInput(this)">X</button>
        `;
        container.appendChild(newInput);
    });

    function removeImageInput(button) {
        button.parentElement.remove();
    }

    function previewImages(event) {
        let previewContainer = document.getElementById('image-preview');
        previewContainer.innerHTML = '';

        let files = document.querySelectorAll('input[name="gambar[]"]');
        files.forEach(input => {
            if (input.files.length > 0) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'img-thumbnail m-1';
                    img.style.width = '100px';
                    img.style.height = '100px';
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
    }
</script>

<style>
    .img-thumbnail {
        border: 2px solid #ddd;
        border-radius: 5px;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    }
    .remove-image-btn {
        border-radius: 0 5px 5px 0;
    }
</style>

@endsection
