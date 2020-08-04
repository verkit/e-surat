<?php

use App\FamilyCard;
use App\KTP;
use App\MemberFamilyCard;
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
            'religion_id' => 1,
            'last_education' => 'SD',
            'ktp' => 'avatar-1.png',
            'kk' => 'avatar-1.png',
            'phone' => '08989899898'
        ]);

        FamilyCard::create([
            'user_id' => 2,
            'number' => '352',
            'head_of_family' => 'warno',
            'address' => 'awd',
            'rt_rw' => '001/001',
            'postal_code' => '63319',
            'village' => 'simbatan',
            'district' => 'nguntoronadi',
            'city' => 'magetan',
            'is_new' => 1,
            'is_separate' => 0,
            'province' => 'jawa timur',
            // 'signature_id' => 1
        ]);


        MemberFamilyCard::create([
            'family_card_id' => 1,
            'nik' => '352',
            'fullname' => 'warni',
            'gender_id' => 2,
            'birthplace' => 'Magetan',
            'birthdate' => '1998/02/12',
            'religion_id' => 1,
            'education' => 'sma',
            'profession' => 'wiraswasta',
            'marital_status_id' => 1,
            'marriage_date' => '1998/02/12',
            'status_in_family' => 'kepala keluarga',
            'citizenship_id' => 1,
            'father_name' => 'SEMI',
            'mother_name' => 'ISMI',
        ]);

        KTP::create([
            'user_id' => 1,
            'nik' => '123123123',
            'fullname' => 'asdasd',
            'birthdate' => '12',
            'birthmonth' => '02',
            'birthyear' => '1998',
            'birthplace' => 'Magetan',
            'profession' => 'Pelajar',
            'address' => 'jln s',
            'rt' => '001',
            'rw' => '001',
            'gender_id' => 1,
            'citizenship_id' => 1,
            'blood_type_id' => 1,
            'marital_status_id' => 1,
            'religion_id' => 1,
        ]);
    }
}
