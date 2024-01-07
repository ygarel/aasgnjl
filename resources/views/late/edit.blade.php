@extends('layouts.template')

@section('content')
<h1 style="margin-top: 75px;">Data Keterlambatan</h1>
    
<a href="{{ route('home.page') }}" style="text-decoration: none">Home/</a>
<a href="{{ route('late.index') }}" style="text-decoration: none">Data Keterlambatan</a>
<a href="#" style="text-decoration: none">Ubah Data Keterlambatan</a>
<form enctype="multipart/form-data" style="margin-top: 20px; margin-bottom: 20px" action="{{ route('late.update', $lates['id']) }}" method="POST" class="card p-5">
    @method('PATCH')
    @csrf
    @isset($lates)
        @if(Session::get('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="mb-3 row">
            <label for="student_id" class="col-sm-2 col-form-label">Siswa</label>
            <select class="form-control" name="student_id" id="student_id">
                <option selected disabled>Pilih Siswa</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ $lates['student_id'] == $student->id ? 'selected' : '' }}>{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 row">
            <label for="date_time_late" class="col-sm-2 col-form-label">Tanggal</label>
            <input value="{{ $lates['date_time_late'] }}" type="date" class="form-control" name="date_time_late" id="date_time_late">
        </div>
        <div class="mb-3 row">
            <label for="info" class="col-sm-3 col-form-label">Keterangan Keterlambatan</label> 
            <textarea class="form-control" placeholder="Ubah Informasi" name="info" id="info" style="height: 100px">{{ $lates['info'] }}</textarea>
        </div>
        <div class="mb-3">
            <label for="bukti" class="form-label">Bukti</label>
            <input class="form-control" type="file" name="bukti" id="bukti">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
        <a href="{{ route('late.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    @else
        <p>Data tidak ditemukan.</p>
    @endisset
</form>
@endsection
