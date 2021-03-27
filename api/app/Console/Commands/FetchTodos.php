<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

use App\Models\Todo;

/**
 * Fetch posts
 */
class FetchTodos extends Command
{
    /**
     * @var string
     */
    protected $signature = 'fetch:todos';

    /**
     * @var string
     */
    protected $description = 'Fetch todos and insert to table todos';

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
        $this->info('Fetching todos from [https://jsonplaceholder.typicode.com/todos].');

        if ($this->confirm('This feature will udpate or create records in the database, do you wish to continue? (yes|no)[no]', true)) {

            $response = Http::get('https://jsonplaceholder.typicode.com/todos');

            $payload = $response->json();

            foreach ($payload as $todo) {
                Todo::updateOrCreate([
                    'id' => $todo['id'],
                ], $todo);
            }

            $this->info('We have successfully generated new todos.');
        }

        return 0;
    }
}
