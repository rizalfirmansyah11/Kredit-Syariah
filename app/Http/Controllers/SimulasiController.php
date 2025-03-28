<?php

namespace App\Http\Controllers;

use App\Models\Category; // Pastikan model dipanggil
use Illuminate\Http\Request;

class SimulasiController extends Controller
{
    public function simulasi()
    {
        return view('user.simulasi');
    }

    public function hitung(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string',
            'harga_barang' => 'required|numeric',
            'uang_muka' => 'required|numeric',
            'tenor' => 'required|integer|in:12,24,36,48,60',
        ]);

        $nama_barang = $request->input('nama_barang');
        $harga_barang = (float) $request->input('harga_barang');
        $uang_muka = (float) $request->input('uang_muka');
        $tenor = (int) $request->input('tenor');

        $tenors = [
            12 => 0.06,
            24 => 0.08,
            36 => 0.10,
            48 => 0.12,
            60 => 0.15,
        ];

        if (!isset($tenors[$tenor])) {
            return redirect()->back()->withErrors(['Tenor tidak valid.']);
        }

        $margin = $tenors[$tenor];
        $pembiayaan_setelah_dp = $harga_barang - $uang_muka;
        $total_pembayaran = $pembiayaan_setelah_dp * (1 + $margin);
        $angsuran_bulanan = $total_pembayaran / $tenor;

        return redirect()->route('nasabah.simulasi')->with('hasil', [
            'nama_barang' => $nama_barang,
            'harga_cash' => $harga_barang,
            'uang_muka' => $uang_muka,
            'simulasi' => [
                [
                    'bulan' => $tenor,
                    'pembiayaan_setelah_dp' => $pembiayaan_setelah_dp,
                    'margin_keuntungan' => $margin * 100,
                    'total_pembayaran' => $total_pembayaran,
                    'angsuran_bulanan' => $angsuran_bulanan,
                ]
            ],
        ]);
    }

    public function index()
{
    $categories = Category::where('is_applied', 1)->get();

    if ($categories->isEmpty()) {
        return "Tidak ada kategori dalam database.";
    }

    return response()->json($categories); // Cek apakah data benar-benar ada
}
    
}
