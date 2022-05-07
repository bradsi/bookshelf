<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            PublisherSeeder::class,
            AuthorSeeder::class,
            BookSeeder::class,
        ]);

        for ($i = 0; $i <= rand(100, 400); $i++) {
            DB::table('author_book')->insert([
                'author_id' => rand(1, 4000),
                'book_id' => rand(1, 5000),
            ]);
        }
    }
}
