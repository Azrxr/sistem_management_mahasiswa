@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>dosen
        </title>
    </head>

    <body>
        <h2>Dashboard dosen</h2>
        {{-- 
    @foreach ($requests as $request)
<tr>
    <td>{{ $request->mahasiswa->name }}</td>
    <td>{{ $request->requested_data }}</td>
    <td>
        <a href="{{ route('dosen.approve', $request->id) }}" class="btn btn-success">Approve</a>
        <a href="{{ route('dosen.decline', $request->id) }}" class="btn btn-danger">Decline</a>
    </td>
</tr>
@endforeach --}}


        <h4>Daftar Mahasiswa</h4>
        <a href="{{ route('dosen.mahasiswas.create') }}"class="btn btn-primary">Tambah Mahasiswa
        </a>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nim</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tempat, Tanggal lahir</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswas as $mahasiswa)
                    <tr>
                        <td>{{ $mahasiswa->nim }}</td>
                        <td>{{ $mahasiswa->name }}</td>
                        <td>{{ $mahasiswa->tempat_lahir }}, {{ $mahasiswa->tanggal_lahir }}</td>
                        <td>{{ $mahasiswa->kelas->name }}</td>


                        <td>
                            <a href="{{ route('dosen.mahasiswas.edit', $mahasiswa->id) }}"
                                class="btn btn-warning btn-sm">Update</a>
                            <form action="{{ route('dosen.mahasiswas.destroy', $mahasiswa->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </body>

    </html>
@endsection
