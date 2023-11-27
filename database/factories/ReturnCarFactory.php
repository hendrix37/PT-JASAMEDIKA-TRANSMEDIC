<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Car;
use App\Models\RentalCar;
use App\Models\ReturnCar;

class ReturnCarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ReturnCar::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'car_id' => Car::factory(),
            'rental_id' => RentalCar::factory(),
            'return_date' => $this->faker->dateTime(),
            'rental_duration_days' => $this->faker->randomFloat(0, 0, 9999999999.),
            'rental_car_id' => RentalCar::factory(),
        ];
    }
}
