<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Mahasiswa</title>
</head>
<body>
    <div class="min-h-screen bg-gray-200 flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white">
            <div class="p-6">
                <h1 class="text-2xl font-bold">Admin Panel</h1>
            </div>
            <nav>
                <ul>
                    <li class="px-6 py-2 hover:bg-gray-700">
                        <a href="#" class="block">Dashboard</a>
                    </li>
                    <li class="px-6 py-2 hover:bg-gray-700">
                        <a href="#" class="block">Profil Saya</a>
                    </li>
                    <li class="px-6 py-2 hover:bg-gray-700">
                        <a href="#" class="block">Pengaturan</a>
                    </li>
                    <li class="px-6 py-2 hover:bg-gray-700">
                        <a href="#" class="block">Keluar</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <!-- Header -->
            <header class="flex justify-between items-center bg-white p-6 shadow-sm">
                <h2 class="text-3xl font-semibold">Profil Mahasiswa</h2>
                <div>
                    <span class="text-gray-600">Welcome, {{ $user->username }}</span>
                </div>
            </header>

            <!-- Content -->
            <div class="bg-white p-6 mt-4 shadow-sm rounded-lg">
                @if ($mahasiswa)
                    <h3 class="text-xl font-semibold mb-4">Detail Mahasiswa</h3>
                    <p><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
                    <p><strong>Nama:</strong> {{ $mahasiswa->name }}</p>
                    <p><strong>Tempat Lahir:</strong> {{ $mahasiswa->tempat_lahir }}</p>
                    <p><strong>Tanggal Lahir:</strong> {{ $mahasiswa->tanggal_lahir }}</p>
                @else
                    <p>Data mahasiswa tidak ditemukan.</p>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
    
