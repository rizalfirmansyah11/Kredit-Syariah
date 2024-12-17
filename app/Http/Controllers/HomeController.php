<?php

namespace App\Http\Controllers;

use App\Models\Akad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function dashboard()
    {
        // Logika untuk halaman dashboard
        return view('admin.dashboard');
    }


    public function index(){

        $data = User::get();

       return view('admin.index',compact('data'));
    }

    public function create(){
        return view('admin.create');
    }

    public function store(Request $request)
{
    // Validasi input
    $validator = Validator::make($request->all(),[
        'email' => 'required|email',
        'name' => 'required',
        'password' => 'required',
    ]);

    // Jika validasi gagal, kembalikan dengan pesan error
    if($validator->fails()) {
        return redirect()->back()->withInput()->withErrors($validator);
    }

    // Menyimpan data user (jika diperlukan)
    $data['email'] = $request->email;
    $data['name'] = $request->name;
    $data['password'] = Hash::make($request->password);
    User::create($data);

    // Simpan data akad ke database
    $akad = new Akad();
    $akad->nama_lengkap = $request->input('nama_lengkap');
    $akad->nik = $request->input('nik');
    $akad->alamat = $request->input('alamat');
    $akad->telepon = $request->input('telepon');
    $akad->jenis_benda = $request->input('jenis_benda');
    $akad->merek = $request->input('merek');
    $akad->tahun_pembuatan = $request->input('tahun_pembuatan');
    $akad->nomor_seri = $request->input('nomor_seri');
    $akad->harga_benda = $request->input('harga_benda');
    $akad->jumlah_kredit = $request->input('jumlah_kredit');
    $akad->jangka_waktu = $request->input('jangka_waktu');
    $akad->angsuran_per_bulan = $request->input('angsuran_per_bulan');
    $akad->uang_muka = $request->input('uang_muka');
    $akad->save();

    // Menambahkan flash message setelah akad berhasil disimpan
    session()->flash('success', 'Akad berhasil dibuat!');

    // Redirect ke halaman surat untuk melihat akad
    return redirect()->route('nasabah.akad.surat', ['id' => $akad->id]);
}


    public function edit(Request $request,$id){
        $data = User::find($id);

       return view('admin.edit', compact('data'));
    }

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'name'      => 'required',
            'password' => 'nullable',
           ]);
           if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
    
           $data['email'] = $request->email;
           $data['name'] = $request->name;

           if($request->password){
            $data['password'] = Hash::make($request->password);
           }

           User::whereId($id)->update($data);
    
           return redirect()->route('admin.index');
    }

    public function delete(Request $request,$id){
        $data = User::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('admin.index');
    }
    public function nasabahDashboard()
    {
   
        //  NASABAH
    return view('user.dashboard');
    }   
    public function simulasi()
    {
        return view('user.simulasi');
    }
    public function akad(){
        return view('user.akad');
    }
  
}
