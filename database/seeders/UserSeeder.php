<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'email' => 'admin@mail.com',
            'password' => Hash::make('adminadmin'),
            'id_jurusan' => 1,
        ],
            
        );
        User::create(
            
            [
                'name' => 'Sistem Informasi',
                'email' => 'si@mail.com',
                'password' => Hash::make('adminadmin'),
                'id_jurusan' => 2,
            ],
           
        );
        User::create(
           
            [
                'name' => 'Informatika',
                'email' => 'informatika@mail.com',
                'password' => Hash::make('adminadmin'),
                'id_jurusan' => 3,
            ],
           
        );
        User::create(
           
            [
                'name' => 'Geologi',
                'email' => 'geologi@mail.com',
                'password' => Hash::make('adminadmin'),
                'id_jurusan' => 4,
            ],
            
        );
        User::create(
           
            [
                'name' => 'Tambnag',
                'email' => 'tambang@mail.com',
                'password' => Hash::make('adminadmin'),
                'id_jurusan' => 5,
            ],
            
        );
        User::create(
            
            [
                'name' => 'Kimia',
                'email' => 'kimia@mail.com',
                'password' => Hash::make('adminadmin'),
                'id_jurusan' => 6,
            ],
           
        );
        User::create(
           
            [
                'name' => 'Sipil',
                'email' => 'sipil@mail.com',
                'password' => Hash::make('adminadmin'),
                'id_jurusan' => 7,
            ],
           
        );
        User::create(
            
            [
                'name' => 'Arsitektur',
                'email' => 'arsitektur@mail.com',
                'password' => Hash::make('adminadmin'),
                'id_jurusan' => 8,
            ],
            
        );
        User::create(
            
            [
                'name' => 'Lingkungan',
                'email' => 'lingkungan@mail.com',
                'password' => Hash::make('adminadmin'),
                'id_jurusan' => 9,
            ],
            
        );
        User::create(
            
            [
                'name' => 'Program Profesi Insinyur',
                'email' => 'ppi@mail.com',
                'password' => Hash::make('adminadmin'),
                'id_jurusan' => 10,
            ],
        );
        
    }
}
