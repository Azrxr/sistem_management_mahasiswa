<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Kaprodi extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dosens = Dosen::all();
        $kelas = Kelas::all();
        $mahasiswas = Mahasiswa::all();
        return view('kaprodi.dashboard', compact('dosens', 'kelas', 'mahasiswas'));
    }

    public function createDosen()
    {
        $users = User::all();
        $kelas = Kelas::all();
        return view('kaprodi.dosens.create', compact('users', 'kelas'));
    }

    public function saveDosen(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|numeric|unique:dosens',
            'kelas_id' => 'required|exists:kelas,id',
            'kode_dosen' => 'required',
        ]);
        $user = User::create([
            'username' => $request->nip,
            'email' => $request->nip . '@example.com',
            'password' => bcrypt('password'),
            'role' => 'dosen',
        ]);

        Dosen::create(array_merge($request->all(), [
            'user_id' => $user->id,
        ]));

        return redirect()->route('kaprodi.dashboard')->with('success', 'Dosen berhasil ditambahkan.');
    }

    // Menampilkan form untuk edit dosen
    public function editDosen(Dosen $dosen)
    {
        $users = User::all();
        $kelas = Kelas::all();
        return view('kaprodi.dosens.edit', compact('dosen', 'users', 'kelas',));
    }

    // Memperbarui data dosen
    public function updateDosen(Request $request, Dosen $dosen)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|numeric|unique:dosens,nip,' . $dosen->id,
        ]);

        $dosen->update($request->all());

        return redirect()->route('kaprodi.dashboard')->with('success', 'Data dosen berhasil diperbarui.');
    }

    // Menghapus dosen
    public function destroyDosen(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('kaprodi.dashboard')->with('success', 'Dosen berhasil dihapus.');
    }

    public function showkelas($kelas_id)
    {
        $kelas = Kelas::with('dosens', 'mahasiswas')->findOrFail($kelas_id);

        $assignedMahasiswaIds = $kelas->mahasiswas->pluck('id')->toArray();
        $assignedDosenIds = $kelas->dosens->pluck('id')->toArray();
        $availableMahasiswas = Mahasiswa::whereNotIn('id', $assignedMahasiswaIds)->get();
        $availableDosens = Dosen::whereNotIn('id', $assignedDosenIds)->get();
        return view('kaprodi.kelas.read', compact('kelas', 'availableMahasiswas', 'availableDosens'));
    }


    public function createKelas()
    {
        return view('kaprodi.kelas.create');
    }

    public function saveKelas(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'jumlah' => 'required|numeric',
        ]);

        Kelas::create($request->all());

        return redirect()->route('kaprodi.dashboard')->with('success', 'Kelas berhasil ditambahkan.');
    }
    public function editKelas(Kelas $kelas)
    {
        return view('kaprodi.kelas.edit', compact('kelas'));
    }
    public function updateKelas(Request $request, Kelas $kelas)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'jumlah' => 'required|numeric',
        ]);

        $kelas->update($request->all());
        $kelas->updateJumlah();
        return redirect()->route('kaprodi.dashboard')->with('success', 'Data kelas berhasil diperbarui.');
    }
    public function destroyKelas(Kelas $kelas)
    {
        $kelas->delete();
        return redirect()->route('kaprodi.dashboard')->with('success', 'Kelas berhasil dihapus.');
    }

    public function plotMahasiswaKelas(Request $req, $kelas_id)
    {
        $req->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
        ]);
        $mahasiswa = Mahasiswa::findOrFail($req->mahasiswa_id);
        $mahasiswa->kelas_id = $kelas_id;
        $mahasiswa->save();
        $kelas = Kelas::findOrFail($kelas_id);
        $kelas->updateJumlah();

        return redirect()->route('kaprodi.kelas.read', $kelas_id)->with('success', 'Mahasiswa berhasil ditambahkan ke kelas.');
    }
    public function plotDosenKelas(Request $req, $kelas_id)
    {
        $req->validate([
            'dosen_id' => 'required|exists:dosens,id',
        ]);
        $dosen = Dosen::findOrFail($req->dosen_id);
        $dosen->kelas_id = $kelas_id;
        $dosen->save();
        $kelas = Kelas::findOrFail($kelas_id);
        $kelas->updateJumlah();
        return redirect()->route('kaprodi.kelas.read', $kelas_id)->with('success', 'Dosen berhasil ditambahkan ke kelas.');
    }
}
