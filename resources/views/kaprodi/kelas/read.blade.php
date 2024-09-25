@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Kelas: {{ $kelas->name }}</h1>

        @if (session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tampilkan Dosen Pengampu -->
        <h3 class="text-xl font-semibold">Dosen:</h3>
    <ul>
        @foreach($kelas->dosens as $dosen)
            <li>{{ $dosen->name }}</li>
        @endforeach
    </ul>

        <!-- Tampilkan Daftar Mahasiswa di Kelas Ini -->
        <h3 class="text-xl font-semibold">Daftar Mahasiswa:</h3>
        <ul>
            @foreach ($kelas->mahasiswas as $mahasiswa)
                <li>{{ $mahasiswa->name }} ({{ $mahasiswa->nim }})</li>
            @endforeach
        </ul>

        <div class="mt-4">
            <h3 class="text-xl font-semibold">Tambah Mahasiswa ke Kelas</h3>
            <form action="{{ route('kaprodi.kelas.plotmahasiswa', $kelas->id) }}" method="POST">
                @csrf
                <label for="mahasiswa_id" class="block mb-2">Pilih Mahasiswa</label>
                <select name="mahasiswa_id" id="mahasiswa_id" class="border rounded w-1/2 bg-blue-100 text-gray-800 shadow-sm focus:outline-none focus:ring focus:ring-blue-500">
                    @foreach($availableMahasiswas as $mahasiswa)
                        <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->name }} kelas asal :{{ $mahasiswa->kelas->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Tambah Mahasiswa</button>
            </form>
        </div>
    
        <div class="mt-4">
            <h3 class="text-xl font-semibold">Tambah Dosen ke Kelas</h3>
            <form action="{{ route('kaprodi.kelas.plotdosen', $kelas->id) }}" method="POST">
                @csrf
                <label for="dosen_id" class="block mb-2">Pilih Dosen</label>
                <select name="dosen_id" id="dosen_id" class="border rounded w-1/2 bg-blue-100 text-gray-800 shadow-sm focus:outline-none focus:ring focus:ring-blue-500">
                    @foreach($availableDosens as $dosen)
                        <option value="{{ $dosen->id }}">{{ $dosen->name }} kelas asal: {{ $dosen->kelas->name }} </option>
                    @endforeach
                </select>
                <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Tambah Dosen</button>
            </form>
        </div>
    </div>
@endsection
