//index.blade.php
@extends('layouts.template')

@section('content')

<h1 style="margin-top: -50px">Data Keterlambatan</h1>

<a href="{{ route('home.page') }}" style="text-decoration: none">Home/</a>
<a href="" style="text-decoration: none;">Data Keterlambatan</a>
<style>
    .container {
        max-width: 1200px;
        padding: 75px;
        border-radius: 10px;
        margin-top: 50px;

    }
</style>

<div class="container bg-white">
    <div class="btn2">
        <a style="margin-bottom: 20px" href="{{ route('late.index') }}" class="btn btn-primary">Keseluruhan data</a>
        <a style="margin-bottom: 20px" href="" class="btn btn-secondary disabled">Rekap Data</a>
    </div>
    @csrf
    <form action="{{ route('late.rekap', $students['nis']) }}" method="get" class="d-flex align-items-end ms-auto" style="max-width: 300px;">
        <input class="form-control me-2" type="text" name="find" id="find" placeholder="Cari Data">
        <button class="btn btn-outline-success" id="find">Search</button>
    </form>
    
    <table class="table table-bordered table-hover text-center">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Nis</th>
                <th>Nama</th>
                <th>Jumlah Keterlambatan</th>
                <th>Detail</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($rekapData as $rekap)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $rekap['nis'] }}</td>
                    <td>{{ $rekap['nama'] }}</td>
                    <td>{{ $rekap['jumlah_keterlambatan'] }}</td>
                    <td class="d-flex justify-content-center">
                        <a style="text-decoration: none" href="{{ route('late.detail', $rekap['nis']) }}">Detail</a>
                    </td>
                    <td>
                        {{-- Mengambil data lates untuk setiap baris --}}
                        {{-- $lates = Lates::where('student_id', $rekap['nis'])->first(); --}}
                        {{-- Cek apakah $lates tidak null dan jumlah keterlambatan lebih dari atau sama dengan 3 --}}
                        @if ($lates && $rekap['jumlah_keterlambatan'] >= 3)
                            <a class="btn btn-primary" href="{{ route('late.cetak.download', $rekap['nis']) }}">Cetak Surat Pernyataan</a>
                        @endif
                    </td>
                </tr> 
            @endforeach
            </tbody>
    </table>
    @if(Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if(Session::get('deleted'))
        <div class="alert alert-danger">{{ Session::get('deleted') }}</div>
    @endif
</div>
@endsection
