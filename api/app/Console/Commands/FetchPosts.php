<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

use App\Models\Post;

/**
 * Fetch posts
 */
class FetchPosts extends Command
{
    /**
     * @var string
     */
    protected $signature = 'fetch:posts';

    /**
     * @var string
     */
    protected $description = 'Fetch posts and insert to table posts';

    /**
     * @constructor
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute
     *
     * @return mixed
     */
    public function handle() {
        $this->info('Fetching posts from [https://jsonplaceholder.typicode.com/posts].');

        if ($this->confirm('This feature will udpate or create records in the database, do you wish to continue? (yes|no)[no]', true)) {

            $response = Http::get('https://jsonplaceholder.typicode.com/posts');

            $payload = $response->json();

            foreach ($payload as $post) {
                Post::updateOrCreate([
                    'id' => $post['id'],
                ], $post);
            }

            $this->info('We have successfully generated new posts.');
        }

        return 0;
    }
}
