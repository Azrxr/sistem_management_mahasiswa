<?php

namespace App\Http\Controllers;


use App\Models\Mahasiswa;
use Illuminate\Http\Request;
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
}
