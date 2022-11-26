<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jurusan;
class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jurusan::create(
            [
                'nama_jurusan' => 'Admin',
            ]
        );
        Jurusan::create(
            
            [
                'nama_jurusan' => 'Sistem Informasi',
            ]
        );
        Jurusan::create(
            
            [
                'nama_jurusan' => 'Informatika',

            ],
        );
        Jurusan::create(
            
            [
                'nama_jurusan' => 'Geologi',

            ],
        );
        Jurusan::create(

            [
                'nama_jurusan' => 'Tambang',

            ],
        );
        Jurusan::create(

            [
                'nama_jurusan' => 'Kimia',

            ],
        );
        Jurusan::create(

            [
                'nama_jurusan' => 'Sipil',

            ],
        );
        Jurusan::create(

            [
                'nama_jurusan' => 'Arsitektur',

            ],
        );
        Jurusan::create(

            [
                'nama_jurusan' => 'Lingkungan',

            ],
        );
        Jurusan::create(

            [
                'nama_jurusan' => 'Program Profesi Insinyur',

            ],
        );
        Jurusan::create(

            [
                'nama_jurusan' => 'Elektro',

            ],
        );
        Jurusan::create(

            [
                'nama_jurusan' => 'Industri',

            ],
        );
    }
}
