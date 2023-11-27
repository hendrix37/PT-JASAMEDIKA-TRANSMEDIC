<?php

namespace Database\Seeders;

use App\Models\Car;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        // Generate a random image and save it to the storage disk
        $imagePath = 'app/public/images/cars'; // Adjust the path according to your needs
        $imageName = $faker->image(storage_path($imagePath), 400, 300, null, false);

        
        // Move the generated image to the storage disk
        $image = "images/cars/$imageName";
        
        for ($i = 0; $i < 50; $i++) {
            Car::factory()->create([
                'photo_car' => $image
            ]);
        }
    }
}
