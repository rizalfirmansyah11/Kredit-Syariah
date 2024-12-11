<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AkadController extends Controller
{
    public function akad()
    {
        return view('user.akad'); 
    }

    public function buat()
    {
        return view('user.buatakad');
    }
}
