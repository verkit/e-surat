<?php

use App\Education;
use Illuminate\Database\Seeder;

class EduSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $educations = [
            'BELUM TAMAT SD/SEDERAJAT',
            'TAMAT SD / SEDERAJAT',
            'SLTP/SEDERAJAT',
            'TIDAK / BELUM SEKOLAH',
            'SLTA / SEDERAJAT',
            'DIPLOMA I / II',
            'AKADEMI/ DIPLOMA III/S. MUDA',
            'DIPLOMA IV/ STRATA I',
            'STRATA II',
            'STRATA III',
        ];

        foreach ($educations as $value) {
            Education::create([
                'name' => $value,
            ]);
        }
    }
}
