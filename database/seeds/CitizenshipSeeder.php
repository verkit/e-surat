<?php

use App\Citizenship;
use Illuminate\Database\Seeder;

class CitizenshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas= [
            'WNI',
            'WNA'
        ];

        foreach ($datas as $value) {
            Citizenship::create([
                'name' => $value,
            ]);
        }
    }
}
