@extends('layouts.app')

@section('content')
    <h2>tambah kelas</h2>
    <form action="{{ route('kaprodi.kelas.update', $kelas->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama Kelas</label>
            <input type="text" value="{{ $kelas->name }}" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah Mahasiswa</label>
            <input type="number" value="{{ $kelas->jumlah }}" id="jumlah" name="jumlah" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
