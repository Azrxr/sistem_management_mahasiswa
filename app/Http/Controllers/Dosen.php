<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Dosen extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $mahasiswas = Mahasiswa::all();
        return view('dosen.dashboard', compact('mahasiswas', 'user'));
    }

    public function createMahasiswa()
    {
        $user = User::All();
        $kelas = Kelas::all();
        return view('dosen.mahasiswas.create', compact('user', 'kelas'));
    }

    public function storeMahasiswa(Request $request)
    {

        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'name' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $user = User::create([
            'username' => $request->nim,
            'email' => $request->nim . '@example.com',
            'password' => bcrypt('password'),
            'role' => 'mahasiswa',
        ]);
        Mahasiswa::create(array_merge($request->all(), [
            'user_id' => $user->id,
            'wali_kelas_id' => Auth::user()->id,
        ]));

        return redirect()->route('dosen.dashboard')->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    public function editMahasiswa(Mahasiswa $mahasiswa)
    {
        $user = User::all();
        $kelas = Kelas::all();
        return view('dosen.mahasiswas.edit', compact('mahasiswa', 'user', 'kelas'));
    }

    public function updateMahasiswa(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'name' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $mahasiswa->update($request->all());
        return redirect()->route('dosen.dashboard')->with('success', 'Mahasiswa berhasil diupdate');
    }
    public function destroyMahasiswa(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('dosen.dashboard')->with('success', 'Mahasiswa berhasil dihapus');
    }

    // public function approveRequest($requestId)
    // {
    //     $request = RequestDataEdit::find($requestId);
    //     // Update data mahasiswa
    //     $mahasiswa = $request->mahasiswa;
    //     $mahasiswa->update($request->requested_data);

    //     // Hapus request setelah di-approve
    //     $request->delete();
    //     return redirect()->back()->with('success', 'Request di-approve dan data mahasiswa diupdate');
    // }
    // public function declineRequest($requestId)
    // {
    //     // Hapus request tanpa mengubah data
    //     RequestDataEdit::find($requestId)->delete();

    //     return redirect()->back()->with('success', 'Request ditolak');
    // }
}
