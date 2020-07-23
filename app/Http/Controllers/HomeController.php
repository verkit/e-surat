<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('dashboard.index');
    }

    public function profil()
    {
        $akun = Auth::user();
        return view('dashboard.profile.index', compact('akun'));
    }

    public function update_profile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $akun = Auth::user();
        $akun->name = $request->name;
        $akun->email = $request->email;

        if ($request->password) {
            $request->validate([
                'password' => 'min:8'
            ]);

            $akun->password = bcrypt($request->password);
        }
        $akun->save();

        return back()->with('success', 'Berhasil memperbarui profil');
    }
}
