<!-- resources/views/late/detail.blade.php -->

@extends('layouts.template')

@section('content')
    <style>
        .container {
            margin-top: 20px;
            padding: 50px;
        }

        .card {
            margin-left: 30px;
            margin-bottom: 20px;
        }
    </style>
    <h1 class="mb-4">Detail Keterlambatan</h1>
    <a href="{{ route('home.page') }}" style="text-decoration: none;">Home/</a>
    <a href="{{ route('late.rekap') }}" style="text-decoration: none;">Data Keterlambatan/</a>
    <a href="" style="text-decoration: none;">Detail Keterlambatan</a>

    <div class="container">
        <div class="row">
            @php $no = 1; @endphp
            @foreach($lates as $late)
                <div class="card" style="width: 20rem;">
                    <div class="card-header">
                        Keterlambatan Ke {{ $no++ }}
                    </div>
                    <div class="card-body">
                        <p>{{ $late->date_time_late }}</p>
                        <p>{{ $late->info }}</p>
                        <p><img src="{{ asset($late->bukti) }}" width="200" height="100"></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
