<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;
use Carbon\Carbon;

class DeleteExpiredEvents extends Command
{
    protected $signature = 'events:delete-expired';
    protected $description = 'Delete events that have expired (older than today)';

    public function handle()
    {
        $expiredEvents = Event::whereDate('event_date', '<', Carbon::today())->get();
        $count = $expiredEvents->count();

        if ($count > 0) {
            Event::whereDate('event_date', '<', Carbon::today())->delete();
            $this->info("Deleted {$count} expired event(s).");
        } else {
            $this->info("No expired events found.");
        }

        return 0;
    }
}
