<?php

use App\MaritalStatus;
use Illuminate\Database\Seeder;

class MaritalStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marital_statuses = [
            'Belum Kawin',
            'Kawin',
            'Cerai Hidup',
            'Cerai Mati'
        ];

        foreach ($marital_statuses as $value) {
            MaritalStatus::create([
                'name' => $value,
            ]);
        }
    }
}
