<?php

use App\Http\Controllers\DailyTaskController;
use App\Http\Controllers\DailyTaskUserController;
use App\Models\dailyTaskUser;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');


Route::middleware(['auth:sanctum', 'verified', 'role:Administrator'])->group(function () {

    Route::resource('/admin',DailyTaskController::class);
    Route::Get('/user/management',[DailyTaskUserController::class,'UserInfo'])->name('user.manage');
});





Route::resource('/assignee',DailyTaskUserController::class);
Route::Get('user/logout',[DailyTaskUserController::class,'logout'])->name('user.logout');
