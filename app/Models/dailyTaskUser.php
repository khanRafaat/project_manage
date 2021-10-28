<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dailyTaskUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'duty_time',
        'weekly_duty',
        'user_id',
        
     ];

     
}
