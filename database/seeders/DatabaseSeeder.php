<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'phone' => 123456789,
            'password' => Hash::make('asd'),
            'user_role' => 'admin'
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'phone' => 123456789,
            'password' => Hash::make('asd'),
            'user_role' => 'owner'
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'phone' => 123456789,
            'password' => Hash::make('asd'),
            'user_role' => 'renter'
        ]);


        DB::table('apartment_details')->insert([
            'owner_id' => 2,
            'district' => Str::random(5),
            'zone' => Str::random(8),
            'address' => Str::random(12),
            'total_bed' => 3,
            'total_bath' => 2,
            'apartment_size' => Str::random(5),
            'apartment_description' => Str::random(20),
            'flat_name' => Str::random(2),
            'floor_no' => 5,
            'apartment_rent' => 15000,
            'active_status' => 0,
            'commission_status' => 0
        ]);
        DB::table('apartment_details')->insert([
            'owner_id' => 2,
            'district' => Str::random(5),
            'zone' => Str::random(8),
            'address' => Str::random(12),
            'total_bed' => 3,
            'total_bath' => 2,
            'apartment_size' => Str::random(5),
            'apartment_description' => Str::random(20),
            'flat_name' => Str::random(2),
            'floor_no' => 5,
            'apartment_rent' => 15000,
            'active_status' => 0,
            'commission_status' => 0
        ]);
        DB::table('apartment_details')->insert([
            'owner_id' => 2,
            'district' => Str::random(5),
            'zone' => Str::random(8),
            'address' => Str::random(12),
            'total_bed' => 3,
            'total_bath' => 2,
            'apartment_size' => Str::random(5),
            'apartment_description' => Str::random(20),
            'flat_name' => Str::random(2),
            'floor_no' => 5,
            'apartment_rent' => 15000,
            'active_status' => 0,
            'commission_status' => 0
        ]);
    }
}
