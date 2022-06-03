<?php

namespace Database\Factories;

use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PublisherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Publisher::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => Str::title($this->faker->words(random_int(1, 4), true)),
            'slug' => $this->faker->slug(3),
            'slogan' => Str::title($this->faker->words(random_int(3, 7), true)),
            'established' => $this->faker->year,
            'ceased_trading' => $this->faker->optional(0.1)->date,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->companyEmail,
            'website' => $this->faker->domainName,
        ];
    }
}
