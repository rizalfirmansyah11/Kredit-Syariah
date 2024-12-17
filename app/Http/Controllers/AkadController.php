<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akad; // Pastikan model ini ada

class AkadController extends Controller
{
    // Menampilkan halaman akad
    public function nasabahDashboard()
    {
        return view('user.dashboard'); 
    }

    // Menampilkan halaman buat akad
    public function akad()
    {
        return view('user.akad');
    }

    public function buatakad()
    {
        return view('user.buatakad');
    }

    public function suratAkad($id)
    {
        $akad = Akad::findOrFail($id); // Mengambil data akad berdasarkan ID
        return view('nasabah.user.surat', compact('akad')); // Mengarahkan ke view surat akad
    }


    public function index()
    {
        // Ambil semua data akad dari database
        $akads = Akad::all();

        // Kirim data ke view
        return view('user.lihatakad', compact('akads'));
    }

    public function simpan(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:15',
            'jumlah_kredit' => 'required|numeric',
            'jangka_waktu' => 'required|integer',
        ]);

        // Menyimpan data ke database
        Akad::create($request->all());

        return redirect()->route('nasabah.akad')->with('success', 'Data akad berhasil disimpan!');
    }

    // Menampilkan form edit akad
public function edit($id)
{
    $akad = Akad::findOrFail($id);
    return view('user.edit_akad', compact('akad'));
}

// Mengupdate data akad
public function update(Request $request, $id)
{
    $request->validate([
        'nama_lengkap' => 'required',
        'nik' => 'required|numeric',
        'alamat' => 'required',
        'telepon' => 'required',
        'jumlah_kredit' => 'required|numeric',
        'jangka_waktu' => 'required|numeric',
    ]);

    $akad = Akad::findOrFail($id);
    $akad->update($request->all());

    return redirect()->route('nasabah.akad')->with('success', 'Data akad berhasil diperbarui.');
}

// Menghapus data akad
public function destroy($id)
{
    $akad = Akad::findOrFail($id);
    $akad->delete();

    return redirect()->route('nasabah.akad')->with('success', 'Data akad berhasil dihapus.');
}


    
    
}
