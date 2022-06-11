<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id'            => '1',
                'role_id'       => '1',
                'name'          => 'Administrator',
                'username'      => 'Administrator',
                'nik'           => '12345678',
                'password'      => bcrypt('administrator'),
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'id'            => '2',
                'role_id'       => '2',
                'name'          => 'Admin',
                'username'      => 'Admin',
                'nik'           => '87654321',
                'password'      => bcrypt('admin'),
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
        ]);
    }
}
