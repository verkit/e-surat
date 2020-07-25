<?php

use App\VillageAdministrator;
use Illuminate\Database\Seeder;

class VillageAdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
