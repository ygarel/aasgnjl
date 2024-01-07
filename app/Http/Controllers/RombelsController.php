<?php

namespace App\Http\Controllers;

use App\Models\Rombels;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RombelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rombels = Rombels::all();
        return view('rombel.index', compact('rombels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rombels = Rombels::all();
        return view('rombel.create', compact('rombels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rombel' => 'required'
        ]);

            Rombels::create([
                'rombel' => $request->rombel
            ]);

            return redirect()->back()->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rombels $rombels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rombels = Rombels::find($id);
        return view('rombel.edit', compact('rombels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rombel' => 'required'
        ]);

        Rombels::where('id', $id)->update([
            'rombel' => $request->rombel
        ]);

            return redirect()->route('rombel.index')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Rombels::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Data berhasil Dihapus!');
    }
}
