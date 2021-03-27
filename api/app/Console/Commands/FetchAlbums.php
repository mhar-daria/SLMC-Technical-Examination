<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

use App\Models\Album;

/**
 * Fetch posts
 */
class FetchAlbums extends Command
{
    /**
     * @var string
     */
    protected $signature = 'fetch:albums';

    /**
     * @var string
     */
    protected $description = 'Fetch albums and insert to table albums';

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
        $this->info('Fetching albums from [https://jsonplaceholder.typicode.com/albums].');

        if ($this->confirm('This feature will udpate or create records in the database, do you wish to continue? (yes|no)[no]', true)) {

            $response = Http::get('https://jsonplaceholder.typicode.com/albums');

            $payload = $response->json();

            foreach ($payload as $album) {
                Album::updateOrCreate([
                    'id' => $album['id'],
                ], $album);
            }

            $this->info('We have successfully generated new albums.');
        }

        return 0;
    }
}
