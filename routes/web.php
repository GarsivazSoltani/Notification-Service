<?php

use App\Mail\TopicCreated;
use App\Mail\UserRegistered;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Services\Notification\Notification;

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
    // Mail::to('garsi.soltani@gmail.com')->send(new TopicCreated);
    $notification = resolve(Notification::class);
    $notification->sendEmail(User::find(1), new TopicCreated);
    // return view('welcome');
});
