<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akad;
use Illuminate\Support\Facades\Storage;

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
        $akad = Akad::findOrFail($id);
        return view('user.lihatakad', compact('akad'));
    }

    public function index()
    {
        $akads = Akad::all();
        return view('user.lihatakad', compact('akads'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:15',
            'jumlah_kredit' => 'required|numeric',
            'jangka_waktu' => 'required|numeric',
            'foto_benda' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto_benda')) {
            $fotoPath = $request->file('foto_benda')->store('public/foto_benda');
        }

        $akad = Akad::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'jumlah_kredit' => $request->jumlah_kredit,
            'jangka_waktu' => $request->jangka_waktu,
            'foto_benda' => $fotoPath ? str_replace('public/', '', $fotoPath) : null,
            'user_id' => auth()->id(),
        ]);

        
        return redirect()->route('nasabah.lihatakad', ['id' => $akad->id])->with('success', 'Akad berhasil dibuat!');
    }

    public function edit($id)
    {
        $akad = Akad::findOrFail($id);
        return view('user.edit_akad', compact('akad'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:15',
            'jumlah_kredit' => 'required|numeric',
            'jangka_waktu' => 'required|numeric',
            'foto_benda' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $akad = Akad::findOrFail($id);

        if ($request->hasFile('foto_benda')) {
            if ($akad->foto_benda && Storage::exists('public/' . $akad->foto_benda)) {
                Storage::delete('public/' . $akad->foto_benda);
            }

            $fotoPath = $request->file('foto_benda')->store('public/foto_benda');
            $akad->foto_benda = str_replace('public/', '', $fotoPath);
        }

        $akad->update([
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'jumlah_kredit' => $request->jumlah_kredit,
            'jangka_waktu' => $request->jangka_waktu,
        ]);

        return redirect()->route('nasabah.dashboard')->with('success', 'Akad berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $akad = Akad::findOrFail($id);
        if ($akad->foto_benda && Storage::exists('public/' . $akad->foto_benda)) {
            Storage::delete('public/' . $akad->foto_benda);
        }

        $akad->delete();

        return redirect()->route('nasabah.akad')->with('success', 'Data akad berhasil dihapus.');
    }

    public function daftarAkad()
    {
        $akads = Akad::with('user')->where('status', 'pending')->get();
        return view('admin.akads', compact('akads'));
    }

    public function acceptAkad($id)
    {
        $akad = Akad::findOrFail($id);
        $akad->status = 'accepted';
        $akad->save();

        return redirect()->back()->with('success', 'Akad berhasil diterima.');
    }

    public function rejectAkad($id)
    {
        $akad = Akad::findOrFail($id);
        $akad->status = 'rejected';
        $akad->save();

        return redirect()->back()->with('success', 'Akad berhasil ditolak.');
    }

    public function kirimAkad($id)
    {
        try {
            $akad = Akad::findOrFail($id);
            $akad->status = 'pending';
            $akad->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Akad berhasil dikirim!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat mengirim akad.',
            ]);
        }
    }

    public function lihatakad($id)
{
    // Ambil data akad dari database
    $akads = Akad::all();

    // Kirim data ke view
    return view('user.lihatakad', compact('akads'));
}


    public function pembayaran()
    {
        $bendaAccepted = Akad::where('status', 'accepted')->get();
        return view('user.pembayaran', compact('bendaAccepted'));
    }

    public function prosesPembayaran(Request $request)
    {
        $bendaId = $request->input('benda');

        $request->validate([
            'benda' => 'required|exists:akads,id',
        ]);

        $akad = Akad::findOrFail($bendaId);
        $akad->status = 'dibayar';
        $akad->save();

        return redirect()->route('nasabah.nasabah.pembayaran.proses')->with('success', 'Pembayaran berhasil diproses!');
    }

    public function showPembayaran()
    {
        $bendaAccepted = Akad::where('status', 'accepted')->get();
        return view('nasabah.pembayaran', compact('bendaAccepted'));
    }

    public function sedangBerjalan()
    {
        $akads = Akad::where('status', 'sedang berjalan')->get();
        return view('admin.akads.sedangBerjalan', compact('akads'));
    }

    public function riwayatAkads()
    {
        $akads = Akad::whereNotNull('riwayat')->get();

        $akads->each(function ($akad) {
            $akad->riwayat = $akad->riwayat ? json_decode($akad->riwayat, true) : [];
        });

        return view('admin.riwayat', compact('akads'));
    }
}
