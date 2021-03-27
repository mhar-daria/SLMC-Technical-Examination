<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

use App\Models\Comment;

/**
 * Fetch posts
 */
class FetchComments extends Command
{
    /**
     * @var string
     */
    protected $signature = 'fetch:comments';

    /**
     * @var string
     */
    protected $description = 'Fetch comments and insert to table comments';

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
        $this->info('Fetching comments from [https://jsonplaceholder.typicode.com/comments].');

        if ($this->confirm('This feature will udpate or create records in the database, do you wish to continue? (yes|no)[no]', true)) {

            $response = Http::get('https://jsonplaceholder.typicode.com/comments');

            $payload = $response->json();

            foreach ($payload as $comment) {
                Comment::updateOrCreate([
                    'id' => $comment['id'],
                ], $comment);
            }

            $this->info('We have successfully generated new comments.');
        }

        return 0;
    }
}
