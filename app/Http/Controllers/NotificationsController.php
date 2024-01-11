<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function email()
    {
        $user = User::all();
        return view('notifications.send-email');
    }
}
