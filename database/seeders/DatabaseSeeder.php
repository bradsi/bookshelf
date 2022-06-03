<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PublisherSeeder::class,
            AuthorSeeder::class,
            BookSeeder::class,
        ]);

        for ($i = 0; $i <= random_int(100, 400); $i++) {
            DB::table('author_book')->insert([
                'author_id' => random_int(1, 4000),
                'book_id' => random_int(1, 5000),
            ]);
        }
    }
}
