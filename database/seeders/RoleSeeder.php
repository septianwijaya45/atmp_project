<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id'            => '1',
                'role'          => 'Administrator',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'id'            => '2',
                'role'          => 'Admin',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
        ]);
    }
}
