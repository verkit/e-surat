<?php

use App\Form;
use App\User;
use App\VillageAdministrator;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@simbatan.desa.id',
            'password' => bcrypt('asdqwe123'),
            'role' => 'admin'
        ]);

        VillageAdministrator::create([
            'name' => 'Dr.M.NUR HIDAYAT CN,S.T.,MMT',
            'position' => 'Kepala Desa Simbatan',
            'address' => 'Desa Simbatan Kec, Nguntoronadi Kab, Magetan'
        ]);

        VillageAdministrator::create([
            'name' => 'FERY GRAHANDA ANUGRA,S.Kom',
            'position' => 'Sekretaris Desa Simbatan',
            'address' => 'Desa Simbatan Kec, Nguntoronadi Kab, Magetan'
        ]);

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
        ];

        $form_codes = [
            '[NAMA]',
            '[JENIS_KELAMIN]',
            '[TEMPAT_LAHIR]',
            '[TANGGAL_LAHIR]',
            '[PEKERJAAN]',
            '[AGAMA]',
            '[KEWARGANEGARAAN]',
            '[NIK]',
            '[PENDIDIKAN_TERAKHIR]',
            '[STATUS_PERKAWINAN]',
            '[ALAMAT]',
            '[KETERANGAN]',
            '[KEPERLUAN]',

            '[ALAMAT_DOMISILI]',

            '[NAMA_IBU]',
            '[TEMPAT_LAHIR_IBU]',
            '[TANGGAL_LAHIR_IBU]',
            '[UMUR_IBU]',
            '[AGAMA_IBU]',
            '[NIK_IBU]',
            '[PEKERJAAN_IBU]',
            '[ALAMAT_IBU]',

            '[NAMA_AYAH]',
            '[TEMPAT_LAHIR_AYAH]',
            '[TANGGAL_LAHIR_AYAH]',
            '[UMUR_AYAH]',
            '[AGAMA_AYAH]',
            '[NIK_AYAH]',
            '[PEKERJAAN_AYAH]',
            '[ALAMAT_AYAH]',

            '[TAHUN_KEMATIAN]',

            '[SEKOLAH]',
            '[KELAS]',

            '[ADAT_ISTIADAT]',
            '[TUJUAN]',
            '[SURAT_BERLAKU]',

            '[UMUR]',
            '[SIFAT_SURAT]',
            '[LAMPIRAN]',
            '[PERIHAL]',

            '[JANGKA_WAKTU]',
            '[ALAMAT_TUJUAN]',

            '[BIDANG_USAHA]',
            '[NAMA_USAHA]',

            '[NOMOR_SURAT]',
            '[NAMA_DESA]',
            '[TANGGAL]',
            '[JABATAN]',
            '[NAMA_PEJABAT]',
            '[ALAMAT_PEJABAT]',
        ];

        foreach ($forms as $key => $value) {
            Form::create([
                'form_name' => $value,
                'form_code' => $form_codes[$key]
            ]);
        }
    }
}
