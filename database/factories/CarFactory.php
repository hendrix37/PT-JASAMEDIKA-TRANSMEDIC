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
            'license_plate' => $this->faker->word(),
            'daily_rental_rate' => $this->faker->randomFloat(0, 0, 9999999999.),
            'photo_car' => $this->faker->word(),
        ];
    }
}
