<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@simbatan.desa.id',
            'password' => bcrypt('asdqwe123'),
            'role' => 'admin',
            'photo' => 'avatar-1.png'
        ]);
    }
}
