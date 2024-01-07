@extends ('layouts.template')

@section('content')
<form style="margin-top: 100px" action="{{ route('rombel.store') }}" method="POST" class="card p-5">
    @csrf

    @if(Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
        <div class="mb-3 row">
            <label for="rombel" class="col-sm-2 col-form-label">Rombel</label>
            <input value="" class="form-control" name="rombel" id="rombel">
        </div>
    <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
    <a href="{{ route('rombel.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</form>
@endsection