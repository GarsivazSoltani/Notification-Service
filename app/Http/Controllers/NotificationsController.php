<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Notification\Constants\EmailTypes;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function email()
    {
        $users = User::all();
        $emailTypes = EmailTypes::toString();
        return view('notifications.send-email', compact('users', 'emailTypes'));
    }

    public function sendEmail(Request $request)
    {
        dd($request);
        // return view('welcome');
    }
}
