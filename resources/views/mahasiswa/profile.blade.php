<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Profil</title>
</head>

<body>
    <h2 class="text-2xl m-8">Profil Saya</h2>
    
    <div class="bg-slate-300 p-6 m-8 shadow-sm rounded-lg">
        @if ($mahasiswa)
            <!-- Tombol Request Edit -->
            @if (!$mahasiswa->edit)
                <form action="{{ route('mahasiswa.requestEdit') }}" method="POST" id="requestEditForm">
                    @csrf
    
                    <div class="mb-4">
                        <label for="keterangan" class="block text-gray-700 text-sm font-bold mb-2">Keterangan:</label>
                        <textarea name="keterangan" id="keterangan" rows="3"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="{{ session('success', 'Jelaskan alasan Anda meminta akses edit...') }}"
                            oninput="checkInput()"></textarea>
                        <span id="warningMessage" class="text-red-500 text-sm hidden">Keterangan tidak boleh kosong!</span>
                    </div>
    
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="submitButton" disabled>
                        Request Edit
                    </button>
                </form>
            @endif
    
            @if (session('success'))
                <div class="text-green-500 mb-4">
                    {{ session('success') }}
                </div>
            @endif
    
            <h3 class="text-xl font-semibold mb-4">Detail Mahasiswa</h3>
            <p class="mb-3">
                @if ($mahasiswa->edit)
                    <a href="{{ route('mahasiswa.edit') }}"
                        class=" bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                        Edit Profil
                    </a>
                @endif

            </p>
            <p><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
            <p><strong>Nama:</strong> {{ $mahasiswa->name }}</p>
            <p><strong>Tempat, Tanggal Lahir:</strong> {{ $mahasiswa->tempat_lahir }}, {{ $mahasiswa->tanggal_lahir }}</p>
        @endif
    </div>
    
    <script>
        function checkInput() {
            const textarea = document.getElementById('keterangan');
            const warningMessage = document.getElementById('warningMessage');
            const submitButton = document.getElementById('submitButton');
    
            if (textarea.value.trim() === '') {
                warningMessage.classList.remove('hidden');
                submitButton.disabled = true;
            } else {
                warningMessage.classList.add('hidden');
                submitButton.disabled = false;
            }
        }
    </script>
    
    
    <script>
        const keteranganTextarea = document.getElementById('keterangan');
        const submitButton = document.getElementById('submitButton');
    
        // Function to toggle submit button
        function toggleSubmitButton() {
            submitButton.disabled = keteranganTextarea.value.trim() === '';
        }
    
        // Initial check
        toggleSubmitButton();
    
        // Event listener to check textarea value
        keteranganTextarea.addEventListener('input', toggleSubmitButton);
    </script>
    


    <div class="shadow-sm rounded-lg bg-slate-300 p-6 m-8">
        <h3 class="text-xl font-semibold mb-4">Detail User</h3>
        @if ($user)
            
            <p><strong>Username:</strong> {{ $user->username }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>password:</strong>****</p>
        @endif
    </div>

    
</body>

</html>
