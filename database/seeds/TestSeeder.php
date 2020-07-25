<?php

use App\User;
use App\Villager;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Warga',
            'email' => 'warga@simbatan.desa.id',
            'password' => bcrypt('asdqwe123'),
            'role' => 'user',
            'photo' => 'avatar-1.png'
        ]);

        Villager::create([
            'user_id' => 2,
            'nik' => '123',
            'birthdate' => '1997-07-24',
            'birthplace' => 'Magetan',
            'profession' => 'Tani',
            'gender_id' => 1,
            'marital_status_id' => 1,
            'address' => 'jalan jalan aja',
            'religion' => 'islam',
            'last_education' => 'SD',
            'ktp' => 'avatar-1.png',
            'kk' => 'avatar-1.png',
            'phone' => '08989899898'
        ]);
    }
}
