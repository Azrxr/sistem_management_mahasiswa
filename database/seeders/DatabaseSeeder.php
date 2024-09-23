<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\User;
use Database\Factories\kaprodiFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

        User::create([
            'username' => 'Kaprodi User',
            'email' => 'kaprodi@example.com',
            'password' => Hash::make('password'),
            'role' => 'kaprodi',
        ]);

        // Dosen
        User::create([
            'username' => 'Dosen User',
            'email' => 'dosen@example.com',
            'password' => Hash::make('password'),
            'role' => 'dosen',
        ]);

        // Mahasiswa
        User::create([
            'username' => 'Mahasiswa User',
            'email' => 'mahasiswa@example.com',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
        ]);
         \App\Models\User::factory(7)->create();
         \App\Models\Kaprodi::factory(1)->create();
         \App\Models\Dosen::factory(5)->create();
         \App\Models\Mahasiswa::factory(20)->create();
    }
}
