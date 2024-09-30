<x-form title="Kaprodi" heading="Edit Data Dosen">
    <form action="{{ route('kaprodi.dosens.update', $dosen->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Input Nama -->
        <input id="name" type="text" name="name"
            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker" 
            placeholder="Nama Dosen" required value="{{ old('name', $dosen->name) }}" />


        <input id="kode_dosen" type="kode_dosen" name="kode_dosen"
        class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker" 
        placeholder="kode_dosen Dosen" readonly value="{{ old('kode_dosen', $dosen->kode_dosen) }}" />
        <input id="nip" type="nip" name="nip"
        class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker" 
        placeholder="nip Dosen" readonly value="{{ old('nip', $dosen->nip) }}" />

        <!-- Pilihan Kelas -->
        <select id="kelas_id" name="kelas_id"
        class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker" >
        <option value="">Pilih Kelas</option>
            @foreach ($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}" {{ $dosen->kelas_id == $kelasItem->id ? 'selected' : '' }}>
                    {{ $kelasItem->name }}
                </option>
            @endforeach
        </select>

        <!-- Submit Button -->
        <div>
            <button type="submit"
                class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none">
                Update Dosen
            </button>
        </div>
    </form>
    </div>
</x-form>
