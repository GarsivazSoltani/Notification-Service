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
    return view('layouts.home');
});

Route::get('/notification/send-email', 'App\Http\Controllers\NotificationsController@email')->name('notification.form.email');
Route::post('/notification/send-email', 'App\Http\Controllers\NotificationsController@sendEmail')->name('notification.send.email');

// Route::get('/email', function () {
//     $notification = resolve(Notification::class);
//     $notification->sendEmail(User::find(1), new TopicCreated);
// });

// Route::get('/sms', function () {
//     $notification = resolve(Notification::class);
//     $notification->sendSms(User::find(1), 'این یک پیام تستی اس ام اس می باشد');
// });