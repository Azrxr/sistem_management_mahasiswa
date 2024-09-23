<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'jumlah'
    ];

    public function index()
    {
        $kelas = Kelas::all();
        return view('kaprodi.dashboard', compact('kelas'));
    }
    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'kelas_id');
    }
}
