<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('ja_JP');

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'postcode' => $this->faker->postcode(),
            'address' => $this->faker->address(),
            'number' => $this->faker->phoneNumber()
        ];
    }
}
