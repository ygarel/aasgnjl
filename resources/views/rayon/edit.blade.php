@extends('layouts.template')

@section('content')
<form style="margin-top: 100px" action="{{ route('rayon.update', $rayons['id']) }}" method="POST" class="card p-5">
    @method('PATCH')
    @csrf

    @if(Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    <div class="mb-3 row">
        <label for="rayon" class="col-sm-2 col-form-label">Rayon</label>
        <input value="{{ $rayons['rayon'] }}" type="text" class="form-control" name="rayon" id="rayon" required>
    </div>
    <div class="mb-3 row">
        <label for="user_id" class="col-sm-2 col-form-label">PS</label>
            <select class="form-control" name="user_id" id="user_id" required>
                <option value="{{ $rayons['user_id'] }}"></option>
                @foreach ($users as $item)    
                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                @endforeach
            </select>
        </div>
    <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
    <a href="{{ route('rayon.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</form>
@endsection
