<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Profi</title>
</head>

<body>
    <h2 class="text-2xl m-8">Profil Saya</h2>
    <div class="bg-slate-300 p-6 m-8 shadow-sm rounded-lg">
        @if ($mahasiswa)
            <h3 class="text-xl font-semibold mb-4">Detail Mahasiswa</h3>
            <p><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
            <p><strong>Nama:</strong> {{ $mahasiswa->name }}</p>
            <p><strong>Tempat, Tanggal Lahir:</strong> {{ $mahasiswa->tempat_lahir }}, {{ $mahasiswa->tanggal_lahir }}
            </p>
        @endif
        
    </div>

    <div class="shadow-sm rounded-lg bg-slate-300 p-6 m-8">
        <h3 class="text-xl font-semibold mb-4">Detail User</h3>
        @if ($user)
            <p><strong>Username:</strong> {{ $user->username }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>password:</strong>****</p>
        @endif
    </div>

    <div class="shadow-sm rounded-lg bg-slate-300 p-6 m-8">
        <h3 class="text-xl font-semibold mb-4">Permohonan</h3>
        @if(session('success'))
        <div class="text-green-500">
            {{ session('success') }}
        </div>
    @endif
        <form action="{{ route('mahasiswa.profile') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan"
                class="mt-4 p-4 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="silahkan di jelaskan" required>
        </div>
       
        <button type="submit"
            class="mt-4 inline-block bg-slate-500 hover:bg-slate-700 text-white font-bold py-2 px-4 rounded">
            Ajukan Perubahan
        </button>
        </form>
    </div>
</body>

</html>
