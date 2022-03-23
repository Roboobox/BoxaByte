<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $delDirectories = DB::table('directories')
                ->whereDate('expiration', '<=', Carbon::now())
                ->where('deleted', false)
                ->get();
            foreach ($delDirectories as $directory) {
                if (Storage::disk('local')->deleteDirectory('files/' . $directory->hash)) {
                    $directory->deleted = true;
                    $directory->save();
                } else {
                    Log::error('Scheduled task failed to delete directory id:' . $directory->id);
                }
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');

    }
}
