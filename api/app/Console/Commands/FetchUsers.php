<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

use App\Models\User;

/**
 * Fetch posts
 */
class FetchUsers extends Command
{
    /**
     * @var string
     */
    protected $signature = 'fetch:users';

    /**
     * @var string
     */
    protected $description = 'Fetch users and insert to table users, companies, and addresses';

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
        $this->info('Fetching users from [https://jsonplaceholder.typicode.com/users].');

        if ($this->confirm('This feature will udpate or create records in the database, do you wish to continue? (yes|no)[no]', true)) {

            $response = Http::get('https://jsonplaceholder.typicode.com/users');

            $payload = $response->json();

            foreach ($payload as &$payloadUser) {
                $user = User::updateOrCreate([
                    'id' => $payloadUser['id'],
                ], $payloadUser);

                $payloadUser['address']['userId'] = $user->id;

                $user->address()->create($payloadUser['address']);

                $payloadUser['company']['userId'] = $user->id;

                $user->company()->create($payloadUser['company']);
            }

            $this->info('We have successfully generated new users.');
        }

        return 0;
    }
}
