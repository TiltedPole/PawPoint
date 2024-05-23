<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Clinic;
use App\Models\User;

class ClinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all previously generated admins
        $admins = User::where('type', 'admin')->get();

        // Iterate over each admin and create a clinic for them
        $admins->each(function ($admin) {
            Clinic::factory()->create([
                'admin_id' => $admin->id,
            ]);
        });
    }
}
