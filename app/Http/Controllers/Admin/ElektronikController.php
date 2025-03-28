<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Elektronik;
use Illuminate\Support\Facades\Storage;
use App\Models\ElektronikImage;

class ElektronikController extends Controller
{
    // Menampilkan form tambah elektronik
    public function create()
    {
        return view('admin.elektronik.elektronik_create');
    }

    // Menyimpan data elektronik ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'merek' => 'required',
            'deskripsi' => 'nullable',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Simpan data elektronik terlebih dahulu
        $elektronik = Elektronik::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'merek' => $request->merek,
            'garansi' => $request->garansi,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
        ]);

        // Simpan banyak gambar ke tabel elektronik_images
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $image) {
                $path = $image->store('produk_elektronik', 'public');

                ElektronikImage::create([
                    'elektroniks_id' => $elektronik->id, // Perbaikan di sini
                    'path' => $path
                ]);
            }
        }

        return redirect()->route('admin.admin.produk')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Menampilkan halaman edit produk elektronik
    public function edit($id)
    {
        $elektronik = Elektronik::findOrFail($id);
        $gambar = ElektronikImage::where('elektroniks_id', $id)->get(); // Ambil semua gambar
        return view('admin.elektronik.elektronik_edit', compact('elektronik', 'gambar'));
    }

    // Memproses update produk elektronik
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'merek' => 'required|string|max:100',
            'garansi' => 'nullable|string|max:50',
            'lokasi' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $elektronik = Elektronik::findOrFail($id);
        $elektronik->update([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'merek' => $request->merek,
            'garansi' => $request->garansi,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
        ]);

        // Tambahkan gambar baru tanpa menghapus yang lama
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $image) {
                $path = $image->store('produk_elektronik', 'public');

                ElektronikImage::create([
                    'elektroniks_id' => $elektronik->id,
                    'path' => $path
                ]);
            }
        }

        return redirect()->route('admin.admin.produk')->with('success', 'Produk elektronik berhasil diperbarui!');
    }

    // Menghapus produk elektronik
    public function destroy($id)
    {
        $elektronik = Elektronik::findOrFail($id);

        // Hapus semua gambar terkait
        $gambar = ElektronikImage::where('elektroniks_id', $id)->get();
        foreach ($gambar as $img) {
            Storage::disk('public')->delete($img->path);
            $img->delete();
        }

        $elektronik->delete();

        return redirect()->route('admin.admin.produk')->with('success', 'Produk elektronik berhasil dihapus!');
    }
}
