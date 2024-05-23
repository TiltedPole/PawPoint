<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Address;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        $superAdmin = User::create([
            'type' => 'super-admin',
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'superadmin' . '@example.com',
            'phone' => $faker->regexify('[0-9]{10}'),
            'password' => Hash::make('password'),
        ]);

        // Create 5 admin users
        for ($i = 0; $i < 5; $i++) {
            $admin = User::create([
                'type' => 'admin',
                'first_name' => 'Admin' . $i,
                'last_name' => 'User' . $i,
                'email' => 'admin' . $i . '@example.com',
                'phone' => $faker->regexify('[0-9]{10}'),
                'password' => Hash::make('password'),
            ]);
        }

        // Create 5 client users
        for ($i = 0; $i < 5; $i++) {
            $client = User::create([
                'type' => 'client',
                'first_name' => 'Client' . $i,
                'last_name' => 'User' . $i,
                'email' => 'client' . $i . '@example.com',
                'phone' => $faker->regexify('[0-9]{10}'),
                'password' => Hash::make('password'),
            ]);
        }
    }

    /**
     * Create an address for the given user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
}
