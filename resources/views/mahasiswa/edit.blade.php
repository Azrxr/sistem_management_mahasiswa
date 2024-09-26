@extends('layouts.app')

@section('content')
    <h1>Edit Profile {{ $mahasiswa->name }}</h1>
    <form action="{{ route('mahasiswa.updateProfile') }}" method="POST">
        @csrf
        {{-- @method('PUT') --}}
        <div class="form-group">
            <label for="kelas_id">Kelas</label>
            <select id="kelas_id" name="kelas_id" class="form-control" required>
                <option value="">Pilih Kelas</option>
                @foreach($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}" {{ $mahasiswa->kelas_id == $kelasItem->id ? 'selected' : '' }}>
                        {{ $kelasItem->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nip">NIM</label>
            <input type="text" id="nim" name="nim" class="form-control" value="{{ $mahasiswa->nim }}" required disabled>
        </div>

        <!-- Nama -->
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $mahasiswa->name }}" required>
        </div>

        <!-- Tempat Lahir -->
        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" value="{{ $mahasiswa->tempat_lahir }}" required>
        </div>
       
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" value="{{ $mahasiswa->tanggal_lahir }}" required>
        </div>
       
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
