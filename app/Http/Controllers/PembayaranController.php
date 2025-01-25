<?php

namespace App\Http\Controllers;

use App\Models\Akad;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    // Menampilkan halaman pembayaran
    public function pembayaran(Request $request)
    {
        $namaLengkap = $request->input('nama_lengkap');
    
        $akadAccepted = Akad::where('status', 'accepted')
            ->when($namaLengkap, function ($query, $namaLengkap) {
                return $query->where('nama_lengkap', 'LIKE', "%$namaLengkap%");
            })
            ->get();
    
        return view('user.pembayaran', compact('akadAccepted'));
    }
    

    // Menghitung pembayaran berdasarkan benda yang dipilih dan jumlah bulan
    public function hitungPembayaran(Request $request)
    {
        // Validasi input
        $request->validate([
            'benda_id' => 'required|exists:akad,id', // Pastikan benda_id merujuk ke tabel akad
            'bulan' => 'required|integer|min:1',
        ]);

        // Cari data akad berdasarkan benda_id
        $benda = Akad::findOrFail($request->benda_id);

        // Hitung total pembayaran
        $total = $benda->harga * $request->bulan;

        // Kembalikan respons dalam bentuk JSON
        return response()->json([
            'nama_benda' => $benda->nama_benda,
            'harga_per_bulan' => $benda->harga,
            'bulan' => $request->bulan,
            'total' => $total,
        ]);
    }

    // Memproses pembayaran
    public function prosesPembayaran(Request $request)
{
    $request->validate([
        'akad_id' => 'required|exists:akads,id',
    ]);

    $akad = Akad::findOrFail($request->akad_id);

    // Contoh: Simpan pembayaran ke database
    Akad::create([
        'akad_id' => $akad->id,
        'user_id' => auth()->id(),
        'total_bayar' => $akad->jumlah_kredit,
        'status' => 'paid',
    ]);

    return response()->json(['success' => true, 'message' => 'Pembayaran berhasil']);
}

}
