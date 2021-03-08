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
            'model' => $this->faker->randomElement($array = array ('Acer','Asus','Dell', 'HP', 'E-Machines', 'MAC', 'Acer')),
            'todo' => $this->faker->text($maxNbChars = 50),
            'comment' => $this->faker->text($maxNbChars = 50),
            'added_at' => $this->faker->dateTimeBetween($startDate = '-10 months', $endDate = 'now', $timezone = null),
            'finished_at' => $this->faker->dateTimeBetween($startDate = '-10 months', $endDate = 'now', $timezone = null),
            'price' => $this->faker->numberBetween($min = 10, $max = 120),
            'cost' => $this->faker->numberBetween($min = 0, $max = 30),
            'paid' => $this->faker->boolean,
            'ready' => $this->faker->boolean,
            'created_at' => $this->faker->dateTimeBetween($startDate = '-10 months', $endDate = 'now', $timezone = null),
            'updated_at' => $this->faker->dateTimeBetween($startDate = '-10 months', $endDate = 'now', $timezone = null),
        ];
    }
}