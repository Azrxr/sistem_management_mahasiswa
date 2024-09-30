<x-layout title="Kaprodi">

    <body>
        <div class="-mt-20">
            <div class="flex items-center justify-between  py-4 border-b lg:py-6 dark:border-primary-darker">
                <h1 class="text-2xl font-semibold">Dashboard</h1>

            </div>
            @if (session('success'))
                <div class="bg-green-500 text-white p-2 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-500 text-white p-2 rounded">
                    {{ session('error') }}
                </div>
            @endif
            <div class="my-10">
                <div class="flex items-center justify-between py-4 border-b lg:py-6 dark:border-primary-darker">
                    <h1 class="text-2xl font-semibold">Daftar Dosen</h1>
                    <a href="{{ route('kaprodi.dosens.create') }}" target="_blank"
                        class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark">
                        Tambah Dosen
                    </a>
                </div>

                <table class="min-w-full mt-4  rounded-xl shadow-md">
                    <thead class=" dark:border-primary-darker uppercase text-sm leading-normal">
                        <tr>
                            <th class="py-3 px-6 text-left">Nama</th>
                            <th class="py-3 px-6 text-left">NIP</th>
                            <th class="py-3 px-6 text-left">Kode Dosen</th>
                            <th class="py-3 px-6 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody class=" text-sm font-light">
                        @foreach ($dosens as $dosen)
                            <tr class="border-b border-primary-dark hover:bg-primary-dark">
                                <td class="py-3 px-6">{{ $dosen->name }}</td>
                                <td class="py-3 px-6">{{ $dosen->nip }}</td>
                                <td class="py-3 px-6">{{ $dosen->kode_dosen }}</td>
                                <td class="py-3 px-6">
                                    <a href="{{ route('kaprodi.dosens.edit', $dosen->id) }}"
                                        class="text-yellow-500 hover:text-yellow-700">Update</a>
                                    <form action="{{ route('kaprodi.dosens.destroy', $dosen->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 ml-2"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mb-10">
                <div class="my-10">
                    <div class="flex items-center justify-between py-4 border-b lg:py-6 dark:border-primary-darker">
                        <h1 class="text-2xl font-semibold">Daftar kelas</h1>
                        <a href="{{ route('kaprodi.kelas.create') }}" target="_blank"
                            class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark">
                            Tambah kelas
                        </a>
                    </div>
                    <table class="table table-striped table-bordered">
                        <thead class="dark:border-primary-darker uppercase text-sm leading-normal">
                            <tr>
                                <th class="py-3 px-6 text-left">Kelas</th>
                                <th class="py-3 px-6 text-left">Jumlah</th>
                                <th class="py-3 px-6 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody class=" text-sm font-light">
                            @foreach ($kelas as $kelas)
                                <tr class="border-b class=border-b border-primary-dark hover:bg-primary-dark">
                                    <td class="py-3 px-6">
                                        <a href="{{ route('kaprodi.kelas.read', $kelas->id) }}">
                                            {{ $kelas->name }}
                                        </a>
                                    </td>
                                    <td class="py-3 px-6">{{ $kelas->jumlah }}</td>
                                    <td class="py-3 px-6">
                                        <a href="{{ route('kaprodi.kelas.edit', $kelas->id) }}"
                                            class="text-yellow-500 hover:text-yellow-700">Update</a>
                                        <form action="{{ route('kaprodi.kelas.destroy', $kelas->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 ml-2"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mb-10">
                    <div class="my-10">
                        <div class="flex items-center justify-between py-4 border-b lg:py-6 dark:border-primary-darker">
                            <h1 class="text-2xl font-semibold">Daftar Mahasiswa</h1>

                        </div>
                        <table class="min-w-full mt-4  rounded-xl shadow-md">
                            <thead class=" dark:border-primary-darker uppercase text-sm leading-normal">

                                <th class="py-3 px-6 text-left">Nim</th>
                                <th class="py-3 px-6 text-left">Nama</th>
                                <th class="py-3 px-6 text-left">Tempat, Tanggal lahir</th>
                                <th class="py-3 px-6 text-left">Kelas</th>
                                </tr>
                            </thead>
                            <tbody class=" text-sm font-light">
                                @foreach ($mahasiswas as $mahasiswa)
                                    <tr class="border-b border-primary-dark hover:bg-primary-dark">
                                        <td class="py-3 px-6">{{ $mahasiswa->nim }}</td>
                                        <td class="py-3 px-6">{{ $mahasiswa->name }}</td>
                                        <td class="py-3 px-6">{{ $mahasiswa->tempat_lahir }},
                                            {{ $mahasiswa->tanggal_lahir }}</td>
                                        <td class="py-3 px-6">{{ $mahasiswa->kelas->name }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
    </body>

    {{-- @endsection --}}
</x-layout>
