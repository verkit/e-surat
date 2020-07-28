<?php

use App\BloodType;
use Illuminate\Database\Seeder;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas= [
            'A',
            'B',
            'O',
            'AB'
        ];

        foreach ($datas as $value) {
            BloodType::create([
                'name' => $value,
            ]);
        }
    }
}
