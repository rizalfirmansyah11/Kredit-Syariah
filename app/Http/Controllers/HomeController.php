<?php

namespace App\Http\Controllers;

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

    public function store(Request $request){
        
       $validator = Validator::make($request->all(),[
        'email' => 'required|email',
        'name' => 'required',
        'password' => 'required',
       ]);
       if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

       $data['email'] = $request->email;
       $data['name'] = $request->name;
       $data['password'] = Hash::make($request->password);

       User::create($data);

       return redirect()->route('admin.index');
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
    // Pastikan view file 'nasabah.dashboard' sudah ada
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
