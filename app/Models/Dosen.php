<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'nip',
        'kode_dosen',
        'user_id',
        'kelas_id'
    ];
    public function index()
    {
        $dosens = Dosen::all();

        // Return ke view dashboard dosen
        return view('dosen.dashboard', compact('dosens'));
    }

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'wali_kelas_id');
    }
}
