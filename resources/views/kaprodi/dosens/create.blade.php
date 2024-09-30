
<x-form title="Kaprodi" heading="Tambah Dosen">

    <form action="{{ route('kaprodi.dosens.save') }}" method="POST" class="space-y-6">
        @csrf
        <input id="name" type="text" name="name" required
            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker 
            @error('name') border-red-500 @enderror"
            placeholder="Nama" />
        @error('name')
            <span class="text-sm text-red-500" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input id="nip" type="text" name="nip" required
            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker 
            @error('nip') border-red-500 @enderror"
            placeholder="NIP" />
        @error('nip')
            <span class="text-sm text-red-500" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input id="kode_dosen" type="text" name="kode_dosen" required
            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker 
            @error('kode_dosen') border-red-500 @enderror"
            placeholder="Kode Dosen" />
        @error('kode_dosen')
            <span class="text-sm text-red-500" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <select id="kelas_id" name="kelas_id" required
            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker 
            @error('kelas_id') border-red-500 @enderror">
            <option value="" disabled selected>Pilih kelas</option>
            @foreach ($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}">{{ $kelasItem->name }}</option>
            @endforeach
        </select>
        @error('kelas_id')
            <span class="text-sm text-red-500" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div>
            <button type="submit"
                class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker">
                Kirim
            </button>
        </div>
    </form>

</x-form>


