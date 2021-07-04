<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        return Site::create([
            'foto'      => 'Logo.png',
            'nama'      => 'Libraryo',
            'email'     => 'support@libraryo.com',
            'no_telp'   => '082257181297'
        ]);
    }
}
