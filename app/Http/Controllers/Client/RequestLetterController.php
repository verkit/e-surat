<?php

namespace App\Http\Controllers\Client;

use App\BloodType;
use App\Citizenship;
use App\FamilyCard;
use App\Gender;
use App\Http\Controllers\Controller;
use App\KTP;
use App\Letter;
use App\MaritalStatus;
use App\MemberFamilyCard;
use App\Religion;
use App\RequestForm;
use App\RequestLetter;
use App\VillageAdministrator;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestLetterController extends Controller
{
    //UMUM
    public function general()
    {
        $letters = Letter::where('is_displayed', 1)->get();
        return view('clients.general', compact('letters'));
    }

    public function detail_general($id)
    {
        $letter = Letter::find($id);
        return view('clients.general-detail', compact('letter'));
    }

    public function store_general_letter(Request $request, $letter_id)
    {
        $letter = new RequestLetter;
        $letter->letter_id = $letter_id;
        $letter->is_done = 0;
        if (Auth::check()) {
            $letter->user_id = Auth::user()->id;
        }
        $letter->save();

        $ketua = VillageAdministrator::where('position', 'Kepala Desa')->first();
        foreach ($request->form_id as $key => $value) {
            $text = $request->form_name[$key];
            if ($value == 46) {
                $text = "Simbatan";
            } elseif ($value == 47) {
                $text = $letter->created_at->isoFormat('d MMMM Y');
            } elseif ($value == 48) {
                $text = $ketua->position;
            } elseif ($value == 49) {
                $text = $ketua->name;
            } elseif ($value == 50) {
                $text = $ketua->address;
            }

            RequestForm::create([
                'form_id' => $value,
                'req_letter_id' => $letter->id,
                'text' => $text
            ]);
        }

        return redirect()->route('surat.saya.umum', $letter->id)->with('success', 'Anda berhasil melakukan pengajuan, berikut reviewnya');
    }

    public function delete_general_letter($id){
        RequestLetter::destroy($id);
        return redirect()->route('surat.saya')->with('success', 'Berhasil menghapus permohonan surat');
    }

    //KTP
    public function ktp()
    {
        $genders = Gender::all();
        $marital_statuses = MaritalStatus::all();
        $blood_types = BloodType::all();
        $religions = Religion::all();
        $citizenships = Citizenship::all();
        return view('clients.ktp.index', compact('genders', 'marital_statuses', 'blood_types', 'religions', 'citizenships'));
    }

    public function store_ktp(Request $request)
    {

        $request->validate(
            [
                'nik' => 'string|max:255',
                'nama' => 'string|max:255',
                'tanggal_lahir' => 'string|max:255',
                'tempat_lahir' => 'string|max:255',
                'profesi' => 'string|max:255',
                'alamat' => 'string|max:255',
                'rt' => 'string|max:255',
                'rw' => 'string|max:255',
                'jenis_kelamin' => 'string|max:255',
                'kewarganegaraan' => 'string|max:255',
                'golongan_darah' => 'string|max:255',
                'status_perkawinan' => 'string|max:255',
                'agama' => 'string|max:255',
            ],
        );

        $birthdate = DateTime::createFromFormat("Y-m-d", $request->tanggal_lahir);
        $date = $birthdate->format("d");
        $month = $birthdate->format("m");
        $year = $birthdate->format("Y");

        KTP::create([
            'nik' => $request->nik,
            'fullname' => $request->nama,
            'birthdate' => $date,
            'birthmonth' => $month,
            'birthyear' => $year,
            'birthplace' => $request->tempat_lahir,
            'profession' => $request->profesi,
            'address' => $request->alamat,
            'rt' => $request->rt,
            'rw' =>  $request->rw,
            'gender_id' =>  $request->jenis_kelamin,
            'citizenship_id' =>  $request->kewarganegaraan,
            'blood_type_id' =>  $request->golongan_darah,
            'marital_status_id' =>  $request->status_perkawinan,
            'religion_id' =>  $request->agama,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('surat.saya')->with('success', 'Berhasil melakukan permohonan pengajuan ktp');
    }

    public function delete_ktp($id){
        KTP::destroy($id);
        return redirect()->route('surat.saya')->with('success', 'Berhasil menghapus permohonan KTP');
    }

    //KK
    public function kk()
    {
        return view('clients.kk.index');
    }

    public function kk_baru()
    {
        return view('clients.kk.baru');
    }

    public function kk_pisah()
    {
        return view('clients.kk.pisah');
    }

    public function store_kk(Request $request)
    {
        $request->validate(
            [
                'no_kk' => 'required|string|max:255',
                'kepala_keluarga' => 'required|string|max:255',
                'desa_kelurahan' => 'required|string|max:255',
                'alamat' => 'required|string|max:255',
                'kecamatan' => 'required|string|max:255',
                'rt_rw' => 'required|string|max:255',
                'kabupaten_kota' => 'required|string|max:255',
                'kode_pos' => 'required|string|max:255',
                'provinsi' => 'required|string|max:255',
            ]
        );

        $kk = new FamilyCard;
        $kk->number = $request->no_kk;
        $kk->head_of_family = $request->kepala_keluarga;
        $kk->village = $request->desa_kelurahan;
        $kk->address = $request->alamat;
        $kk->district = $request->kecamatan;
        $kk->rt_rw = $request->rt_rw;
        $kk->city = $request->kabupaten_kota;
        $kk->postal_code = $request->kode_pos;
        $kk->province = $request->provinsi;
        $kk->user_id = auth()->id();
        $kk->is_new = $request->is_new;
        $kk->is_separate = $request->is_separate;
        $kk->save();

        return redirect()->route('buat.anggota.kk', $kk->id)->with('success', 'Silahkan tambahkan anggota keluarga');
    }

    public function kk_anggota($id)
    {
        $kk = FamilyCard::find($id);
        if ($kk->user_id != auth()->id()) {
            return redirect('/');
        }
        $genders = Gender::all();
        $marital_statuses = MaritalStatus::all();
        $blood_types = BloodType::all();
        $religions = Religion::all();
        $citizenships = Citizenship::all();
        return view('clients.kk.anggota', compact('kk', 'genders', 'marital_statuses', 'blood_types', 'religions', 'citizenships'));
    }

    public function store_anggota_kk(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|string|max:255',
            'agama' => 'required|string|max:255',
            'pendidikan' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'golongan_darah' => 'required|string|max:255',
            'status_perkawinan' => 'required|string|max:255',
            'tanggal_pernikahan' => 'nullable|string|max:255',
            'status_hubungan' => 'required|string|max:255',
            'kewarganegaraan' => 'required|string|max:255',
            'passport' => 'nullable|string|max:255',
            'kitap' => 'nullable|string|max:255',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
        ]);

        $anggota = new MemberFamilyCard;
        $anggota->fullname = $request->nama_lengkap;
        $anggota->nik = $request->nik;
        $anggota->gender_id = $request->jenis_kelamin;
        $anggota->birthplace = $request->tempat_lahir;
        $anggota->birthdate = $request->tanggal_lahir;
        $anggota->religion_id = $request->agama;
        $anggota->education = $request->pendidikan;
        $anggota->profession = $request->pekerjaan;
        $anggota->blood_type_id = $request->golongan_darah;
        $anggota->marital_status_id = $request->status_perkawinan;
        $anggota->marriage_date = $request->tanggal_pernikahan;
        $anggota->status_in_family = $request->status_hubungan;
        $anggota->citizenship_id = $request->kewarganegaraan;
        $anggota->passport = $request->passport;
        $anggota->kitap = $request->kitap;
        $anggota->father_name = $request->nama_ayah;
        $anggota->mother_name = $request->nama_ibu;
        $anggota->family_card_id = $id;
        $anggota->save();

        return redirect()->route('surat.saya.kk', $id)->with('success', 'Berhasil menambahkan anggota kk');
    }

    public function delete_anggota_kk($id)
    {
        MemberFamilyCard::destroy($id);
        return back()->with('success', 'Berhasil menghapus anggota kk');
    }

    public function detail_anggota_kk($id, $aid)
    {
        $fc = FamilyCard::find($id);
        if ($fc->user_id != auth()->id()) {
            return redirect('/');
        }
        $data = MemberFamilyCard::find($aid);

        $genders = Gender::all();
        $marital_statuses = MaritalStatus::all();
        $blood_types = BloodType::all();
        $religions = Religion::all();
        $citizenships = Citizenship::all();
        return view('clients.myletter.kk-anggota', compact('fc', 'data', 'genders', 'marital_statuses', 'blood_types', 'religions', 'citizenships'));
    }

    public function update_anggota_kk(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|string|max:255',
            'agama' => 'required|string|max:255',
            'pendidikan' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'golongan_darah' => 'required|string|max:255',
            'status_perkawinan' => 'required|string|max:255',
            'tanggal_pernikahan' => 'nullable|string|max:255',
            'status_hubungan' => 'required|string|max:255',
            'kewarganegaraan' => 'required|string|max:255',
            'passport' => 'nullable|string|max:255',
            'kitap' => 'nullable|string|max:255',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
        ]);

        $anggota = MemberFamilyCard::find($id);
        $anggota->fullname = $request->nama_lengkap;
        $anggota->nik = $request->nik;
        $anggota->gender_id = $request->jenis_kelamin;
        $anggota->birthplace = $request->tempat_lahir;
        $anggota->birthdate = $request->tanggal_lahir;
        $anggota->religion_id = $request->agama;
        $anggota->education = $request->pendidikan;
        $anggota->profession = $request->pekerjaan;
        $anggota->blood_type_id = $request->golongan_darah;
        $anggota->marital_status_id = $request->status_perkawinan;
        $anggota->marriage_date = $request->tanggal_pernikahan;
        $anggota->status_in_family = $request->status_hubungan;
        $anggota->citizenship_id = $request->kewarganegaraan;
        $anggota->passport = $request->passport;
        $anggota->kitap = $request->kitap;
        $anggota->father_name = $request->nama_ayah;
        $anggota->mother_name = $request->nama_ibu;
        $anggota->family_card_id = $id;
        $anggota->save();

        return back()->with('success', 'Berhasil memperbarui anggota kk');
    }

    public function delete_kk($id){
        FamilyCard::destroy($id);
        return redirect()->route('surat.saya')->with('success', 'Berhasil menghapus permohonan KK');
    }

    //RIWAYAT
    public function myrequest()
    {
        $letters = RequestLetter::where('user_id', auth()->id())->orderBy('created_at', 'desc')->take(10)->get();
        $ktp = KTP::where('user_id', auth()->id())->orderBy('created_at', 'desc')->take(10)->get();
        $kk = FamilyCard::where('user_id', auth()->id())->orderBy('created_at', 'desc')->take(10)->get();
        return view('clients.myletter.index', compact('letters', 'ktp', 'kk'));
    }

    public function detail_myrequest($id)
    {
        $data = RequestLetter::find($id);
        if ($data->user_id != auth()->id()) {
            return redirect('/');
        }
        $forms = RequestForm::where('req_letter_id', $data->id)->get();
        return view('clients.general-detail-review', compact('data', 'forms'));
    }

    public function detail_myrequest_ktp($id)
    {
        $data = KTP::find($id);
        if ($data->user_id != auth()->id()) {
            return redirect('/');
        }
        $genders = Gender::all();
        $marital_statuses = MaritalStatus::all();
        $blood_types = BloodType::all();
        $religions = Religion::all();
        $citizenships = Citizenship::all();
        return view('clients.myletter.ktp', compact('data', 'genders', 'marital_statuses', 'blood_types', 'religions', 'citizenships'));
    }

    public function detail_myrequest_kk($id)
    {
        $data = FamilyCard::find($id);
        $members = MemberFamilyCard::where('family_card_id', $id)->get();
        return view('clients.myletter.kk', compact('data', 'members'));
    }

    public function update_myrequest_kk(Request $request, $id)
    {
        $request->validate(
            [
                'no_kk' => 'required|string|max:255',
                'kepala_keluarga' => 'required|string|max:255',
                'desa_kelurahan' => 'required|string|max:255',
                'alamat' => 'required|string|max:255',
                'kecamatan' => 'required|string|max:255',
                'rt_rw' => 'required|string|max:255',
                'kabupaten_kota' => 'required|string|max:255',
                'kode_pos' => 'required|string|max:255',
                'provinsi' => 'required|string|max:255',
            ]
        );

        $kk = FamilyCard::find($id);
        $kk->number = $request->no_kk;
        $kk->head_of_family = $request->kepala_keluarga;
        $kk->village = $request->desa_kelurahan;
        $kk->address = $request->alamat;
        $kk->district = $request->kecamatan;
        $kk->rt_rw = $request->rt_rw;
        $kk->city = $request->kabupaten_kota;
        $kk->postal_code = $request->kode_pos;
        $kk->province = $request->provinsi;
        $kk->save();

        return redirect()->route('surat.saya.kk', $kk->id)->with('success', 'Berhasil memperbarui form kk');
    }
}
