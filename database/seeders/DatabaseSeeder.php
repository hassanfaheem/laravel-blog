<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use App\Models\Post;
use \App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            "name" => "Test User",
            "email"=> "test@example.com",
        ]);

        Post::factory(50)->has(Comment::factory(10))->for($user)->create();
    }
}
