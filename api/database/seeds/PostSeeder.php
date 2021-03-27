<?php

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) { 
            $post = factory(Post::class)->create([
                'userId' => User::all()->random()->id,
            ]);
            factory(Comment::class)->create([
                'postId' => $post->id,
            ]);
        }
    }
}
