<?php

namespace App\Http\Controllers;

use App\VillageAdministrator;
use Illuminate\Http\Request;

class VillageAdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(VillageAdministrator::all())
                ->addColumn('checkbox', function ($data) {
                    return '<div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input data-checkbox" id="delete' . $data->id . '"name="delete[]" value="' . $data->id . '" data-id="' . $data->id . '">
                        <label for="delete' . $data->id . '" class="custom-control-label">&nbsp;</label>
                    </div>';
                })
                ->addColumn('action', function ($data) {
                    return '<a name="detail" target="_blank" href="/perangkat-desa/' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>';
                })
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }
        return view('dashboard.administrators.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.administrators.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'position' =>  'required|max:255|string',
            'address' => 'required|max:255|string'
        ]);

        VillageAdministrator::create([
            'name' => $request->name,
            'position' => $request->position,
            'address' => $request->address
        ]);

        return redirect()->route('perangkat-desa')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = VillageAdministrator::find($id);
        return view('dashboard.administrators.edit', compact('data'));
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
            'name' => 'required|max:255|string',
            'position' =>  'required|max:255|string',
            'address' => 'required|max:255|string'
        ]);

        VillageAdministrator::where('id', $id)->update([
            'name' => $request->name,
            'position' => $request->position,
            'address' => $request->address
        ]);

        return redirect()->route('perangkat-desa')->with('success', 'Berhasil merubah data');
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
        $data  = VillageAdministrator::whereIn('id', $multipleId);
        $data->delete();
    }
}
