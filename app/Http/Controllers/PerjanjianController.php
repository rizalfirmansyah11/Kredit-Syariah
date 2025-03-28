<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Pastikan model Product sudah dibuat
use App\Models\Perjanjian;

class PerjanjianController extends Controller
{
    public function buatPerjanjian($id)
    {
        $product = Product::find($id);
    
        // Cek apakah data product ditemukan
        if (!$product) {
            return redirect()->back()->with('error', 'Product tidak ditemukan');
        }
    
        return view('user.perjanjian', compact('product'));
    }
    

    public function simpanPerjanjian(Request $request)
    {
        // Validasi input
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'uang_muka' => 'required|numeric|min:1000000',
            'tenor' => 'required|integer|min:6|max:72',
            'kartu_pendukung' => 'required|file|mimes:jpg,png,pdf|max:2048',
        ]);

        // Simpan file kartu pendukung
        $kartuPath = $request->file('kartu_pendukung')->store('kartu_pendukung', 'public');

        // Simpan data perjanjian
        Perjanjian::create([
            'product_id' => $request->product_id,
            'uang_muka' => $request->uang_muka,
            'tenor' => $request->tenor,
            'kartu_pendukung' => $kartuPath,
        ]);

        return redirect()->route('perjanjian.buat', ['id' => $request->product_id])
            ->with('success', 'Perjanjian berhasil disimpan!');
    }
}
