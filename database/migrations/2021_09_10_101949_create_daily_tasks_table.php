<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_tasks', function (Blueprint $table) {
            $table->id();
            $table->text('assigned_work')->nullable();
            $table->text('done_work')->nullable();
            $table->string('pf_reporter')->nullable();
            $table->string('pf_assignee')->nullable();
            $table->string('pf_time')->nullable();
            $table->string('status')->nullable();
            $table->string('duty_time')->nullable();
            $table->date('date')->nullable();
            $table->string('time')->nullable();
            $table->foreignid('assignee')->constrained('users');
            $table->foreignid('reporter')->constrained('users');
            $table->foreignid('assigned')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_tasks');
    }
}
