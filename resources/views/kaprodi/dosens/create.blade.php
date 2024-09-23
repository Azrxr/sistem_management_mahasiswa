@extends('layouts.app')

@section('content')
    <h1>Tambah Dosen</h1>
    <form action="{{ route('kaprodi.dosens.save') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="kelas_id">Kelas</label>
            <select id="kelas_id" name="kelas_id" class="form-control" required>
                <option value="">Select Kelas</option>
                @foreach($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}">{{ $kelasItem->name }}</option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label for="nip">NIP</label>
            <input type="text" id="nip" name="nip" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="name">Kode Dosen</label>
            <input type="text" id="kode_dosen" name="kode_dosen" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    
    </form>
@endsection
