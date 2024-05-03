<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Follow;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create()->each(function ($user) {
            $numberOfPosts = random_int(0, 5);
            $numberOfFollows = random_int(1, 10);

            Post::factory($numberOfPosts)->for($user)->create()->each(function ($post) {
                $randomNumber = random_int(0, 20);

                Comment::factory($randomNumber)->for($post)->create();
                Like::factory($randomNumber)->for($post)->create();
            });

            Post::factory($numberOfPosts)->recent()->for($user)->create()->each(function ($post) {
                $randomNumber = random_int(0, 30);
                $randomNumber2 = random_int(0, 30);

                Comment::factory($randomNumber2)->for($post)->create();
                Like::factory($randomNumber)->for($post)->create();
            });

            Follow::factory($numberOfFollows)->for($user, 'follower')->create([
                'followed_id' => function (array $attributes) {
                    return User::where('id', '!=', $attributes['follower_id'])->get()->random();
                },
            ]);
        });

    }

}
