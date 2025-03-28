@extends('layout.main')

@section('content')
<div class="container">
    <h2>Edit Produk Elektronik</h2>

    <!-- Menampilkan pesan error jika ada -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.elektronik.update', $elektronik->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" value="{{ old('nama_produk', $elektronik->nama_produk) }}" required>
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ old('harga', $elektronik->harga) }}" required>
        </div>

        <div class="form-group">
            <label>Merek</label>
            <input type="text" name="merek" class="form-control" value="{{ old('merek', $elektronik->merek) }}" required>
        </div>

        <div class="form-group">
            <label>Garansi</label>
            <input type="text" name="garansi" class="form-control" value="{{ old('garansi', $elektronik->garansi) }}">
        </div>

        <div class="form-group">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $elektronik->lokasi) }}">
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $elektronik->deskripsi) }}</textarea>
        </div>

        <div class="form-group">
            <label>Gambar Produk</label>
            @if ($elektronik->gambar)
                <br>
                <img src="{{ asset('storage/' . $elektronik->gambar) }}" alt="Gambar Produk" width="150">
            @endif
            <input type="file" name="gambar" class="form-control-file mt-2">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.admin.produk') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
