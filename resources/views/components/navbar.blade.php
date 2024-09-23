@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil Mahasiswa</title>
</head>
<body>
    <div class="container">
        <h1 class="text-3xl font-bold">Dashboard Mahasiswa</h1>
        <h3>Welcome, {{ $user->username }}</h3>

        <div class="card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <h4>Data Mahasiswa</h4>
                <ul>
                    <li><strong>NIM:</strong> {{ $mahasiswa->nim }}</li>
                    <li><strong>Nama:</strong> {{ $mahasiswa->name }}</li>
                    <li><strong>Tempat Lahir:</strong> {{ $mahasiswa->tempat_lahir }}</li>
                    <li><strong>Tanggal Lahir:</strong> {{ \Carbon\Carbon::parse($mahasiswa->tanggal_lahir)->format('d-m-Y') }}</li>
                    <li><strong>Kelas:</strong> {{ $mahasiswa->kelas->name ?? 'Tidak terdaftar' }}</li>
                    <li><strong>wali Kelas:</strong> {{ $mahasiswa->wali_kelas_id->name ?? 'Tidak terdaftar' }}</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
