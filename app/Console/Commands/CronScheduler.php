<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\CronJob;

class CronScheduler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:scheduler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Schedule Cron Jobs';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $now = Carbon::now();
      $now->second = 0;
      
      foreach(CronJob::all() as $job) {
        $runTime = new Carbon($job->nextRuntime);
        $runTime->second = 0;
        
        if($runTime->eq($now)) {
          $runTime->addMinutes($job->interval);
          $job->nextRuntime = $runTime;
          $job->save();
            
          \Artisan::call($job->command, [
            'user' => $job->user_id
          ]);
        }
      }
      Log::info("Scheduler Working!");
    }
}
