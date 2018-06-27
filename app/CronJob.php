<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CronJob extends Model
{
  protected $guarded = [];

  protected $table = "iys_cron_jobs";
}
