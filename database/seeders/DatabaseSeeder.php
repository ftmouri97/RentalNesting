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
            'name' => 'Sany',
            'email' => 'mazharulalam26@gmail.com',
            'phone' => '01876626011',
            'password' => Hash::make('asd'),
            'user_role' => 'admin'
        ]);

        // for ($i=0; $i < 3; $i++) {
        //     DB::table('users')->insert([
        //         'name' => Str::random(10),
        //         'email' => Str::random(10) . '@gmail.com',
        //         'phone' => '018154311'.$i,
        //         'password' => Hash::make('asd'),
        //         'user_role' => 'owner'
        //     ]);
        // }
        // for ($i=0; $i < 3; $i++) {
        //     DB::table('users')->insert([
        //         'name' => Str::random(10),
        //         'email' => Str::random(10) . '@gmail.com',
        //         'phone' => '01811443'.$i,
        //         'password' => Hash::make('asd'),
        //         'user_role' => 'renter'
        //     ]);
        // }


        // for ($j=0; $j < 3; $j++) {
        //     for ($i=2; $i < 5; $i++) {
        //         DB::table('apartment_details')->insert([
        //             'owner_id' => $i,
        //             'district' => Str::random(10),
        //             'zone' => Str::random(18),
        //             'address' => Str::random(25),
        //             'total_bed' => $i,
        //             'total_bath' => $j+1,
        //             'apartment_size' => $i.$j.$i.$j.'sqft',
        //             'apartment_description' => Str::random(100),
        //             'flat_name' => Str::random(4),
        //             'floor_no' => $i,
        //             'apartment_rent' => $i.$j.'000',
        //             'active_status' => 0,
        //             'commission_status' => 0
        //         ]);
        //     }
        // }

        // $z=1;
        // for ($i=5; $i < 8; $i++) {
        //     for ($k=2; $k < 5; $k++) {
        //         for ($j=2; $j < 5; $j++) {
        //             DB::table('rent_requests')->insert([
        //                 'renter_id'=>$i,
        //                 'owner_id'=>$j,
        //                 'apartment_id'=>$z,
        //             ]);
        //             $z++;
        //             if ($z==10) {
        //                 $z=1;
        //             }
        //         }
        //     }
        // }

        // DB::table('rent_confirmations')->insert([
        //     'renter_id' => 1,
        //     'apartment_id' => 1,
        //     'status' => 0
        // ]);
    }
}
