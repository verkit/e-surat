<?php

use App\Letter;
use Illuminate\Database\Seeder;

class LetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $letters = [
            'Surat Keterangan Domisili Baru',
            'Surat Keterangan Kelahiran',
            'Surat Keterangan Kematian',
            'Surat Pengantar SKCK',
            'Surat Keterangan Tidak Mampu (Umum)',
            'Surat Keterangan Tidak Mampu (Rumah Sakit)',
            'Surat Keterangan Tidak Mampu (Sekolah)',
            'Surat Keterangan Belum Pernah Menikah',
            'Surat Keterangan Izin Keramaian',
            'Surat Keterangan Kehilangan',
            'Surat Keterangan Beda Nama',
            'Surat Keterangan Perubahan RT RW',
            'Surat Keterangan Umum',
            'Surat Keterangan BBM',
            'Surat Keterangan Domisili',
            'Surat Keterangan Jalan',
            'Surat Keterangan Pergi',
            'Surat Keterangan Usaha'
        ];

        $descriptions = [
            'Surat Keterangan Domisili Baru',
            'Surat Keterangan Kelahiran',
            'Surat Keterangan Kematian',
            'Surat Pengantar SKCK',
            'Surat Keterangan Tidak Mampu untuk umum',
            'Surat Keterangan Tidak Mampu untuk Rumah Sakit',
            'Surat Keterangan Tidak Mampu untuk Sekolah',
            'Surat Keterangan Belum Pernah Menikah',
            'Surat Keterangan Izin Keramaian',
            'Surat Keterangan Kehilangan',
            'Surat Keterangan Beda Nama',
            'Surat Keterangan Perubahan RT RW',
            'Surat Keterangan Umum',
            'Surat Keterangan BBM',
            'Surat Keterangan Domisili',
            'Surat Keterangan Jalan',
            'Surat Keterangan Pergi',
            'Surat Keterangan Usaha'
        ];

        $formats =[
            'public/format-surat/KET. DOMISILI BARU.rtf',
            'public/format-surat/KET.KELAHIRAN.rtf',
            'public/format-surat/KET.KEMATIAN.rtf',
            'public/format-surat/SKCK.rtf',
            'public/format-surat/SKTM UMUM.rtf',
            'public/format-surat/SKTM UNTUK RUMAH SAKIT.rtf',
            'public/format-surat/SKTM UNTUK SEKOLAH.rtf',
            'public/format-surat/SURAT BELUM PERNAH NIKAH.rtf',
            'public/format-surat/SURAT IZIN KERAMAIAN.rtf',
            'public/format-surat/SURAT KEHILANGAN.rtf',
            'public/format-surat/SURAT KET.BEDA NAMA.rtf',
            'public/format-surat/SURAT KET. PERUBAHAN RT RW.rtf',
            'public/format-surat/SURAT KETERANGAN.rtf',
            'public/format-surat/SURAT KETERANGAN BBM.rtf',
            'public/format-surat/SURAT KETERANGAN DOMISILI.rtf',
            'public/format-surat/SURAT KETERANGAN  JALAN.rtf',
            'public/format-surat/SURAT KETERANGAN PERGI.rtf',
            'public/format-surat/SURAT KETERANGAN USAHA.rtf'
        ];

        $form_ids = [
            [1,3,4,11,13,14,45,46,47,48,49,50],
            [1,2,3,4,11,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,45,46,47,48,49],
            [1,2,3,4,6,11,12,31,45,46,47,48,49],
            [1,2,3,4,5,6,8,9,10,11,34,35,36,45,46,47,48,49],
            [1,2,3,4,5,6,8,10,11,12,13,45,46,47,48,49],
            [1,2,3,4,5,6,8,10,11,12,13,45,46,47,48,49],
            [1,2,3,4,11,12,13,32,33,45,46,47,48,49],
            [1,2,3,4,5,6,8,9,10,11,12,45,46,47,48,49],
            [1,5,11,37,51,38,39,40,45,46,47,48,49],
            [1,2,3,4,5,6,10,11,12,45,46,47,48,49],
            [1,2,3,4,5,6,10,11,12,45,46,47,48,49],
            [1,2,3,4,5,6,10,11,12,13,45,46,47,48,49],
            [1,2,3,4,5,6,8,10,11,12,13,45,46,47,48,49],
            [1,2,3,4,5,6,10,11,13,45,46,47,48,49],
            [1,2,3,4,5,6,10,11,12,45,46,47,48,49],
            [1,2,3,4,5,6,8,10,11,12,13,45,46,47,48,49],
            [1,2,3,4,5,6,7,8,11,42,13,41,12,45,46,47,48,49],
            [1,2,3,4,6,10,11,43,44,45,46,47,48,49],
        ];

        foreach ($letters as $key => $value) {
            $letter = Letter::create([
                'letter_name' => $value,
                'letter_description' => $descriptions[$key],
                'letter_format' => $formats[$key],
                'is_displayed' => 1,
            ]);
            $letter->forms()->attach($form_ids[$key]);
        }
    }
}
