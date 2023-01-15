<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');
Route::middleware('auth')->group(function (){
    Route::get('/profile/{user}',[ProfileController::class,'index'])->name('profile.index');
    Route::get('/profile/edit/{user}',[ProfileController::class,'edit'])->name('profile.edit');
    Route::post('/profile/edit/{user}',[ProfileController::class,'update'])->name('profile.update');
});

Route::get('/calendar',[CalendarController::class,'index'])->name('calendar.index');
Route::get('/blog',[BlogController::class,'index'])->name('blog.index');
Route::get('/blog/all/{user}',[BlogController::class,'view_all'])->name('blog.view_all');
Route::get('/blog/{user}/{blog}',[BlogController::class,'view_one'])->name('blog.view_one');
Route::post('/blog',[BlogController::class,'store'])->name('blog.store');

Auth::routes();

