<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        /* LIST OF HELPER FUNCTION CAN BE FOUND IN htdocs/laravel/vendor/laravel/framework/src/Illuminate/Console/Scheduling/Event.php */
        /* You need to register single laravel cron on server that runs every minute, checks for any Scheduled command and run them */
        /* Single laravel cron to be registered on server "* * * * * php htdocs/laravel/artisan schedule:run >> /dev/null 2>&1" */
        
        $schedule->command('laracasts:clear-history')->monthly()->thenPing('url'); // Scheduling Artisan command, run "php artisan laracasts:clear-history" command every month and ping a specific URL.
        //
        // In order to "emailOutputTo", you should first "sendOutputTo" to save the output to be emailed
        $schedule->command('laracasts:clear-history')->monthly()->sendOutputTo('path/to/file')->emailOutputTo('email@me.com'); // Scheduling Artisan command, run "php artisan laracasts:clear-history" command every month, save output to a specific file and email that output to a specific email.
        
        $schedule->command('laracasts:clear-history')->monthly()->sendOutputTo('path/to/file'); // Scheduling Artisan command, run "php artisan laracasts:clear-history" command every month and save output to a specific file
        $schedule->command('laracasts:clear-history')->monthly(); // Scheduling Artisan command, run "php artisan laracasts:clear-history" command every month
        $schedule->command('laracasts:daily-report')->dailyAt('23:55'); // Scheduling Artisan command, run "php artisan laracasts:daily-report" command every day at "23:55"
        //$schedule->exec('touch foo.txt')->dailyAt('10:30'); // Scheduling Execution command, create "foo.txt" file every day at "10:30"
        //$schedule->exec('touch foo.txt')->daily(); // Scheduling Execution command, create "foo.txt" file every day
        //$schedule->exec('touch foo.txt')->everyFiveMinutes(); // Scheduling Execution command, create "foo.txt" file every five minutes        
        /*
         * $schedule->command('inspire')
                 ->hourly(); // Scheduling Artisan command, run "php artisan inspire" every hour
         */
    }
}
