<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category; // Import model Category

class SimulasiAdminController extends Controller
{
    // Daftar margin manual berdasarkan kategori
    private $manualMargins = [
        1 => [12 => 5.0, 24 => 7.5, 36 => 10.0, 48 => 12.5], // Contoh untuk kategori ID 1
        2 => [12 => 4.5, 24 => 6.8, 36 => 9.2, 48 => 11.8], // Contoh untuk kategori ID 2
        3 => [12 => 6.0, 24 => 8.0, 36 => 10.5, 48 => 13.0], // Contoh untuk kategori ID 3
        // Tambahkan kategori lain sesuai kebutuhan
    ];

    public function index()
    {
        // Mengambil data kategori yang aktif
        $categories = Category::where('is_applied', 1)->get();
        
        // Mengirim data kategori ke view
        return view('admin.simulasiadmin', compact('categories'));
    }

    public function getMargin(Request $request)
    {
        $kategori_id = $request->input('kategori_id');
        $tenor = (int) $request->input('tenor');

        $kategori = Category::find($kategori_id);

        if (!$kategori) {
            return response()->json(['error' => 'Kategori tidak ditemukan.'], 404);
        }

        // Tentukan margin berdasarkan database
        $index_margin = intval($tenor / 12); // Konversi tenor ke indeks
        $marginField = "margin_" . $index_margin;
        $margin = null;

        // Cek apakah margin ada di database
        if (isset($kategori->$marginField) && !is_null($kategori->$marginField)) {
            $margin = (float) $kategori->$marginField;
        }
        // Jika tidak ada di database, cek di daftar margin manual
        elseif (isset($this->manualMargins[$kategori_id][$tenor])) {
            $margin = (float) $this->manualMargins[$kategori_id][$tenor];
        }

        // Jika margin tetap null, berikan pesan error
        if ($margin === null) {
            return response()->json(['error' => 'Margin untuk tenor ini tidak tersedia.'], 404);
        }

        return response()->json(['margin' => $margin]);
    }

    public function hitung(Request $request)
    {
        // Validasi input
        $request->validate([
            'kategori_id' => 'required|integer|exists:categories,id',
            'nama_barang' => 'required|string',
            'harga_barang' => 'required|numeric',
            'uang_muka' => 'required|numeric',
            'tenor' => 'required|integer|in:12,24,36,48',
        ], [
            'kategori_id.required' => 'Pilih kategori terlebih dahulu sebelum menghitung simulasi.',
            'kategori_id.exists' => 'Kategori yang dipilih tidak valid.',
        ]);

        // Ambil kategori
        $kategori = Category::find($request->input('kategori_id'));

        if (!$kategori) {
            return redirect()->back()->withErrors(['error' => 'Kategori tidak ditemukan.']);
        }

        $nama_barang = $request->input('nama_barang');
        $harga_barang = (float) $request->input('harga_barang');
        $uang_muka = (float) $request->input('uang_muka');
        $tenor = (int) $request->input('tenor');

        // Cek margin dari database atau pakai default manual
        $index_margin = intval($tenor / 12);
        $marginField = "margin_" . $index_margin;
        $margin = null;

        // Cek margin dari database
        if (isset($kategori->$marginField) && !is_null($kategori->$marginField)) {
            $margin = (float) $kategori->$marginField;
        }
        // Jika tidak ada, pakai margin manual
        elseif (isset($this->manualMargins[$kategori->id][$tenor])) {
            $margin = (float) $this->manualMargins[$kategori->id][$tenor];
        }

        // Jika margin tetap null, tampilkan error
        if ($margin === null) {
            return redirect()->back()->withErrors(['error' => 'Margin untuk tenor ini tidak tersedia.']);
        }

        // 🔹 Perhitungan kredit
        $pembiayaan_setelah_dp = $harga_barang - $uang_muka;
        $total_pembayaran = $pembiayaan_setelah_dp * (1 + ($margin / 100));
        $angsuran_bulanan = $total_pembayaran / $tenor;

        // 🔹 Format data hasil simulasi
        $result = [
            'bulan' => $tenor,
            'pembiayaan_setelah_dp' => $pembiayaan_setelah_dp,
            'margin_keuntungan' => $margin,
            'total_pembayaran' => $total_pembayaran,
            'angsuran_bulanan' => $angsuran_bulanan,
        ];

        return redirect()->route('admin.simulasi')->with('hasil', [
            'nama_barang' => $nama_barang,
            'harga_cash' => $harga_barang,
            'uang_muka' => $uang_muka,
            'simulasi' => [$result],
        ]);
    }
}
