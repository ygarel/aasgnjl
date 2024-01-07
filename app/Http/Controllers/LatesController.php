<?php

namespace App\Http\Controllers;

use App\Models\Lates;
use App\Models\Students;
use App\Models\Rombels;
use App\Models\rayons;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LatesRequest;
use PDF;

class LatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lates = Lates::simplePaginate(5)->withPath(route('late.index'));
        $students = Students::all();
        return view('late.index', compact('lates', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lates = Lates::all();
        $students = Students::all();
        return view('late.create', compact('lates', 'students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'date_time_late' => 'required',
            'info' => 'required|max:1000',
            'bukti' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = time().'.'.$request->file('bukti')->extension();
        $request->bukti->move(public_path('data_file'), $imageName);
        $imagePath = 'data_file/' . $imageName;

        $params = $request->all();
        $params['bukti'] = $imagePath;

        if ($lates = Lates::create($params)) {
            return redirect(route('late.index'))->with('success', 'Berhasil Ditambahkan!');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan data.');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show($nis)
    {
        $students = Students::where('nis', $nis)->first();
        $lates = Lates::whereHas('student', function ($query) use ($nis) {
            $query->where('nis', $nis);
        })->get();

        if ($students && $lates) {
            return view('late.detail', compact('students', 'lates'));
        } else {
            return redirect()->route('late.rekap')->with('error', 'Data tidak ditemukan.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lates = Lates::find($id);
        $students = Students::all();
        return view('late.edit', compact('lates', 'students'));
    }

    public function rekapitu(Request $request)
    {
        $find = $request->input('find');
        $lates = Lates::with('student')->get();
        $students = Students::where(function($query) use ($find) {
            $query->where('nis', 'like', '%' . $find . '%')
                  ->orWhere('name', 'like', '%' . $find . '%');
        })->paginate(5);
        
        $rekapData = [];
    
    foreach ($lates as $late) {
        $studentName = null;
    
        if ($late->student) {
            $studentName = $late->student->name;
        }
    
        if (array_key_exists($studentName, $rekapData)) {
            $rekapData[$studentName]['jumlah_keterlambatan']++;
        } else {
            $rekapData[$studentName] = [
                'nis' => $late->student->nis, 
                'nama' => $studentName,
                'jumlah_keterlambatan' => 1,
            ];
        }
    }
        return view('late.rekap', compact('lates', 'rekapData', 'students'));
    }
    

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'student_id' => 'required',
                'date_time_late' => 'required',
                'info' => 'required|max:1000',
                'bukti' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $lates = Lates::find($id);

            if ($request->hasFile('bukti')) {
                $imageName = time().'.'.$request->file('bukti')->extension();
                $request->file('bukti')->move(public_path('data_file'), $imageName);
                $imagePath = 'data_file/' . $imageName;

                // Hapus file lama jika ada
                if (file_exists(public_path($lates->bukti))) {
                    unlink(public_path($lates->bukti));
                }

                $lates->bukti = $imagePath;
            }

            Lates::where('id', $id)->update([
                'student_id' => $request->student_id,
                'date_time_late' => $request->date_time_late,
                'info' => $request->info,
            ]);

            return redirect()->route('late.index')->with('success', 'Berhasil Diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data. ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $lates = Lates::find($id);

        if (!$lates) {
            return redirect()->back()->with('error', 'Data tidak ditemukan!');
        }

        if (file_exists(public_path($lates->bukti))) {
            unlink(public_path($lates->bukti));
        }

        $lates->delete();

        return redirect()->back()->with('deleted', 'Data Berhasil Dihapus!');
    }

    public function tampil($id)
    {
        $lates = Lates::find($id);
        $students = Students::all();
        return view('late.cetak.print', compact('lates', 'students'));
    }

    public function unduh($id)
    {
        $lates = Lates::find($id);
        $students = Students::all();
        $rombels = Rombels::all();
        $rayons = rayons::all();
        view()->share('lates', $lates);
        $pdf = PDF::loadView('late.cetak.download', compact('lates', 'students', 'rombels', 'rayons'));
        return $pdf->stream('Surat-Pernyataan.pdf');
    }
}
