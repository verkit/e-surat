<?php

use App\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genders = [
            'laki-laki',
            'perempuan',
        ];

        foreach ($genders as $value) {
            Gender::create([
                'name' => $value,
            ]);
        }
    }
}
