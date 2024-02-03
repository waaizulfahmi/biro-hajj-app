<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TableAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'), // You can change 'password' to the desired password
            // Add other fields if needed
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // You can add more admin users if needed
    }
}
