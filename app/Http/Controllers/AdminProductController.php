<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::with('images')->get();
        return view('admin.produk', compact('products'));
    }

    public function create()
    {
        return view('admin.create_produk');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk'  => 'required|string|max:255',
            'harga'        => 'required|numeric|min:0',
            'tahun'        => 'required|numeric|min:1900|max:' . date('Y'),
            'warna'        => 'required|string|max:100',
            'transmisi'    => 'required|string|in:Manual,Otomatis',
            'bahan_bakar'  => 'required|string|in:Bensin,Diesel,Listrik',
            'kapasitas'    => 'required|numeric|min:1',
            'lokasi'       => 'required|string|max:255',
            'kilometer'    => 'required|numeric|min:0',
            'deskripsi'    => 'required|string',
            'cicilan'      => 'nullable|numeric|min:0',
            'gambar'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*'     => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        DB::beginTransaction();
        try {
            // Simpan gambar utama jika ada
            $gambarUtama = null;
            if ($request->hasFile('gambar')) {
                $gambarUtama = $request->file('gambar')->store('produk', 'public');
            }

            // Simpan produk ke database (timestamps akan otomatis diisi)
            $product = Product::create([
                'nama_produk'  => $request->nama_produk,
                'harga'        => $request->harga,
                'tahun'        => $request->tahun,
                'warna'        => $request->warna,
                'transmisi'    => $request->transmisi,
                'bahan_bakar'  => $request->bahan_bakar,
                'kapasitas'    => $request->kapasitas,
                'lokasi'       => $request->lokasi,
                'kilometer'    => $request->kilometer,
                'deskripsi'    => $request->deskripsi,
                'cicilan'      => $request->cicilan,
                'gambar'       => $gambarUtama,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);

            // Simpan gambar tambahan jika ada
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('produk', 'public');
                    ProductImage::create([
                        'product_id'  => $product->id,
                        'gambar'      => $path,
                        'created_at'  => now(),
                        'updated_at'  => now(),
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $images = ProductImage::where('product_id', $id)->get();
        return view('admin.edit_produk', compact('product', 'images'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk'  => 'required|string|max:255',
            'harga'        => 'required|numeric|min:0',
            'tahun'        => 'required|numeric|min:1900|max:' . date('Y'),
            'warna'        => 'required|string|max:100',
            'transmisi'    => 'required|string|in:Manual,Otomatis',
            'bahan_bakar'  => 'required|string|in:Bensin,Diesel,Listrik',
            'kapasitas'    => 'required|numeric|min:1',
            'lokasi'       => 'required|string|max:255',
            'kilometer'    => 'required|numeric|min:0',
            'deskripsi'    => 'required|string',
            'cicilan'      => 'nullable|numeric|min:0',
            'gambar'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*'     => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $product = Product::findOrFail($id);

            // Periksa apakah ada gambar utama baru
            if ($request->hasFile('gambar')) {
                if ($product->gambar) {
                    Storage::delete('public/' . $product->gambar);
                }
                $product->gambar = $request->file('gambar')->store('produk', 'public');
            }

            // Perbarui produk (updated_at otomatis diperbarui)
            $product->update([
                'nama_produk'  => $request->nama_produk,
                'harga'        => $request->harga,
                'tahun'        => $request->tahun,
                'warna'        => $request->warna,
                'transmisi'    => $request->transmisi,
                'bahan_bakar'  => $request->bahan_bakar,
                'kapasitas'    => $request->kapasitas,
                'lokasi'       => $request->lokasi,
                'kilometer'    => $request->kilometer,
                'deskripsi'    => $request->deskripsi,
                'cicilan'      => $request->cicilan,
                'updated_at'   => now(),
            ]);

            // Simpan gambar tambahan jika ada
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('produk', 'public');
                    ProductImage::create([
                        'product_id' => $product->id,
                        'gambar'     => $path,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('admin.admin.produk')->with('success', 'Produk berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function destroyImage($id)
    {
        $image = ProductImage::findOrFail($id);
    
        // Cek apakah file gambar ada sebelum menghapus
        if (Storage::disk('public')->exists($image->gambar)) {
            Storage::disk('public')->delete($image->gambar);
        }
    
        // Hapus data dari database
        $image->delete();
    
        return response()->json(['success' => 'Gambar berhasil dihapus!']);
    }

     public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        if ($product->gambar) {
            Storage::disk('public')->delete($product->gambar);
        }
        
        $images = ProductImage::where('product_id', $id)->get();
        foreach ($images as $image) {
            Storage::disk('public')->delete($image->gambar);
            $image->delete();
        }
        
        $product->delete();

        return redirect()->route('admin.admin.produk')->with('success', 'Produk berhasil dihapus!');
    }
}
