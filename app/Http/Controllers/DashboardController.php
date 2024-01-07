<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Students;
use App\Models\Rombels;
use App\Models\rayons;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jmlStudent = Students::count();
        $jmlRombel = Rombels::count();
        $jmlRayon = rayons::count();
        $jmlAdmin = Users::where('role', 'admin')->count();
        $jmlPs = Users::where('role', 'pembimbing_siswa')->count();

        return view('dashboard', compact('jmlStudent', 'jmlRombel', 'jmlRayon', 'jmlAdmin', 'jmlPs'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove t  he specified resource from storage.
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
