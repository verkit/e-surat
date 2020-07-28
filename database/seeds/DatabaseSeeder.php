<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            GenderSeeder::class,
            MaritalStatusesSeeder::class,
            UserSeeder::class,
            VillageAdministratorSeeder::class,
            FormSeeder::class,
            BloodTypeSeeder::class,
            CitizenshipSeeder::class,
            ReligionSeeder::class,
            TestSeeder::class,
        ]);
    }
}
