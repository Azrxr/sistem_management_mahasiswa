@extends('layouts.app')

@section('content')
    <h1>Tambah Mahasiswa</h1>
    <form action="{{ route('dosen.mahasiswas.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nip">NIM</label>
            <input type="text" id="nim" name="nim" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="kelas_id">Kelas</label>
            <select id="kelas_id" name="kelas_id" class="form-control" required>
                <option value="">Select Kelas</option>
                @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}">{{ $kelasItem->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" required>

        </div>
        <div class="from-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required>
        </div>


        <button type="submit" class="btn btn-primary">Create</button>

    </form>
@endsection
