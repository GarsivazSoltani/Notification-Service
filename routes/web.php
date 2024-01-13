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
Route::get('/notification/send-sms', 'App\Http\Controllers\NotificationsController@sms')->name('notification.form.sms');
Route::post('/notification/send-sms', 'App\Http\Controllers\NotificationsController@sendSms')->name('notification.send.sms');
