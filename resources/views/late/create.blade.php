@extends('layouts.template')

@section('content')
<h1 style="margin-top: 75px;">Data Keterlambatan</h1>
    
<a href="{{route('home.page')}}" style="text-decoration: none">Home/</a>
<a href="{{ route('late.index') }}" style="text-decoration: none">Data Keterlambatan</a>
<a href="" style="text-decoration: none">Tambah Data Keterlambatan</a>
<!-- Form tambah data keterlambatan -->
<form enctype="multipart/form-data" style="margin-top: 20px; margin-bottom: 20px" action="{{ route('late.store') }}" method="POST" class="card p-5">
    @csrf

    @if(Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    <div class="mb-3 row">
        <label for="student_id" class="col-sm-2 col-form-label">Siswa</label>
        <select class="form-control" name="student_id" id="student_id">
            <option selected disabled>Pilih Siswa</option>
            @foreach($students as $student)
                <option value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3 row">
        <label for="date_time_late" class="col-sm-2 col-form-label">Tanggal dan Jam</label>
        <input type="datetime-local" class="form-control" name="date_time_late" id="date_time_late" required>
    </div>
    <div class="mb-3 row">
        <label for="info" class="col-sm-3 col-form-label">Keterangan Keterlambatan</label>
        <textarea class="form-control" placeholder="Tambah Informasi" name="info" id="info" style="height: 100px"></textarea>
    </div>
    <div class="mb-3">
        <label for="bukti" class="form-label">Bukti</label>
        <input class="form-control" type="file" name="bukti" id="bukti">
    </div>
    <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
    <a href="{{ route('late.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</form>
@endsection
