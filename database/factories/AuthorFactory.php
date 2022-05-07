<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->optional(0.1)->firstName,
            'last_name' => $this->faker->lastName,
            'slug' => $this->faker->slug(3),
            'date_of_birth' => $this->faker->dateTimeBetween('-80 years', '-20 years')->format('Y-m-d'),

        ];
    }
}
