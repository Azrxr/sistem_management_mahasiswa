<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'jumlah'
    ];

    public function index()
    {
        $kelas = Kelas::all();
        return view('kaprodi.dashboard', compact('kelas'));
    }

    public function updateJumlah()
    {
        $jumlahMahasiswa = $this->mahasiswas()->count();
        $jumlahDosen = $this->dosens()->count();
        $this->jumlah = $jumlahMahasiswa + $jumlahDosen;
        $this->save();
    }

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'kelas_id');
    }
    public function dosens()
    {
        return $this->hasMany(Dosen::class, 'kelas_id');
    }
    // public function mahasiswas()
    // {
    //     return $this->belongsToMany(Mahasiswa::class, 'kelas_mahasiswa', 'kelas_id', 'mahasiswa_id');
    // }

    // public function dosens()
    // {
    //     return $this->belongsToMany(Dosen::class, 'kelas_dosen', 'kelas_id', 'dosen_id');
    // }


}
