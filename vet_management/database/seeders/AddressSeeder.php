<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Address;
use App\Models\User;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Address::factory()->count(10)->create();

        $usersCount = User::count();

        for ($i = 2; $i < $usersCount; $i++) {
            $user = User::find($i);
            $user->address()->create([
                'address_line_1' => 'Main Street'  . $i,
                'address_line_2' => 'Blah Blah',
                'city' => 'Example City' . $i,
                'county' => 'Example County' . $i,
                'eircode' => 'Eircode' . $i,
            ]);
        }
    }
}
