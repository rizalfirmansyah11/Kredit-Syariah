@extends('layout.nasabah')

@section('title', 'Dashboard Nasabah')

@section('content')


<!-- Tambahkan Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">


<div class="content-wrapper" style="padding: 20px; background: #f8f9fa; min-height: 100vh;">
  <!-- Content Wrapper -->

    <form id="hitungPembayaranForm">
        <div class="card mt-4">
            <div class="card-header">
                <h3 class="card-title">Data Akad yang Disetujui</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>NIK</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Jumlah Kredit</th>
                            <th>Jangka Waktu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($akadAccepted as $akad)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $akad->nama_lengkap }}</td>
                                <td>{{ $akad->nik }}</td>
                                <td>{{ $akad->alamat }}</td>
                                <td>{{ $akad->telepon }}</td>
                                <td>Rp{{ number_format($akad->jumlah_kredit, 0, ',', '.') }}</td>
                                <td>{{ $akad->jangka_waktu }} bulan</td>
                                <td>
                                    <button class="btn btn-success btn-sm" type="button" onclick="bayarAkad({{ $akad->id }})">
                                        Bayar
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Data tidak ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </form>

    <div id="hasilPembayaran" class="mt-4">
        <!-- Hasil pembayaran akan ditampilkan di sini -->
    </div>

    <script>
        function bayarAkad(akadId) {
            const akad = @json($akadAccepted).find(item => item.id === akadId);

            if (akad) {
                const jumlahKredit = akad.jumlah_kredit;
                const jangkaWaktu = akad.jangka_waktu;

                // Hitung cicilan per bulan
                const cicilanPerBulan = jumlahKredit / jangkaWaktu;

                // Fungsi untuk format angka ke Rupiah
                const formatRupiah = (angka) => {
                    return "Rp" + angka.toFixed(0).replace(/\d(?=(\d{3})+$)/g, '$&,');
                };

                // Dapatkan tanggal saat ini
                const startDate = new Date();
                startDate.setDate(1); // Atur ke tanggal 1 setiap bulan

                // Buat daftar cicilan dengan tanggal pembayaran dan input
                let hasilHTML = `
                    <h4>Pembayaran Cicilan untuk ${akad.nama_lengkap}</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Bulan</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Jumlah Cicilan</th>
                                <th>Jumlah yang Dibayar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                `;

                for (let i = 1; i <= jangkaWaktu; i++) {
                    const paymentDate = new Date(startDate);
                    paymentDate.setMonth(paymentDate.getMonth() + (i - 1));
                    const paymentDateString = paymentDate.toLocaleDateString('id-ID', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });

                    hasilHTML += `
                        <tr>
                            <td>Bulan ke-${i}</td>
                            <td>${paymentDateString}</td>
                            <td>${formatRupiah(cicilanPerBulan)}</td>
                            <td>
                                <input type="number" class="form-control" id="bayarBulan${i}" placeholder="Masukkan jumlah bayar">
                            </td>
                            <td>
                                <button class="btn btn-primary btn-sm" type="button" onclick="prosesPembayaran(${akadId}, ${i}, ${cicilanPerBulan})">
                                    Bayar
                                </button>
                            </td>
                        </tr>
                    `;
                }

                hasilHTML += `
                        </tbody>
                    </table>
                `;

                // Tampilkan hasil di elemen hasilPembayaran
                document.getElementById('hasilPembayaran').innerHTML = hasilHTML;
            } else {
                alert('Data akad tidak ditemukan!');
            }
        }

        function prosesPembayaran(akadId, bulan, cicilanPerBulan) {
            const inputBayar = document.getElementById(`bayarBulan${bulan}`).value;

            if (inputBayar === "") {
                alert("Jumlah pembayaran harus diisi!");
                return;
            }

            const jumlahBayar = parseFloat(inputBayar);

            if (jumlahBayar < cicilanPerBulan) {
                alert("Jumlah pembayaran tidak mencukupi!");
            } else {
                alert(`Pembayaran untuk bulan ke-${bulan} berhasil!`);
                document.getElementById(`bayarBulan${bulan}`).setAttribute("disabled", true);
            }
        }
    </script>
</div>

</div>
@endsection
