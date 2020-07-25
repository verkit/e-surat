<?php

namespace App\Http\Controllers;

use App\RequestLetter;
use Illuminate\Http\Request;

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
        return view('dashboard.letter_requests.index');
    }

    public function success()
    {
        $request = RequestLetter::join('letters', 'request_letters.letter_id', '=', 'letters.id')
                ->join('users', 'request_letters.user_id', '=', 'users.id')
                ->join('villagers', 'users.id', '=', 'villagers.user_id')
                ->select('request_letters.*', 'users.name', 'letters.letter_name', 'villagers.nik')
                ->where('request_letters.is_done', '0')
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
        return view('dashboard.letter_requests.edit', compact('data'));
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
        //
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
}
