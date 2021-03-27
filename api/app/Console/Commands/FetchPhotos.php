<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

use App\Models\Photo;

/**
 * Fetch posts
 */
class FetchPhotos extends Command
{
    /**
     * @var string
     */
    protected $signature = 'fetch:photos';

    /**
     * @var string
     */
    protected $description = 'Fetch photos and insert to table photos';

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
        $this->info('Fetching photos from [https://jsonplaceholder.typicode.com/photos].');

        if ($this->confirm('This feature will udpate or create records in the database, do you wish to continue? (yes|no)[no]', true)) {

            $response = Http::get('https://jsonplaceholder.typicode.com/photos');

            $payload = $response->json();

            foreach ($payload as $photo) {
                Photo::updateOrCreate([
                    'id' => $photo['id'],
                ], $photo);
            }

            $this->info('We have successfully generated new photos.');
        }

        return 0;
    }
}
