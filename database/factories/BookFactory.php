<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
//        $publisher_ids = Publisher::select('id')->get()->toArray();
//        $publisher_id = $this->faker->randomElement($publisher_ids)->id;

        $publisher = Publisher::factory()->create();

        return [
            'isbn' => $this->faker->isbn13(),
            'title' => Str::title($this->faker->words(random_int(2, 5), true)),
            'slug' => $this->faker->slug(3),
            'publisher_id' => $publisher->id,
            'publish_date' => $this->faker->date,
            'pages' => $this->faker->randomNumber(3, true),
        ];
    }

    public function withAuthors(): void
    {

    }
}
