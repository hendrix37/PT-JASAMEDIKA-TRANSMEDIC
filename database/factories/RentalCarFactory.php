<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Car;
use App\Models\RentalCar;
use App\Models\User;

class RentalCarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RentalCar::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'car_id' => Car::factory(),
            'user_id' => User::factory(),
            'start_date' => $this->faker->dateTime(),
            'end_date' => $this->faker->dateTime(),
        ];
    }
}
