<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Mahasiswa</title>
    <style>
        .sidebar-collapsed {
            width: 0;
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div class="min-h-screen bg-gray-200 flex">
        <!-- Sidebar -->
        <input type="checkbox" id="toggleSidebar" class="peer hidden">
        <aside id="sidebar" class="w-64 bg-gray-800 text-white transition-all duration-300">
            <div class="p-6">
                <h1 class="text-2xl font-bold">Mahasiswa</h1>
            </div>
            <nav>
                <ul>
                    <li class="px-6 py-2 hover:bg-gray-700">
                        <a href="#" class="block">Dashboard</a>
                    </li>
                    <li class="px-6 py-2 hover:bg-gray-700">
                        <a href="{{ route('mahasiswa.profile') }}" class="block">Profil Saya</a>
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
                <div class="flex items-center">
                    <button id="toggleButton" class="mr-4 p-2 bg-gray-800 text-white rounded">☰</button>
                    <h2 class="text-3xl font-semibold">Profil Mahasiswa</h2>
                </div>
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

    <script>
        document.getElementById('toggleButton').addEventListener('click', function() {
            var sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('sidebar-collapsed');
        });
    </script>
</body>

</html>
