<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FamilyCard;
use App\MemberFamilyCard;
use App\VillageAdministrator;
use Barryvdh\DomPDF\Facade as PDF;

class FamilyCardController extends Controller
{
    public function index()
    {
        $request = FamilyCard::join('users', 'family_cards.user_id', '=', 'users.id')
            ->select('family_cards.*', 'users.name')
            ->orderBy('family_cards.created_at', 'desc')
            ->get();

        if (request()->ajax()) {
            return datatables()->of($request)
                ->addColumn('checkbox', function ($data) {
                    return '<div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input data-checkbox" id="delete' . $data->id . '"name="delete[]" value="' . $data->id . '" data-id="' . $data->id . '">
                        <label for="delete' . $data->id . '" class="custom-control-label">&nbsp;</label>
                    </div>';
                })
                ->addColumn('date', function ($data) {
                    return $data->created_at->format('Y M d, H:i');
                })
                ->addColumn('action', function ($data) {
                    return '<a name="detail" target="_blank" href="/blangko-kk/' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>';
                })
                ->addColumn('name', function ($data) {
                    if ($data->is_done == 0) {
                        return '<b>' . $data->head_of_family . '</b>';
                    } else {
                        return $data->head_of_family;
                    }
                })
                ->rawColumns(['checkbox', 'action', 'date', 'name'])
                ->make(true);
        }
        return view('dashboard.family_cards.index');
    }

    // public function index_separate()
    // {
    //     $request = FamilyCard::join('users', 'family_cards.user_id', '=', 'users.id')
    //         ->select('family_cards.*', 'users.name')
    //         ->where('family_cards.is_separate', 1)
    //         ->orderBy('family_cards.created_at', 'desc')
    //         ->get();

    //     if (request()->ajax()) {
    //         return datatables()->of($request)
    //             ->addColumn('checkbox', function ($data) {
    //                 return '<div class="custom-checkbox custom-control">
    //                     <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input data-checkbox" id="delete' . $data->id . '"name="delete[]" value="' . $data->id . '" data-id="' . $data->id . '">
    //                     <label for="delete' . $data->id . '" class="custom-control-label">&nbsp;</label>
    //                 </div>';
    //             })
    //             ->addColumn('date', function ($data) {
    //                 return $data->created_at->format('Y M d, H:i');
    //             })
    //             ->addColumn('action', function ($data) {
    //                 return '<a name="detail" target="_blank" href="/blangko-kk/' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>';
    //             })
    //             ->addColumn('name', function ($data) {
    //                 if ($data->is_done == 0) {
    //                     return '<b>' . $data->head_of_family . '</b>';
    //                 } else {
    //                     return $data->head_of_family;
    //                 }
    //             })
    //             ->rawColumns(['checkbox', 'action', 'date', 'name'])
    //             ->make(true);
    //     }
    //     return view('dashboard.family_cards.separate');
    // }

    public function edit($id)
    {
        $data = FamilyCard::find($id);
        $members = MemberFamilyCard::where('family_card_id', $id)->get();
        $administrators = VillageAdministrator::all();
        return view('dashboard.family_cards.edit', compact('data', 'members', 'administrators'));
    }

    public function print($id)
    {
        $data = FamilyCard::find($id);
        $data->is_done = 1;
        $data->save();
        $members = MemberFamilyCard::where('family_card_id', $id)->get();
        $pdf = PDF::setPaper('folio', 'landscape')->loadview('dashboard.family_cards.print', compact('data', 'members'));
        return $pdf->stream('test');
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'number' => 'required|string|max:255',
                'head_of_family' => 'required|string|max:255',
                'village' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'district' => 'required|string|max:255',
                'rt_rw' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'postal_code' => 'required|string|max:255',
                'province' => 'required|string|max:255',
                'signature' => 'required|numeric|max:255',
            ],
            [
                'signature.numeric' => 'Masukkan penandatangan'
            ]
        );

        FamilyCard::where('id', $id)->update([
            'number' => $request->number,
            'head_of_family' => $request->head_of_family,
            'village' => $request->village,
            'address' => $request->address,
            'district' => $request->district,
            'rt_rw' => $request->rt_rw,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'province' => $request->province,
            'signature_id' => $request->signature
        ]);

        return back()->with('success', 'Berhasil memperbarui data blangko kk');
    }

    public function destroy(Request $request)
    {
        $multipleId = $request->id;
        $data  = FamilyCard::whereIn('id', $multipleId);
        $data->delete();
    }
}
