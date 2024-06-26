<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'username'  => 'admin',
                    'name'  => 'admin',
                    'email' => 'admin@gmail.com',
                    'password'  => bcrypt('rahasia'),
                    'level'  => 'admin',
                ],
                [
                    'username'  => 'mahasiswa',
                    'name'  => 'mahasiswa',
                    'email' => 'mahasiswa@gmail.com',
                    'password'  => bcrypt('rahasia'),
                    'level'  => 'mahasiswa',
                ],
            ]
        );
    }
}
