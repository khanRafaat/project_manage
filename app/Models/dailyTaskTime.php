<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dailyTaskTime extends Model
{
    use HasFactory;
    protected $fillable = [
        'daily_task_id',
        'start_time',
        'end_time',
        'isAuto',
        
     ];

}
