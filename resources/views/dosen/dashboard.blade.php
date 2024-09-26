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
        @if(session('success'))
            <div class="bg-green-500 text-white p-2 rounded">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="bg-red-500 text-white p-2 rounded">
                {{ session('error') }}
            </div>
        @endif
        
        <div class="bg-white p-6 mt-4 shadow-sm rounded-lg">
            <h3 class="text-xl font-semibold mb-4">Requests from Mahasiswa</h3>
        
            @if ($requests->count())
                <ul>
                    @foreach ($requests as $request)
                        <li class="mb-4">
                            Mahasiswa: {{ $request->mahasiswa->name }} - {{ $request->keterangan }}
                            <form action="{{ route('dosen.approveRequest', $request->id) }}" method="POST" class="inline-block ml-4">
                                @csrf
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded">
                                    Approve
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Tidak ada request.</p>
            @endif
        </div>
        

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
