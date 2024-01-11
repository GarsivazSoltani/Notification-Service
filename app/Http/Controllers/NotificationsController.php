<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function email() // نمایش فرم ایمیل ارسالی
    {
        return view('notifications.send-emsil');
    }
}
