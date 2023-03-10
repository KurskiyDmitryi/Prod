<?php

use App\Http\Controllers\AvatarController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchOtherBlogersController;
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
Route::middleware('auth')->group(function () {
    Route::get('/profile/{user}', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit/{user}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/edit/{user}', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
Route::controller(BlogController::class)->group(function () {
    Route::get('/blog/', [BlogController::class, 'create'])->name('blog.create');
    Route::get('/blog/all/{user}', [BlogController::class, 'view_all'])->name('blog.view_all');
    Route::get('/blog/{user}/{blog}', [BlogController::class, 'view_one'])->name('blog.view_one');
    Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
    Route::delete('/blog/{blog}/delete', [BlogController::class, 'delete'])->name('blog.delete');
    Route::get('/blog/search', [BlogController::class, 'view_all_bloggers'])->name('blog.view_all_bloggers');
    Route::post('/blog/search', [BlogController::class, 'search'])->name('blog.search');

});
Route::controller(AvatarController::class)->group(function () {
    Route::post('/profile/avatar/store', [AvatarController::class, 'store'])->name('avatar.store');
    Route::post('/profile/avatar/change', [AvatarController::class, 'change'])->name('change.avatar');
    Route::post('/profile/avatar/delete', [AvatarController::class, 'delete'])->name('delete.avatar');
});

Route::post('/message',[MessageController::class,'send'])->name('message.send');
Route::get('/message/view_all',[MessageController::class,'view_all'])->name('messages.view_all');
Route::get('/message/view_one/{user}',[MessageController::class,'view_one'])->name('messages.view_one');
Auth::routes();

