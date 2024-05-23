<?php

namespace Database\Seeders;

use Database\Factories\PatientFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            Patient::factory()->count(25)->create();
        }
    }
}
