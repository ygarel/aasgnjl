<?php

namespace App\Http\Controllers;

use App\Models\rayons;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RayonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rayons = rayons::all();
        $users = Users::all();
        return view('rayon.index', compact('rayons', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rayons = rayons::all();
        $users = Users::all();
        return view('rayon.create', compact('rayons', 'users'));

        // $rayons = Rayons::all();
        // return view('rayon.create', compact('rayons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rayon' => 'required',
            'user_id' => 'required',
        ]); 
        
        Rayons::create([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id,
        ]);

        return redirect()->back()->with('success', 'data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(rayons $rayons)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rayons = rayons::find($id);
        $users = Users::All();
        return view('rayon.edit', compact('rayons' ,'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rayon' => 'required',
            'user_id' => 'required',
        ]); 
        
        rayons::where('id', $id)->update([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('rayon.index')->with('success', 'data berhasil Diubah!');
    }

    public function destroy($id)
    {
        rayons::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Data  berhasil dihapus!');
    }
}
