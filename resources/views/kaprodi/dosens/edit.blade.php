@extends('layouts.app')

@section('content')
    <h1>Edit Dosen {{ $dosen->name }}</h1>
    <form action="{{ route('kaprodi.dosens.update', $dosen->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Pilihan Kelas -->
        <div class="form-group">
            <label for="kelas_id">Kelas</label>
            <select id="kelas_id" name="kelas_id" class="form-control" required>
                <option value="">Pilih Kelas</option>
                @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}" {{ $dosen->kelas_id == $kelasItem->id ? 'selected' : '' }}>
                        {{ $kelasItem->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- NIP -->
        <div class="form-group">
            <label for="nip">NIP</label>
            <input type="text" id="nip" name="nip" class="form-control" value="{{ $dosen->nip }}" disabled>
        </div>

        <!-- Nama -->
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $dosen->name }}" required>
        </div>

        <!-- Kode Dosen (Read-Only) -->
        <div class="form-group">
            <label for="kode_dosen">Kode Dosen</label>
            <input type="text" id="kode_dosen" name="kode_dosen" class="form-control" value="{{ $dosen->kode_dosen }}"
                disabled>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
