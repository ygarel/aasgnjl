@extends ('layouts.template')

@section('content')
    <form style="margin-top: 100px" action="{{ route('user.update', $users['id']) }}" method="POST" class="card p-5">
        @method('PATCH')
        @csrf

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama</label>
            <input value="{{ $users['name'] }}" type="text" class="form-control" name="name" id="name">
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <input value="{{ $users['email'] }}" class="form-control" name="email" id="email">
        </div>
        <div class="mb-3 row">
            <label for="role" class="col-sm-2 col-form-label">Role</label>
            <select class="form-control" name="role" id="role">
                <option value="none">...</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : ''}}>Admin</option>
                <option value="pembimbing_siswa" {{ old('role') == 'pembimbing_siswa' ? 'selected' : ''}}>PS</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        @if (Session::get('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
    </form>
@endsection
