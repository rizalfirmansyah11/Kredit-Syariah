@extends('layout.main')

@section('title', 'Simulasi Kredit Syariah')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
   .content-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: auto;
        background: #f8f9fa;
        padding: 50px 0;
    }
    .container {
        background: white;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        text-align: center;
        width: 1000px;
    }
    .input-field {
        width: 100%;
        padding: 12px;
        margin: 12px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 18px;
    }
    .btn-primary, .btn-danger {
        width: 100%;
        padding: 16px;
        font-size: 20px;
    }
    .popup {
        position: fixed;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -40%);
        background: white;
        padding: 50px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        display: none;
        width: 800px;
        text-align: center;
        border-radius: 15px;
    }
    .btn-danger {
        background: #dc3545;
        color: white;
        border: none;
        padding: 14px;
        width: 100%;
        cursor: pointer;
        border-radius: 5px;
        font-size: 18px;
    }
</style>

<div class="content-wrapper">
    <div class="container">
        <h2 class="title">Simulasi Akad Kredit</h2>
        <label for="kategori">Pilih Kategori:</label>
        <select id="kategori" class="input-field">
            <option value="properti">Properti</option>
            <option value="elektronik">Elektronik</option>
            <option value="kendaraan">Kendaraan</option>
        </select>
        <input type="file" id="uploadGambar" accept="image/*"><br>
        <img id="preview" src="#" alt="Gambar Barang" class="preview-image" style="max-width: 100%; display: none;"><br>
        <input type="text" id="namaBarang" placeholder="Nama Barang" class="input-field">
        <input type="text" id="hargaCash" placeholder="Harga Cash" class="input-field" oninput="formatInput(this)">
        <button class="btn-primary" onclick="bukaPopup()">Hitung Kredit</button>
    </div>
</div>

<div class="popup" id="popup">
    <h3>Kalkulator Kredit</h3>
    <input type="text" id="hargaBenda" placeholder="Harga Cash" class="input-field" readonly>
    <input type="text" id="uangMuka" placeholder="Uang Muka" class="input-field" oninput="formatInput(this); hitungCicilan()">
    <select id="tenor" class="input-field" onchange="updateMargin(); hitungCicilan()">
        <option value="12">12 Bulan</option>
        <option value="24">24 Bulan</option>
        <option value="36">36 Bulan</option>
        <option value="48">48 Bulan</option>
        <option value="60">60 Bulan</option>
        <option value="72">72 Bulan</option>
    </select>
    <input type="text" id="persentase" placeholder="Margin (%)" class="input-field" readonly>
    <div class="hasil-kredit">
        <span>Harga Kredit: <span id="hargaKredit">Rp 0</span></span><br>
        <span>Sisa Pembayaran: <span id="sisaBayar">Rp 0</span></span><br>
        <span>Cicilan Per Bulan: <span id="cicilan">Rp 0</span></span>
    </div>
    <button class="btn-danger" onclick="tutupPopup()">Tutup</button>
</div>

<script>
    function formatRupiah(angka) {
        return 'Rp ' + angka.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
    function formatInput(input) {
        input.value = formatRupiah(input.value);
    }
    function bukaPopup() {
        let harga = document.getElementById('hargaCash').value;
        if (!harga) {
            alert("Masukkan harga barang terlebih dahulu.");
            return;
        }
        document.getElementById('popup').style.display = 'block';
        document.getElementById('hargaBenda').value = harga;
    }
    function tutupPopup() {
        document.getElementById('popup').style.display = 'none';
    }
    function updateMargin() {
        let tenor = parseInt(document.getElementById("tenor").value);
        let marginInput = document.getElementById("persentase");
        let margin = 30;
        marginInput.value = margin.toFixed(2);
    }
    function hitungCicilan() {
        let harga = parseFloat(document.getElementById('hargaBenda').value.replace(/\D/g, '')) || 0;
        let dp = parseFloat(document.getElementById('uangMuka').value.replace(/\D/g, '')) || 0;
        let tenor = parseInt(document.getElementById('tenor').value) || 1;
        let persen = parseFloat(document.getElementById('persentase').value) || 0;
        let sisa = harga - dp;
        let hargaKredit = sisa + (sisa * (persen / 100));
        let cicilan = hargaKredit / tenor;
        document.getElementById('hargaKredit').innerText = formatRupiah(hargaKredit.toFixed(0).toString());
        document.getElementById('sisaBayar').innerText = formatRupiah(sisa.toString());
        document.getElementById('cicilan').innerText = formatRupiah(cicilan.toFixed(0).toString());
    }
</script>
@endsection