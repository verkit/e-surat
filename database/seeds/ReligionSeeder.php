<?php

use App\Religion;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas= [
            'Islam',
            'Kristen',
            'Khatolik',
            'Hindu',
            'Budha'
        ];

        foreach ($datas as $value) {
            Religion::create([
                'name' => $value,
            ]);
        }
    }
}
