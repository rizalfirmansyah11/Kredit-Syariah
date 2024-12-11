<?php

namespace App\Http\Controllers;

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
            'tenor' => 'required|numeric',
        ]);

        // Data dari form
        $nama_barang = $request->input('nama_barang');
        $harga_barang = $request->input('harga_barang');
        $uang_muka = $request->input('uang_muka');
        $tenor = $request->input('tenor');

        // Perhitungan simulasi
        $biaya_proses = 500000; // Contoh biaya tetap
        $notaris = 1000000; // Contoh biaya tetap
        $survey = 200000; // Contoh biaya tetap
        $harga_beli = $harga_barang - $uang_muka;
        $angsuran_bulan = ($harga_beli + $biaya_proses + $notaris + $survey) / $tenor;
        $total_biaya = $harga_beli + $biaya_proses + $notaris + $survey;

        // Simpan hasil ke session dan redirect
        return redirect()->route('nasabah.simulasi')->with('hasil', [
            'nama_barang' => $nama_barang,
            'harga_cash' => number_format($harga_barang, 0, ',', '.'),
            'harga_beli' => number_format($harga_beli, 0, ',', '.'),
            'tenor' => $tenor,
            'angsuran_bulan' => number_format($angsuran_bulan, 0, ',', '.'),
            'uang_muka' => number_format($uang_muka, 0, ',', '.'),
            'biaya_proses' => number_format($biaya_proses, 0, ',', '.'),
            'notaris' => number_format($notaris, 0, ',', '.'),
            'survey' => number_format($survey, 0, ',', '.'),
            'total_biaya' => number_format($total_biaya, 0, ',', '.'),
        ]);
    }
}
