<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\FetchPosts::class,
        \App\Console\Commands\FetchUsers::class,
        \App\Console\Commands\FetchComments::class,
        \App\Console\Commands\FetchAlbums::class,
        \App\Console\Commands\FetchPhotos::class,
        \App\Console\Commands\FetchTodos::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //
    }
}
