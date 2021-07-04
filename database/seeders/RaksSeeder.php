<?php

namespace Database\Seeders;

use App\Models\Rak;
use Illuminate\Database\Seeder;

class RaksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'nama_rak'      => 'Pelajaran Sekolah',
                'lokasi_rak'    => 'Baris Rak A'
            ],
            [
                'nama_rak'      => 'Pengetahuan Umum',
                'lokasi_rak'    => 'Baris Rak B'
            ],
            [
                'nama_rak'      => 'Pengetahuan Sosial',
                'lokasi_rak'    => 'Rak Buku C'
            ],
            [
                'nama_rak'      => 'Ilmu Komunikasi',
                'lokasi_rak'    => 'Rak Buku D'
            ],
            [
                'nama_rak'      => 'Ilmu Komputer',
                'lokasi_rak'    => 'Rak Buku E'
            ],
            [
                'nama_rak'      => 'Ilmu Teknologi',
                'lokasi_rak'    => 'Rak Buku F'
            ],
            [
                'nama_rak'      => 'Buku Non Fiksi',
                'lokasi_rak'    => 'Rak Buku G'
            ],
            [
                'nama_rak'      => 'Rak Buku Fiksi',
                'lokasi_rak'    => 'Rak Buku H'
            ]
        ];

        foreach ($user as $value) {
            Rak::create($value);
        }
    }
}
