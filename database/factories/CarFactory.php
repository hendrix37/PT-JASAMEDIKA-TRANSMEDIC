<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Car;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'brand' => $this->faker->word(),
            'model' => $this->faker->word(),
            'license_plate' => 'AB ' . $this->faker->numberBetween($min = 1000, $max = 9000) . ' xx',
            'daily_rental_rate' => $this->faker->randomFloat(0, 0, 250000.),
            'photo_car' => $this->faker->word(),
        ];
    }
}
