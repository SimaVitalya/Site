<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MyObjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'value' => $this->faker->randomFloat(2, 0, 1000),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
        ];

    }

    public function configure()
    {
        return $this->afterCreating(function (object $object) {
            // do something after object is created
        });
    }

    public static function times(int $count)
    {
        return parent::times($count);
    }
}
