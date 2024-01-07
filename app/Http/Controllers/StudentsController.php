<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\rayons;
use App\Models\Rombels;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Students::all();
        $rombels = Rombels::all();
        $rayons = rayons::all();
        return view('students.index', compact('students', 'rayons', 'rombels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Students::all();
        $rombels = Rombels::all();
        $rayons = rayons::all();
        return view('students.create', compact( 'students','rayons','rombels'));

        // $students = Students::all();
        // return view('students.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required',
        ]);

        Students::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);

            return redirect()->back()->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Students $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $students = Students::find($id);
        $rombels = Rombels::all();
        $rayons = rayons::all();
        return view('students.edit', compact('students', 'rombels', 'rayons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required',
        ]);

        Students::where('id', $id)->update([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);

            return redirect()->route('student.index')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Students::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Data Berhasil Dihapus!');
    }

    
    
}
