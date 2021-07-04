<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 100; $i++) {
            $jk = array_rand(['pria', 'wanita'], 1);
            User::create([
                'nama'            => $faker->name,
                'email'           => $faker->unique()->safeEmail,
                'alamat'          => $faker->address,
                'jenis_kelamin'   => ($jk == 0 ? 'pria' : 'wanita'),
                'no_hp'           => $faker->unique()->phoneNumber,
                'foto'            => ($jk == 0 ? 'default_male.jpg' : 'default_female.jpg'),
                'role'            => 'member',
                'is_admin'        => 0,
                'username'        => $faker->unique()->userName,
                'password'        => bcrypt('123456')
            ]);
        }
    }
}
