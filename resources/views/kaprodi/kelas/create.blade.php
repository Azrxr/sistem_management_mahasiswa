@extends('layouts.app')
@section('content')
<h2>tambah kelas</h2>
<form action="{{ route('kaprodi.kelas.save') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Nama Kelas</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="jumlah">Jumlah Mahasiswa</label>
        <input type="number" id="jumlah" name="jumlah" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>