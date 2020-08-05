<?php

namespace App\Http\Controllers\Client;

use App\Gender;
use App\Http\Controllers\Controller;
use App\MaritalStatus;
use App\Religion;
use App\User;
use App\Villager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());
        $genders = Gender::all();
        $marital_statuses = MaritalStatus::all();
        $religions = Religion::all();
        return view('clients.profile', compact('user', 'genders', 'marital_statuses', 'religions'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'profession' => 'required|max:255',
            'religion' => 'required|max:255',
            'gender' => 'required',
            'marital_status' => 'required',
            'last_education' => 'required',
            'birthplace' => 'required|max:255',
            'birthdate' => 'required|date',
            'email' => 'required|email',
            'hp' => 'required|between:11,13',
            'nik' => 'required|size:16',
            'ktp' => 'file|mimes:png,jpg,jpeg,pdf|max:2048',
            'kk' => 'file|mimes:png,jpg,jpeg,pdf|max:2048'
        ]);

        $user = User::find(Auth::id());
        $villager = Villager::where('user_id', Auth::id())->first();

        if ($request->name || $request->email) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
        }

        $villager->address = $request->address;
        $villager->phone = $request->hp;
        $villager->birthplace = $request->birthplace;
        $villager->birthdate = $request->birthdate;
        $villager->nik = $request->nik;
        $villager->gender_id = $request->gender;
        $villager->marital_status_id = $request->marital_status;
        $villager->profession = $request->profession;
        $villager->religion_id = $request->religion;
        $villager->last_education = $request->last_education;

        if ($request->file('ktp')) {
            if ($villager->ktp) {
                Storage::delete($villager->ktp);
            }
            $villager->ktp = $request->file('ktp')->storeAs('/public/ktp', 'ktp-' . $villager->nik . '.' . $request->ktp->extension());
        }

        if ($request->file('kk')) {
            if ($villager->kk) {
                Storage::delete($villager->kk);
            }
            $villager->kk = $request->file('kk')->storeAs('/public/kk', 'kk-' . $villager->nik . '.' . $request->kk->extension());
        }

        $villager->save();

        return back()->with('success', 'Berhasil memperbarui profil');
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:8',
        ]);

        $user = User::find(auth()->id());
        if (Hash::check($request->password_lama, $user->password)) {
            $user->password = Hash::make($request->input('password_baru'));
            $user->save();
            return redirect()->back()->with('success', 'Password berhasil diperbarui');
        } else {
            return redirect()->back()->with('warning', 'Password lama tidak sesuai');
        }
    }
}
