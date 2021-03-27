<?php

use Illuminate\Database\Seeder;

use App\Models\Comment;
use App\Models\Post;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) {
            factory(Comment::class)->create([
                'postId' => Post::all()->random()->id,
            ]);
        }
    }
}
