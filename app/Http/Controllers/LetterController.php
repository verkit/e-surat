<?php

namespace App\Http\Controllers;

use App\Form;
use App\Letter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Letter::all())
                ->addColumn('checkbox', function ($data) {
                    return '<div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input data-checkbox" id="delete' . $data->id . '"name="delete[]" value="' . $data->id . '" data-id="' . $data->id . '">
                        <label for="delete' . $data->id . '" class="custom-control-label">&nbsp;</label>
                    </div>';
                })
                ->addColumn('is_displayed', function ($data) {
                    if ($data->is_displayed == 1) {
                        return 'Iya';
                    } else {
                        return 'Tidak';
                    }
                })
                ->addColumn('action', function ($data) {
                    return '<a name="detail" target="_blank" href="/surat/' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>';
                })
                ->rawColumns(['checkbox', 'action', 'is_displayed'])
                ->make(true);
        }
        return view('dashboard.letters.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $forms = Form::all();
        return view('dashboard.letters.create', compact('forms'));
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
            'letter_name' => 'required|max:255|string',
            'letter_description' => 'required|max:255|string',
            'is_displayed' =>  'required|max:255|string',
            'letter_format' => 'required|max:2048|file|mimes:rtf'
        ]);

        $letter = Letter::create([
            'letter_name' => $request->letter_name,
            'letter_description' => $request->letter_description,
            'is_displayed' => $request->is_displayed,
            'letter_format' => $request->file('letter_format')->storeAs('/public/format-surat', $request->letter_name . '.' . $request->letter_format->extension())
        ]);

        $letter->forms()->attach($request->form_letter);
        return redirect()->route('surat')->with('success', 'Berhasil menambahkan surat baru');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Letter::find($id);
        $form_letters = Form::all();
        return view('dashboard.letters.edit', compact('data', 'form_letters'));
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
            'letter_name' => 'required|max:255|string',
            'letter_description' => 'required|max:255|string',
            'is_displayed' =>  'required|max:255|string',
            'letter_format' => 'nullable|max:2048|file|mimes:rtf'
        ]);

        $letter = Letter::find($id);
        $temp_format = '';
        $temp_form_id = [];

        if ($request->letter_name != $letter->letter_name) {
            $new_format = 'public/format-surat/' . $request->letter_name . '.rtf';
            Storage::move($letter->letter_format, $new_format);
            $temp_format = $new_format;
        }

        $letter->letter_name = $request->letter_name;
        $letter->letter_description = $request->letter_description;
        $letter->is_displayed = $request->is_displayed;

        if ($request->file('letter_format')) {
            if ($letter->letter_format) {
                Storage::delete($letter->letter_format);
            }
            $temp_format = $request->file('letter_format')->storeAs('/public/format-surat', $request->letter_name . '.' . $request->letter_format->extension());
            $letter->letter_format = $temp_format;
        }

        foreach ($letter->forms as $value) {
            array_push($temp_form_id, $value->id);
        }

        $letter->save();

        if ($temp_form_id != $request->form_letter) {
            $letter->forms()->detach();
            $letter->forms()->attach($request->form_letter);
        }

        return redirect()->route('surat')->with('success', 'Berhasil memperbarui surat');
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
        $data  = Letter::whereIn('id', $multipleId);
        $data->delete();
    }
}
