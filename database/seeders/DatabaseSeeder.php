<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $tags = \App\Models\Tag::factory()->count(10)->create();

        \App\Models\Event::factory(100)->create()->each(function ($event) use ($tags) {
            $numComments = random_int(1, 5);
            $numTags = random_int(1, 9);

            \App\Models\Comment::factory()->count($numComments)->for($event)->create();

            $randomTags = $tags->shuffle()->take($numTags);

            $event->tags()->attach($randomTags);
        });
    }
}
