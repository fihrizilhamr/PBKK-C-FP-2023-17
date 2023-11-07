<?php

use App\Events\BroadcastNotification;
use Illuminate\Support\Facades\Route;

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
    // sleep(5);
    \App\Jobs\JobsTest::dispatch();
    return view('welcome');
});

Route::get('/event', function () {
    event(new BroadcastNotification('Halo, jangan lupa makan!.'));
});

Route::get('/listen', function () {
    return view('listen');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
