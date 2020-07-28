<?php

namespace App\Http\Controllers;

use App\BloodType;
use App\Citizenship;
use App\Gender;
use App\KTP;
use App\MaritalStatus;
use App\Religion;
use App\VillageAdministrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Novay\WordTemplate\WordTemplate;

class KTPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = KTP::orderBy('created_at', 'desc');

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
                    return '<a name="detail" target="_blank" href="/blangko-ktp/' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>';
                })
                ->rawColumns(['checkbox', 'action', 'date'])
                ->make(true);
        }

        return view('dashboard.ktp.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = KTP::find($id);
        $genders = Gender::all();
        $marital_statuses = MaritalStatus::all();
        $blood_types = BloodType::all();
        $religions = Religion::all();
        $citizenships = Citizenship::all();
        $administrators = VillageAdministrator::all();
        return view('dashboard.ktp.edit', compact('data', 'genders', 'marital_statuses', 'blood_types', 'religions', 'citizenships', 'administrators'));
    }

    public function print($id)
    {
        $data = KTP::find($id);

        $forms = [];
        $forms['[A1]'] = '-';
        $forms['[A2]'] = '-';
        $forms['[A3]'] = '-';
        $forms['[A4]'] = '-';
        $forms['[A5]'] = '-';
        $forms['[SK1]'] = '-';
        $forms['[SK2]'] = '-';
        $forms['[SK3]'] = '-';
        $forms['[SK4]'] = '-';
        $forms['[WNI]'] = '-';
        $forms['[WNA]'] = '-';
        $forms['[JK1]'] = '-';
        $forms['[JK2]'] = '-';

        if ($data->citizenship_id == 1) {
            $forms['[WNI]'] = 'X';
        } else {
            $forms['[WNA]'] = 'X';
        }

        if ($data->gender_id == 1) {
            $forms['[JK1]'] = 'X';
        }
        if ($data->gender_id == 2) {
            $forms['[JK2]'] = 'X';
        }

        if ($data->religion_id == 1) {
            $forms['[A1]'] = 'X';
        }
        if ($data->religion_id == 2) {
            $forms['[A2]'] = 'X';
        }
        if ($data->religion_id == 3) {
            $forms['[A3]'] = 'X';
        }
        if ($data->religion_id == 4) {
            $forms['[A4]'] = 'X';
        }
        if ($data->religion_id == 5) {
            $forms['[A5]'] = 'X';
        }

        if ($data->marital_status_id == 1) {
            $forms['[SK1]'] = 'X';
        }
        if ($data->marital_status_id == 2) {
            $forms['[SK2]'] = 'X';
        }
        if ($data->marital_status_id == 3) {
            $forms['[SK3]'] = 'X';
        }
        if ($data->marital_status_id == 4) {
            $forms['[SK4]'] = 'X';
        }

        $forms['[NIK]'] = $data->nik;
        $forms['[NAMA]'] = $data->fullname;
        $forms['[GD]'] = $data->blood_type->name;
        $forms['[TANGGAL_LAHIR]'] = $data->birthdate;
        $forms['[BULAN_LAHIR]'] = $data->birthmonth;
        $forms['[TAHUN_LAHIR]'] = $data->birthyear;
        $forms['[TEMPAT_LAHIR]'] = $data->birthplace;
        $forms['[PEKERJAAN]'] = $data->profession;
        $forms['[ALAMAT]'] = $data->address;
        $forms['[RT]'] = $data->rt;
        $forms['[RW]'] = $data->rw;
        $forms['[JABATAN]'] = $data->signature->position;
        $forms['[NAMA_PEJABAT]'] = $data->signature->name;

        $file_format = public_path(Storage::url('format-surat/blangko-ktp.rtf'));
        $file_name =  'Blangko KTP-' . $data->fullname . '.doc';
        $wordtemplate = new WordTemplate;
        return $wordtemplate->export($file_format, $forms, $file_name);
    }

    public function reformat(Request $request)
    {
        $request->validate([
            'ktp' => 'required|file|mimes:rtf|max:1024'
        ]);

        Storage::delete('/public/format-surat/blangko-ktp.rtf');
        $request->file('ktp')->storeAs('/public/format-surat', 'blangko-ktp.rtf');
        return back()->with('success', 'Berhasil mengubah format blangko ktp');
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
        $request->validate(
            [
                'nik' => 'required|string|max:255',
                'fullname' => 'required|string|max:255',
                'birthdate' => 'required|string|max:255',
                'birthmonth' => 'required|string|max:255',
                'birthyear' => 'required|string|max:255',
                'birthplace' => 'required|string|max:255',
                'profession' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'rt' => 'required|string|max:255',
                'rw' => 'required|string|max:255',
                'gender' => 'required|string|max:255',
                'citizenship' => 'required|string|max:255',
                'blood_type' => 'required|string|max:255',
                'marital_status' => 'required|string|max:255',
                'religion' => 'required|string|max:255',
                'signature' => 'required|numeric|max:255',
            ],
            [
                'signature.numeric' => 'Masukkan penandatangan'
            ]
        );

        KTP::where('id', $id)->update([
            'nik' => $request->nik,
            'fullname' => $request->fullname,
            'birthdate' => $request->birthdate,
            'birthmonth' => $request->birthmonth,
            'birthyear' => $request->birthyear,
            'birthplace' => $request->birthplace,
            'profession' => $request->profession,
            'address' => $request->address,
            'rt' => $request->rt,
            'rw' =>  $request->rw,
            'gender_id' =>  $request->gender,
            'citizenship_id' =>  $request->citizenship,
            'blood_type_id' =>  $request->blood_type,
            'marital_status_id' =>  $request->marital_status,
            'religion_id' =>  $request->religion,
            'signature_id' => $request->signature
        ]);

        return back()->with('success', 'Berhasil memperbarui data permohonan ktp');
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
        $data  = KTP::whereIn('id', $multipleId);
        $data->delete();
    }
}
