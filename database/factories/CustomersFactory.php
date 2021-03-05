<?php

namespace Database\Factories;

use App\Models\Customers;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'tel_num' => $this->faker->phoneNumber,
            'model' => $this->faker->company,
            'todo' => $this->faker->text,
            'comment' => $this->faker->text,
            'added_at' => $this->faker->dateTime($max = 'now'),
            'price' => $this->faker->numberBetween($min = 10, $max = 120),
            'cost' => $this->faker->numberBetween($min = 0, $max = 30),
            'paid' => $this->faker->boolean,
            'ready' => $this->faker->boolean,
            'created_at' => $this->faker->dateTime($max = 'now', $timezone = null),
            'updated_at' => $this->faker->dateTime($max = 'now', $timezone = null),
        ];
    }
}