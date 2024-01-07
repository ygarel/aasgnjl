//index
@extends('layouts.template')

@section('content')

<h1 style="margin-top: -50px">Data Keterlambatan</h1>

<a href="{{ route('home.page') }}" style="text-decoration: none">Home/</a>
<a href="" style="text-decoration: none;">Data Keterlambatan</a>
<style>
    .container {
        /* align-items: center;
        justify-content: center; */
        max-width: 1200px;
        padding: 75px;
        border-radius: 10px;
        margin-top: 50px
    }
</style>

<div class="container bg-white">
    <div class="btn2">
        <a href="" class="btn btn-primary disabled">Keseluruhan data </a>
        <a href="{{route('late.rekap')}}" class="btn btn-secondary">Rekap Data</a>
    </div>
    <a style="margin-bottom: 25px; float: right;" class="btn btn-primary" href="{{ route('late.create') }}">Tambah Data <i class='bx bx-plus bx-spin'></i></a>
    <table class="table table-bordered table-hover text-center">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Informasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($lates as $late)
                
            <tr>                    
                <td>{{ $no++ }}</td>
                <td>
                    @foreach ($students as $student)
                        @if ($student->id == $late->student_id)
                            {{ $student->name }}
                        @endif
                    @endforeach
                </td>
                <td>{{ $late['date_time_late'] }}</td>
                <td>{{ $late['info'] }}</td>
                {{-- <td> <img width="150px" src="{{ asset('data_file/'.$late->bukti) }}" ></td> --}}
                <td class="d-flex justify-content-center">
                    <a href="{{ route('late.edit', $late['id']) }}" class="btn btn-primary me-3"><i class='bx bx-edit bx-tada'></i></a>
                    <form action="{{ route('late.delete', $late['id']) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger me-3" type="submit"><i class="bx bx-trash bx-tada"></i></button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <ul class="pagination justify-content-center">
        <div class="">
            {{ $lates->links() }}
        </div>
    <ul>
    @if(Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if(Session::get('deleted'))
        <div class="alert alert-danger">{{ Session::get('deleted') }}</div>
    @endif
</div>
@endsection
