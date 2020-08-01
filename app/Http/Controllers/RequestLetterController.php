<?php

namespace App\Http\Controllers;

use App\Letter;
use App\RequestForm;
use App\RequestLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Novay\WordTemplate\WordTemplate;
use Novay\WordTemplate\WordTemplateServiceProvider;

class RequestLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = RequestLetter::join('letters', 'request_letters.letter_id', '=', 'letters.id')
            ->join('users', 'request_letters.user_id', '=', 'users.id')
            ->join('villagers', 'users.id', '=', 'villagers.user_id')
            ->select('request_letters.*', 'users.name', 'letters.letter_name', 'villagers.nik')
            ->where('request_letters.is_done', '0')
            ->orderBy('request_letters.created_at', 'desc')
            ->get();

        if (request()->ajax()) {
            return datatables()->of($request)
                ->addColumn('checkbox', function ($data) {
                    return '<div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input data-checkbox" id="delete' . $data->id . '"name="delete[]" value="' . $data->id . '" data-id="' . $data->id . '">
                        <label for="delete' . $data->id . '" class="custom-control-label">&nbsp;</label>
                    </div>';
                })
                ->addColumn('account', function ($data) {
                    return '<a name="detail" target="_blank" href="/akun/' . $data->user_id . '">'.$data->name.'</a>';
                })
                ->addColumn('date', function ($data) {
                    return $data->created_at->format('Y M d, H:i');
                })
                ->addColumn('action', function ($data) {
                    return '<a name="detail" target="_blank" href="/permohonan-surat/' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>';
                })
                ->rawColumns(['checkbox', 'action', 'date', 'account'])
                ->make(true);
        }
        return view('dashboard.letter_requests.index');
    }

    public function success()
    {
        $request = RequestLetter::join('letters', 'request_letters.letter_id', '=', 'letters.id')
            ->join('users', 'request_letters.user_id', '=', 'users.id')
            ->join('villagers', 'users.id', '=', 'villagers.user_id')
            ->select('request_letters.*', 'users.name', 'letters.letter_name', 'villagers.nik')
            ->where('request_letters.is_done', '1')
            ->orderBy('request_letters.created_at', 'desc')
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
                    return $data->created_at->format('d M Y');
                })
                ->addColumn('action', function ($data) {
                    return '<a name="detail" target="_blank" href="/permohonan-surat/' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>';
                })
                ->rawColumns(['checkbox', 'action', 'date'])
                ->make(true);
        }
        return view('dashboard.letter_requests.success');
    }

    public function show()
    {
        return view('dashboard.letter_requests.detail');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = RequestLetter::find($id);
        $form = RequestForm::where('req_letter_id', $data->id)->get();
        return view('dashboard.letter_requests.edit', compact('data', 'form'));
    }

    public function print($id)
    {
        $data = RequestLetter::find($id);
        $form_letters = RequestForm::where('req_letter_id', $data->id)->get();

        $file_format = public_path(Storage::url($data->letter->letter_format));
        $file_name =  $data->letter->letter_name . '-' . $data->user->name . '.doc';
        $forms = [];
        foreach ($form_letters as $key => $value) {
            $forms[$value->form->form_code] = $value->text;
        }

        $data->is_done = 1;
        $data->save();

        $wordtemplate = new WordTemplate;
        return $wordtemplate->export($file_format, $forms, $file_name);
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
        foreach ($request->form_id as $key => $value) {
            RequestForm::where('id', $value)->update([
                'text' => $request->form_name[$key]
            ]);
        }

        return back()->with('success', 'Berhasil memperbarui isi surat');
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
        $data  = RequestLetter::whereIn('id', $multipleId);
        $data->delete();
    }

    public function testview()
    {
        $surat = Letter::find(18);
        return \view('test', \compact('surat'));
    }

    public function testpost(Request $request)
    {
        $surat = RequestLetter::create([
            'letter_id' => $request->surat_id,
            'user_id' => 2,
            'is_done' => 0
        ]);

        foreach ($request->form_id as $key => $value) {
            RequestForm::create([
                'form_id' => $value,
                'req_letter_id' => $surat->id,
                'text' => $request->form_name[$key]
            ]);
        }
    }
}
