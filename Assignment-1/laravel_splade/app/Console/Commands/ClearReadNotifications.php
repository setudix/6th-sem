<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ClearReadNotifications extends Command
{
    private $duration = 5;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear-read-notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $deleteTime = Carbon::now()->subMinutes($this->duration)->toDateTimeString();

        // if ($this->runningInConsole()) {
        //     $this->info('Command is being executed by the kernel.');
        // } else {
        //     $this->info('Command is being executed manually from the command line.');
        // }

        // Delete read notifications older than 5 minutes
        DB::table('notifications')
            ->where('read_at', '<=', $deleteTime)
            ->delete();

        $this->info('Successfully cleared read notifications older than ' . $this->duration . ' minutes.');
    }
}