<?php

use App\StatusFamily;
use Illuminate\Database\Seeder;

class StatusFamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            'Kepala Keluarga',
            'Isteri',
            'Anak',
            'Menantu',
            'Cucu',
            'Orang Tua',
            'Mertua',
            'Famili Lain',
        ];

        foreach ($status as $value) {
            StatusFamily::create([
                'name' => $value,
            ]);
        }
    }
}
