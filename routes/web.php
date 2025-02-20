<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard.posts.index');
});

// Route dashboard
Route::name('dashboard.')->prefix('dashboard')->group(function () {
    Route::resource('posts', PostController::class);
});
