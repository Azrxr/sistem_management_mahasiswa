@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>kaprodi</title>
    </head>

    <body>
        <h1>Dashboard Kaprodi</h1>

        <h4>Daftar Dosen</h4>
        <a href="{{ route('kaprodi.dosens.create') }}" class="btn btn-primary">Tambah Dosen
        </a>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Kode Dosen</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dosens as $dosen)
                    <tr>
                        <td>{{ $dosen->name }}</td>
                        <td>{{ $dosen->nip }}</td>
                        <td>{{ $dosen->kode_dosen }}</td>
                        <td>
                            <a href="{{ route('kaprodi.dosens.edit', $dosen->id) }}"
                                class="btn btn-warning btn-sm">Update</a>
                            <form action="{{ route('kaprodi.dosens.destroy', $dosen->id) }}" method="POST"
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

        <h4>Daftar kelas</h4>
        <a href="{{ route('kaprodi.kelas.create') }}" class="btn btn-primary">Tambah Kelas
        </a>
        {{-- <a href="{{ route('kaprodi.kelas.plotkelas') }}">Plotting Kelas</a> --}}
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Kelas</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $kelas)
                    <tr>
                        <td>
                            <a href="{{ route('kaprodi.kelas.read', $kelas->id) }}">
                                {{ $kelas->name }}
                            </a>
                        </td>
                        <td>{{ $kelas->jumlah }}</td>
                        <td>
                            <a href="{{ route('kaprodi.kelas.edit', $kelas->id) }}"
                                class="btn btn-warning btn-sm">Update</a>
                            <form action="{{ route('kaprodi.kelas.destroy', $kelas->id) }}" method="POST"
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

        <h4>Daftar Mahasiswa</h4>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nim</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tempat, Tanggal lahir</th>
                    <th scope="col">Kelas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswas as $mahasiswa)
                    <tr>
                        <td>{{ $mahasiswa->nim }}</td>
                        <td>{{ $mahasiswa->name }}</td>
                        <td>{{ $mahasiswa->tempat_lahir }}, {{ $mahasiswa->tanggal_lahir }}</td>
                        <td>{{ $mahasiswa->kelas->name }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>


    </body>

    </html>
@endsection
