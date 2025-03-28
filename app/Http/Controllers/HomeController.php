<?php

namespace App\Http\Controllers;

use App\Models\Akad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;


class HomeController extends Controller
{
    // Menampilkan dashboard admin
    public function dashboard()
    {
      return view('admin.dashboard');
    }

    public function nasabahDashboard()
{
    $products = Product::all(); // Ambil semua produk dari database
    return view('user.dashboard', compact('products'));
}

    

    // Menampilkan daftar user (index)
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $query = User::orderBy('id', 'asc');
    
        if ($search) {
            $query->where('name', 'like', "%$search%")
                  ->orWhere('phone', 'like', "%$search%");
        }
    
        $allUsers = User::orderBy('id', 'asc')->get();
        $data = $query->paginate(10);
    
        $nomorUrutMapping = [];
        foreach ($allUsers as $index => $user) {
            $nomorUrutMapping[$user->id] = $index + 1;
        }
    
        foreach ($data as $user) {
            $user->nomor_urut = $nomorUrutMapping[$user->id] ?? '-';
        }
    
        return view('admin.index', compact('data'));
    }

    // Menyimpan data user
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email|unique:users,email',
            'name'     => 'required|string|max:255',
            'password' => 'required|min:6',
            'phone'    => 'required|string|max:20',
            'address'  => 'required|string|max:255',
            'role'     => 'required|in:admin,nasabah',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        try {
            \DB::beginTransaction();

            User::create([
                'email'    => $request->email,
                'name'     => $request->name,
                'password' => Hash::make($request->password),
                'phone'    => $request->phone,
                'address'  => $request->address,
                'role'     => $request->role,
            ]);

            \DB::commit();
            return redirect()->route('admin.index')->with('success', 'User berhasil ditambahkan!');
        } catch (\Exception $e) {
            \DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id)
{
    $data = User::findOrFail($id);
    return view('admin.edit', compact('data'));
}


    // Update data user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        // Validasi data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string',
            'role' => 'required|in:admin,nasabah',
        ]);
    
        // Update data user
        $user->update($validatedData);
    
        return redirect()->route('admin.index')->with('success', 'Data berhasil diperbarui!');
    }
    
    

    // Hapus data user
    public function delete(Request $request, $id)
    {
        $data = User::find($id);
        if ($data) {
            $data->delete();
        }
        return redirect()->route('admin.index')->with('success', 'Data user berhasil dihapus!');
    }
}
