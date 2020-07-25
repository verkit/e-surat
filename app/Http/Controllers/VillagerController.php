<?php

namespace App\Http\Controllers;

use App\Gender;
use App\MaritalStatus;
use App\User;
use App\Villager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VillagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(User::where('role', '!=', 'admin')->get())
                ->addColumn('checkbox', function ($data) {
                    return '<div class="custom-checkbox custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input user-checkbox" id="delete' . $data->id . '"name="delete[]" value="' . $data->id . '" data-id="' . $data->id . '">
                            <label for="delete' . $data->id . '" class="custom-control-label">&nbsp;</label>
                        </div>';
                })
                ->addColumn('action', function ($data) {
                    return '<a name="detail" target="_blank" href="/akun/' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>';
                })
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }

        return view('dashboard.accounts.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genders = Gender::all();
        $marital_statuses = MaritalStatus::all();
        $user = User::find($id);
        return view('dashboard.accounts.edit', compact('user', 'genders', 'marital_statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'max:255',
            'address' => 'max:255',
            'profession' => 'max:255',
            'religion' => 'max:255',
            'birthplace' => 'max:255',
            'birthdate' => 'date',
            'email' => 'email',
            'phone' => 'min:11,max:13',
            'nik' => 'size:16',
            'ktp' => 'file|mimes:png,jpg,jpeg,pdf|max:2048',
            'kk' => 'file|mimes:png,jpg,jpeg,pdf|max:2048'
        ]);

        $user = User::find($id);
        $villager = Villager::where('user_id', $id)->first();

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
        $villager->religion = $request->religion;
        $villager->last_education = $request->last_education;

        if ($request->file('ktp')) {
            if ($villager->ktp) {
                Storage::delete($villager->ktp);
            }
            $villager->ktp = $request->file('ktp')->storeAs('/public/ktp', 'ktp-'.$villager->nik.'.'.$request->ktp->extension());
        }

        if ($request->file('kk')) {
            if ($villager->kk) {
                Storage::delete($villager->kk);
            }
            $villager->kk = $request->file('kk')->storeAs('/public/kk', 'kk-'.$villager->nik.'.'.$request->kk->extension());
        }

        $villager->save();

        return back()->with('success', 'Berhasil memperbarui profil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $multipleId = $request->id;
        $users  = User::whereIn('id', $multipleId);
        $villagers = Villager::whereIn('user_id', $multipleId)->get();

        foreach ($villagers as $value) {
            if ($value->kk) {
                Storage::delete($value->kk);
            }
            if ($value->ktp) {
                Storage::delete($value->ktp);
            }
        }

        $users->delete();
    }
}
