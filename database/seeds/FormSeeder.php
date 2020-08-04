<?php

use App\Form;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $forms = [
            'nama',
            'jenis kelamin',
            'tempat lahir',
            'tanggal lahir',
            'pekerjaan',
            'agama',
            'kewarganegaraan',
            'nik',
            'pendidikan terakhir',
            'status perkawinan',
            'alamat',
            'keterangan',
            'keperluan',
            'alamat domisili',
            'nama ibu',
            'tempat lahir ibu',
            'tanggal lahir ibu',
            'umur ibu',
            'agama ibu',
            'nik ibu',
            'pekerjaan ibu',
            'alamat ibu',
            'nama ayah',
            'tempat lahir ayah',
            'tanggal lahir ayah',
            'umur ayah',
            'agama ayah',
            'nik ayah',
            'pekerjaan ayah',
            'alamat ayah',
            'tahun kematian',
            'sekolah',
            'kelas',
            'adat istiadat',
            'tujuan',
            'surat berlaku',
            'umur',
            'sifat surat',
            'lampiran',
            'perihal',
            'jangka waktu',
            'alamat tujuan',
            'bidang usaha',
            'nama usaha',
            'nomor surat',
            'nama desa',
            'tanggal',
            'jabatan',
            'nama pejabat',
            'alamat pejabat',
            'acara',
            'tanggal pelaksanaan'
        ];

        $form_codes = [
            ['[NAMA]', 0, 0],
            ['[JENIS_KELAMIN]', 0, 0],
            ['[TEMPAT_LAHIR]', 0, 0],
            ['[TANGGAL_LAHIR]', 1, 0],
            ['[PEKERJAAN]', 0, 0],
            ['[AGAMA]', 0, 0],
            ['[KEWARGANEGARAAN]', 0, 0],
            ['[NIK]', 0, 0],
            ['[PENDIDIKAN_TERAKHIR]', 0, 0],
            ['[STATUS_PERKAWINAN]', 0, 0],
            ['[ALAMAT]', 0, 0],
            ['[KETERANGAN]', 0, 0],
            ['[KEPERLUAN]', 0, 0],
            ['[ALAMAT_DOMISILI]', 0, 0],
            ['[NAMA_IBU]', 0, 0],
            ['[TEMPAT_LAHIR_IBU]', 0, 0],
            ['[TANGGAL_LAHIR_IBU]', 1, 0],
            ['[UMUR_IBU]', 0, 0],
            ['[AGAMA_IBU]', 0, 0],
            ['[NIK_IBU]', 0, 0],
            ['[PEKERJAAN_IBU]', 0, 0],
            ['[ALAMAT_IBU]', 0, 0],
            ['[NAMA_AYAH]', 0, 0],
            ['[TEMPAT_LAHIR_AYAH]', 0, 0],
            ['[TANGGAL_LAHIR_AYAH]', 1, 0],
            ['[UMUR_AYAH]', 0, 0],
            ['[AGAMA_AYAH]', 0, 0],
            ['[NIK_AYAH]', 0, 0],
            ['[PEKERJAAN_AYAH]', 0, 0],
            ['[ALAMAT_AYAH]', 0, 0],
            ['[TAHUN_KEMATIAN]', 0, 0],
            ['[SEKOLAH]', 0, 0],
            ['[KELAS]', 0, 0],
            ['[ADAT_ISTIADAT]', 0, 0],
            ['[TUJUAN]', 0, 0],
            ['[SURAT_BERLAKU]', 0, 1],
            ['[UMUR]', 0, 0],
            ['[SIFAT_SURAT]', 0, 1],
            ['[LAMPIRAN]', 0, 1],
            ['[PERIHAL]', 0, 1],
            ['[JANGKA_WAKTU]', 0, 0],
            ['[ALAMAT_TUJUAN]', 0, 0],
            ['[BIDANG_USAHA]', 0, 0],
            ['[NAMA_USAHA]', 0, 0],
            ['[NOMOR_SURAT]', 0, 1],
            ['[NAMA_DESA]', 0, 1],
            ['[TANGGAL]', 0, 1],
            ['[JABATAN]', 0, 1],
            ['[NAMA_PEJABAT]', 0, 1],
            ['[ALAMAT_PEJABAT]', 0, 1],
            ['[ACARA]', 0, 0],
            ['[TANGGAL_PELAKSANAAN]', 0, 0]
        ];

        foreach ($forms as $key => $value) {
            Form::create([
                'form_name' => $value,
                'form_code' => $form_codes[$key][0],
                'is_date' => $form_codes[$key][1],
                'is_displayed' => $form_codes[$key][2]
            ]);
        }
    }
}
