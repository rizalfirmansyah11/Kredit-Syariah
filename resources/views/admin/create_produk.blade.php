@extends('layout.main')

@section('content')
<div class="container">
    <h2>Tambah Produk</h2>
    <form action="{{ route('admin.admin.produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <!-- Kolom Kiri -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" required placeholder="Mis. Toyota Avanza 1.5 Veloz AT">
                </div>
                <div class="form-group">
                    <label>Harga (Rp)</label>
                    <input type="number" name="harga" class="form-control" required placeholder="Mis. 210000000">
                </div>
                <div class="form-group">
                    <label>Tahun Produksi</label>
                    <input type="number" name="tahun" class="form-control" required placeholder="Mis. 2025">
                </div>
                <div class="form-group">
                    <label>Warna</label>
                    <input type="text" name="warna" class="form-control" required placeholder="Mis. Putih">
                </div>
                <div class="form-group">
                    <label>Kilometer</label>
                    <input type="number" name="kilometer" class="form-control" required placeholder="Mis. 15000">
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Transmisi</label>
                    <select name="transmisi" class="form-control" required>
                        <option value="">-- Pilih Transmisi --</option>
                        <option value="Manual">Manual</option>
                        <option value="Otomatis">Otomatis</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Bahan Bakar</label>
                    <select name="bahan_bakar" class="form-control" required>
                        <option value="">-- Pilih Bahan Bakar --</option>
                        <option value="Bensin">Bensin</option>
                        <option value="Diesel">Diesel</option>
                        <option value="Listrik">Listrik</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kapasitas Penumpang</label>
                    <input type="number" name="kapasitas" class="form-control" required placeholder="Mis. 7">
                </div>
                <div class="form-group">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" required placeholder="Mis. Jakarta">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4" required placeholder="Deskripsikan produk Anda..."></textarea>
                </div>
                <div class="form-group">
                    <label>Cicilan (Rp/Bulan)</label>
                    <input type="number" name="cicilan" class="form-control" placeholder="Mis. 5000000">
                </div>
            </div>
        </div>

        <!-- Input Gambar Utama -->
        <div class="form-group mt-3">
            <label>Unggah Gambar Utama</label>
            <input type="file" name="gambar" class="form-control" required accept="image/*">
        </div>

        <!-- Input Gambar Tambahan -->
        <div class="form-group mt-3">
            <label>Unggah Gambar Tambahan</label>
            <div id="image-container">
                <div class="input-group mb-2">
                    <input type="file" name="images[]" class="form-control" accept="image/*">
                    <button type="button" class="btn btn-danger" onclick="removeImageInput(this)">Hapus</button>
                </div>
            </div>
            <button type="button" class="btn btn-primary mt-2" onclick="addImageInput()">Tambah Gambar</button>
        </div>

        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-success mt-3">Tambah Mobil</button>
        <a href="{{ route('admin.admin.produk') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>

<script>
    function addImageInput() {
        let container = document.getElementById("image-container");
        let inputGroup = document.createElement("div");
        inputGroup.classList.add("input-group", "mb-2");

        let input = document.createElement("input");
        input.type = "file";
        input.name = "images[]";
        input.classList.add("form-control");
        input.accept = "image/*";

        let removeButton = document.createElement("button");
        removeButton.type = "button";
        removeButton.classList.add("btn", "btn-danger");
        removeButton.innerText = "Hapus";
        removeButton.onclick = function () {
            container.removeChild(inputGroup);
        };

        inputGroup.appendChild(input);
        inputGroup.appendChild(removeButton);
        container.appendChild(inputGroup);
    }

    function removeImageInput(button) {
        button.parentElement.remove();
    }
</script>
@endsection
