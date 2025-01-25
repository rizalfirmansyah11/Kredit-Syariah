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
            'tenor' => 'required|integer|in:12,24,36,48,60', // Pastikan tenor valid
        ]);
    
        $nama_barang = $request->input('nama_barang');
        $harga_barang = $request->input('harga_barang');
        $uang_muka = $request->input('uang_muka');
        $tenor = $request->input('tenor'); // Jumlah bulan yang dipilih pengguna
    
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
    
        $result = [
            'bulan' => $tenor,
            'pembiayaan_setelah_dp' => number_format($pembiayaan_setelah_dp, 0, ',', '.'),
            'margin_keuntungan' => $margin * 100,
            'total_pembayaran' => number_format($total_pembayaran, 0, ',', '.'),
            'angsuran_bulanan' => number_format($angsuran_bulanan, 0, ',', '.'),
        ];
    
        return redirect()->route('nasabah.simulasi')->with('hasil', [
            'nama_barang' => $nama_barang,
            'harga_cash' => number_format($harga_barang, 0, ',', '.'),
            'uang_muka' => number_format($uang_muka, 0, ',', '.'),
            'simulasi' => [$result], // Simpan hanya hasil yang relevan
        ]);
    }
    
}