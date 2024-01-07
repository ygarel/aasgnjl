@extends('layouts.template')

@section('content')
<form style="margin-top: 100px" action="{{ route('rayon.store') }}" method="POST" class="card p-5">
    @csrf

    @if(Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    <div class="mb-3 row">
        <label for="rayon" class="col-sm-2 col-form-label">Rayon</label>
        <input type="text" class="form-control" name="rayon" id="rayon" required>
    </div>
    <div class="mb-3 row">
        <label for="user_id" class="col-sm-2 col-form-label">PS</label>
        <select class="form-control" name="user_id" id="user_id">
            <option selected disabled>Pilih PS</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
    <a href="{{ route('rayon.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</form>
@endsection
