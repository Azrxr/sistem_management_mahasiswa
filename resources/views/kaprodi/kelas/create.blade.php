

<x-form title="Kaprodi" heading="Tambah Kelas">

    <form action="{{ route('kaprodi.kelas.save') }}" method="POST" class="space-y-6">
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

        <input id="jumlah" type="text" name="jumlah" required
            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker 
            @error('jumlah') border-red-500 @enderror"
            placeholder="jumlah" />
        @error('jumlah')
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