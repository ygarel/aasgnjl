@extends ('layouts.template')

@section('content')

<div class="container">
    <h1 style="margin-top: 100px;">Data Rayon</h1>
    <a href="{{route('home.page')}}" style="text-decoration: none;">Home/</a>
    <a href="" style="text-decoration: none;">Data Rayon</a>

    <a style="margin-bottom: 25px; float: right;" class="btn btn-primary" href="{{ route('rayon.create') }}" >Tambah Rayon <i class='bx bx-plus bx-spin'></i></a>
    <table class="table table-striped table-bordered table-hover text-center">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Rayon</th>
                <th>Pembimbing</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($rayons as $rayon)
            <tr>                    
                <td>{{ $no++ }}</td>
                <td>{{ $rayon['rayon'] }}</td>
                <td>
                    @foreach ($users as $user)
                        @if ($user->id == $rayon->user_id)
                            {{ $user->name }}
                        @endif
                    @endforeach
                </td>
                
                <td class="d-flex justify-content-center">
                    <a href="{{ route('rayon.edit', $rayon['id']) }}" class="btn btn-primary me-3"><i class='bx bx-edit bx-tada'></i></a>
                    <form action="{{ route('rayon.delete', $rayon['id']) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class='bx bx-trash-alt bx-tada'></i></button>
                    </form>
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