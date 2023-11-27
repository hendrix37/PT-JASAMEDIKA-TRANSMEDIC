<?php

namespace Database\Seeders;

use App\Models\RentalCar;
use Illuminate\Database\Seeder;

class RentalCarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RentalCar::factory()->count(5)->create();
    }
}
