<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

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
        return view('home');
    }

    public function dashboard(Request $request)
{
    $username = Auth::user()->username;
    $user = User::where('username', $username)->first();

    if ($user !== null) {
        $role = $user->role; // Mengambil nilai role dari objek User

        if ($role === 'Admin') {
            return view('admin.dashboard');
        } elseif ($role === 'Pengurus') {
            return view('pengurus.dashboard');
        } else {
            return view('akuntan.dashboard');
        }
    } else {
        return 'role tidak ditemukan';
    }
}
}
