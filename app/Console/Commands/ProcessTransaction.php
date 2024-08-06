<?php

namespace App\Console\Commands;

use App\Business\MessageBusiness;
use App\Business\ScheduleSendsBusiness;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ProcessTransaction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:every-two-minute';

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
        Log::debug("Executing ProcessTransaction app:every-two-minute at", [Carbon::now()->format('Y-m-d H:i:s')]);
    }
}
