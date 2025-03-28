<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product; // Tambahkan model Product
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class MarginKategoriController extends Controller
{
    // Menampilkan halaman manajemen margin kategori
    public function index()
    {
        $categories = Category::all()->map(function ($category) {
            $category->formatted_updated_at = Carbon::parse($category->updated_at)
                ->timezone('Asia/Jakarta')
                ->format('d M Y, H:i') . ' WIB';
            return $category;
        });

        return view('admin.marginkategori', compact('categories'));
    }

    // Menampilkan formulir tambah kategori
    public function create()
    {
        return view('admin.marginkategori_create');
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'margin_1' => [
                'nullable',
                'numeric',
                'min:0',
                'max:100',
                function ($attribute, $value, $fail) use ($request) {
                    // Jika kategori bukan Elektronik, margin_1 tidak boleh diisi
                    if ($request->name !== 'Elektronik' && !is_null($value)) {
                        $fail('Kategori ini tidak dapat memiliki margin untuk tenor kurang dari 1 tahun.');
                    }
                },
            ],
            'margin_2' => 'nullable|numeric|min:0|max:100',
            'margin_3' => 'nullable|numeric|min:0|max:100',
            'margin_4' => 'nullable|numeric|min:0|max:100',
        ]);
    
        Category::create($request->only(['name', 'margin_1', 'margin_2', 'margin_3', 'margin_4']));
    
        return redirect()->route('admin.admin.marginKategori.index')
                         ->with('success', 'Kategori berhasil ditambahkan.');
    }
    
    

    // Menampilkan halaman edit kategori
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.marginkategori_edit', compact('category'));
    }

    // Mengupdate kategori
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'margin_1' => $category->name === 'Elektronik' ? 'nullable|numeric|min:0|max:100' : 'nullable',
            'margin_2' => 'nullable|numeric|min:0|max:100',
            'margin_3' => 'nullable|numeric|min:0|max:100',
            'margin_4' => 'nullable|numeric|min:0|max:100',
        ]);

        // Simpan perubahan ke database
        $category->update([
            'name' => $request->name,
            'margin_1' => $request->margin_1,
            'margin_2' => $request->margin_2,
            'margin_3' => $request->margin_3,
            'margin_4' => $request->margin_4,
            'updated_by' => Auth::user()->name, // Simpan user yang mengedit
        ]);

        return redirect()->route('admin.admin.marginKategori.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }


    // Menghapus kategori
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.admin.marginKategori.index')->with('success', 'Kategori berhasil dihapus!');
    }

   
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function detail($id)
    {
        // Ambil data kategori berdasarkan ID
        $category = DB::table('categories')->where('id', $id)->first();
    
        // Jika kategori tidak ditemukan, tampilkan error 404
        if (!$category) {
            return abort(404, 'Kategori tidak ditemukan');
        }
    
        // Kirim data ke view
        return view('admin.marginkategori_detail', compact('category'));
    }
    
}
