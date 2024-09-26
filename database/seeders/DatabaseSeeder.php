<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Kaprodi;
use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Factories\kaprodiFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

        Kelas::create(['name' => 'Kelas A', 'jumlah' => '0']);
        Kelas::create(['name' => 'Kelas B', 'jumlah' => '0']);
        Kelas::create(['name' => 'Kelas C', 'jumlah' => '0']);
        Kelas::create(['name' => 'Kelas D', 'jumlah' => '0']);
        Kelas::create(['name' => 'Kelas E', 'jumlah' => '0']);

        $kaprodi = User::create([
            'username' => 'Kaprodi User',
            'email' => 'kaprodi@example.com',
            'password' => Hash::make('password'),
            'role' => 'kaprodi',
        ]);

        // Dosen
        $dosen = User::create([
            'username' => 'Dosen User',
            'email' => 'dosen@example.com',
            'password' => Hash::make('password'),
            'role' => 'dosen',
        ]);

        // Mahasiswa
        $mahasiswa = User::create([
            'username' => 'Mahasiswa User',
            'email' => 'mahasiswa@example.com',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
        ]);
        
        Kelas::create(['name' => 'Kelas A', 'jumlah' => '0']);
        Kelas::create(['name' => 'Kelas B', 'jumlah' => '0']);
        Kelas::create(['name' => 'Kelas C', 'jumlah' => '0']);
        Kelas::create(['name' => 'Kelas D', 'jumlah' => '0']);
        Kelas::create(['name' => 'Kelas E', 'jumlah' => '0']);


         User::factory(7)->create();
         Kaprodi::factory(1)->create(['user_id' => $kaprodi->id]);
         Dosen::create([
            'name' => 'Dosen User',
            'user_id' => $dosen->id,
            'kode_dosen' => 'D001',
            'nip' => '1234567890',
            'kelas_id' => 1,
        ]);
         Dosen::factory(5)->recycle(Kelas::all())->create();
         Mahasiswa::factory(100)->recycle(Kelas::all())->create();
         Mahasiswa::create([
            'name' => 'Mahasiswa User',
            'user_id' => $mahasiswa->id,
            'nim' => '1234567890',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '2000-01-01',
            'kelas_id' => 1,
        ]);
    }
}
