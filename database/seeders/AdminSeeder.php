<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->where('role', "admin")->delete();

        DB::table('users')->insert([
            'name' => "Admin",
            'email' => "admin@gmail.com",
            'password' => bcrypt("admin@123"),
            'role' => "admin"
        ]);
    }
}
