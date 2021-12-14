<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use App\Models\Dau;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $biaya = Biaya::get();
        $siswa   = Siswa::get();
        $dau      = Dau::get();
        $user = Auth::user();
        $user_aktif = User::where('level', '1')->get();
        return view('layouts.content', compact('user_aktif', 'biaya', 'siswa', 'dau', 'user'));
    }

    // public function welcome()
    // {
    //     return view('welcome');
    // }
}
