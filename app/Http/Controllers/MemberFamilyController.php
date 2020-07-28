<?php

namespace App\Http\Controllers;

use App\MaritalStatus;
use App\MemberFamilyCard;
use Illuminate\Http\Request;

class MemberFamilyController extends Controller
{
    public function edit($id)
    {
        $data = MemberFamilyCard::find($id);
        $marital_statuses = MaritalStatus::all();
        return view('dashboard.family_cards.members.edit', compact('data', 'marital_statuses'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fullname' => 'string|max:255',
            'nik' => 'string|max:255',
            'gender' => 'string|max:255',
            'birthplace' => 'string|max:255',
            'birthdate' => 'string|max:255',
            'religion' => 'string|max:255',
            'education' => 'string|max:255',
            'profession' => 'string|max:255',
            'blood_type' => 'string|max:255',
            'marital_status' => 'string|max:255',
            'marriage_date' => 'string|max:255',
            'status_in_family' => 'string|max:255',
            'citizenship' => 'string|max:255',
            'passport' => 'string|max:255',
            'kitap' => 'string|max:255',
            'father_name' => 'string|max:255',
            'mother_name' => 'string|max:255',
        ]);

        MemberFamilyCard::where('id', $id)->update([
            'fullname' => $request->fullname,
            'nik' => $request->nik,
            'gender' => $request->gender,
            'birthplace' => $request->birthplace,
            'birthdate' => $request->birthdate,
            'religion' => $request->religion,
            'education' => $request->education,
            'profession' => $request->profession,
            'blood_type' => $request->blood_type,
            'marital_status_id' => $request->marital_status,
            'marriage_date' => $request->marriage_date,
            'status_in_family' => $request->status_in_family,
            'citizenship' => $request->citizenship,
            'passport' => $request->passport,
            'kitap' => $request->kitap,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
        ]);

        $member = MemberFamilyCard::find($id);
        return redirect()->route('edit.kk', $member->family_card_id)->with('success', 'Berhasil memperbarui anggota blanko KK');
    }

    public function destroy($id)
    {
        MemberFamilyCard::destroy($id);
        return back()->with('success', 'Berhasil menghapus anggota dari blangko KK');
    }
}
