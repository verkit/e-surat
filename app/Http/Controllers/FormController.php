<?php

namespace App\Http\Controllers;

use App\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Form::all())
                ->addColumn('checkbox', function ($data) {
                    return '<div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input data-checkbox" id="delete' . $data->id . '"name="delete[]" value="' . $data->id . '" data-id="' . $data->id . '">
                        <label for="delete' . $data->id . '" class="custom-control-label">&nbsp;</label>
                    </div>';
                })
                ->addColumn('action', function ($data) {
                    return '<a name="detail" target="_blank" href="/form/' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>';
                })
                ->addColumn('is_displayed', function ($data) {
                    if ($data->is_displayed == 1) {
                        return 'Iya';
                    } else {
                        return 'Tidak';
                    }
                })
                ->rawColumns(['checkbox', 'action', 'is_displayed'])
                ->make(true);
        }
        return view('dashboard.forms.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.forms.create');
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
            'form_name' => 'required|max:255|string',
            'form_code' =>  'required|max:255|string',
            'is_displayed' => 'required'
        ]);

        Form::create([
            'form_name' => $request->form_name,
            'form_code' => $request->form_code,
            'is_displayed' => $request->is_displayed,
        ]);

        return redirect()->route('form')->with('success', 'Berhasil menambahkan form');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Form::find($id);
        return view('dashboard.forms.edit', compact('data'));
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
            'form_name' => 'required|max:255|string',
            'form_code' =>  'required|max:255|string',
            'is_displayed' => 'required'
        ]);

        Form::where('id', $id)->update([
            'form_name' => $request->form_name,
            'form_code' => $request->form_code,
            'is_displayed' => $request->is_displayed,
        ]);

        return redirect()->route('form')->with('success', 'Berhasil memperbarui data form');
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
        $data  = Form::whereIn('id', $multipleId);
        $data->delete();
    }
}
