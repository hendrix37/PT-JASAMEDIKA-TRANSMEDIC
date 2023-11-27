<?php

namespace Database\Seeders;

use App\Models\ReturnCar;
use Illuminate\Database\Seeder;

class ReturnCarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReturnCar::factory()->count(5)->create();
    }
}
