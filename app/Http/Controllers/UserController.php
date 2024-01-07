<?php

namespace App\Http\Controllers;

use App\Models\User as Users;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Users::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = Users::all();
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        $defaultPass = Str::substr($request->email, 0, 3) . Str::substr($request->name, 0, 3);

        Users::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'role' =>$request->role,
            'password' => bcrypt('$defaultPass')
        ]);

        return redirect()->back()->with('success', 'Berhasil Menambahkan Akun');
    }

    /**
     * Display the specified resource.
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $users = Users::find($id);
        return view('user.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => '',
        ]);

        Users::where('id', $id)([
            'name' =>$request->name,
            'email' =>$request->email,
            'role' =>$request->role,
            'password' => $request->password,
        ]);

        return redirect()->route('user.index')->with('success', 'Berhasil Mengganti Akun');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Users::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Data berhasil Dihapus!');
    }

    public function loginAuth(Request $request) 
    {
        $request->validate([
            'email' => 'required|email:dms',
            'password' => 'required',
        ], [
            'email.required' => 'email harus diisi!',
            'email.email' => 'Email tidak valid!',
            'password.required' => 'Password wajib diisi!',
            'email.required' => 'Password harus diisi huruf dan karakter tanpa spasi!',
        ]);

        $users = $request->only(['email', 'password']);
        
        if (Auth::attempt($users)) {
            return redirect()->route('home.page');
        } else {
            return redirect()->back()->with('failed', 'Proses login gagal harap masukkan data yang valid!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('logout', 'Anda berhasil logout!');
    }
}
