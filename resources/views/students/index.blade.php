@extends ('layouts.template')

@section('content')

<div class="container">
    <h1 style="margin-top: 100px;">Data Siswa</h1>
    <a href="{{route('home.page')}}" style="text-decoration: none">Home/</a>
    <a href="" style="text-decoration: none">Data Siswa</a>

    <a style="margin-bottom: 25px; float: right;" class="btn btn-primary" href="{{ route('student.create') }}" >Tambah Siswa <i class='bx bx-plus bx-spin'></i></a>
    <table class="table table-striped table-bordered table-hover text-center">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Nis</th>
                <th>Nama</th>
                <th>Rombel</th>
                <th>Rayon</th>
                <th>Aksi</th>
                
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($students as $student)
            <tr>                    
                <td>{{ $no++ }}</td>
                <td>{{ $student['nis'] }}</td>
                <td>{{ $student['name'] }}</td>
                @foreach ($rombels as  $rombel)
                @if ($rombel->id == $student->rombel_id)
                    <td>
                        {{ $rombel->rombel }}
                    </td>
                    @endif
                @endforeach
                @foreach ($rayons as  $rayon)
                @if ($rayon->id == $student->rayon_id)
                    <td>
                        {{ $rayon->rayon }}
                    </td>
                    @endif
                @endforeach
                <td class="d-flex justify-content-center">
                    <a href="{{ route('student.edit', $student['id']) }}" class="btn btn-primary me-3"><i class='bx bx-edit bx-tada'></i></a>
                    <form action="{{ route('student.delete', $student['id']) }}" method="post">
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