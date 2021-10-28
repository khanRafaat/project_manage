<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dailyTask extends Model
{
    use HasFactory;
    protected $fillable = [
        'assigned_work',
        'done_work',
        'pf_reporter',
        'pf_assignee',
        'pf_time',
        'status',
        'duty_time',
        'time',
        'assignee',
        'reporter',
        'assigned',
        'date',
         
     ];

     public function AssigneeName(){

       return $this->hasOne(User::class,'id','assignee');
     }
     public function ReporterName(){
         return $this->hasOne(User::class,'id','reporter');
     }
     public function Assigne(){
      return $this->hasOne(User::class,'id','reporter');
  }

  
}
