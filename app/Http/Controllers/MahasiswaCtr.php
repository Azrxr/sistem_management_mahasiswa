<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\RequestMahasiswa;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class MahasiswaCtr extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $mahasiswa = Mahasiswa::where('user_id', Auth::id())->first();
        $user = Auth::user();
        return view('mahasiswa.dashboard', compact('user' , 'mahasiswa'));
    }
    public function profile()
    {
        $mahasiswa = Mahasiswa::where('user_id', Auth::id())->first();
        $user = Auth::user();
        return view('mahasiswa.profile', compact('user' , 'mahasiswa'));
    }
    public function request()
    {
        $mahasiswa = Mahasiswa::where('user_id', Auth::id())->first();
        $user = Auth::user();
        return view('mahasiswa.profile', compact('user' , 'mahasiswa'));
    }
    public function submitRequest(Request $request)
    {
        $mahasiswa = Mahasiswa::where('user_id', Auth::id())->first();
        $request->validate([
            'Keterangan' => 'required|string',
        ]);
        RequestMahasiswa::create(array_merge( $request->all(),[ 
            'mahasiswa_id' => $mahasiswa->id ,
            'kelas_id' => $mahasiswa->kelas_id
        ]));

        return redirect()->route('mahasiswa.profile')->with('success', 'Request berhasil dikirim');
    }
}
