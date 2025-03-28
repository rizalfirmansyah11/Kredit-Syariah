<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Elektronik;

class NasabahProductController extends Controller
{
    public function index()
    {
        // Ambil semua produk dari tabel products dengan relasi images
        $products = Product::with('images')->get();

        // Ambil semua data dari tabel elektroniks
        $elektroniks = Elektronik::all();

        return view('user.produk', compact('products', 'elektroniks'));
    }
    
    public function show($id)
    {
        $product = Product::find($id);
    
        if (!$product) {
            return redirect()->route('nasabah.nasabah.produk')->with('error', 'Produk tidak ditemukan!');
        }
    
        // Debugging: Periksa isi data produk sebelum dikirim ke view
     
        return view('user.produk_detail', compact('product'));
    }
    


}
