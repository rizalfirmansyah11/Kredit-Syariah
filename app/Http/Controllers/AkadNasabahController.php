<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AkadNasabahController extends Controller
{
    public function bikinAkad($nama_produk, $harga_produk)
    {
        return view('user.BUATAKADBARU', compact('nama_product', 'harga_product'));
    }
    
    
    
    
}
