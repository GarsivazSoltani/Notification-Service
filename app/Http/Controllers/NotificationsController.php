<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Jobs\SendSms;
use App\Models\User;
use App\Services\Notification\Constants\EmailTypes;
use App\Services\Notification\Notification;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function email() // method get
    {
        $users = User::all();
        $emailTypes = EmailTypes::toString();
        return view('notifications.send-email', compact('users', 'emailTypes'));
    }

    public function sendEmail(Request $request) // method post
    {
        $request->validate([
            'user' => 'integer | exists:users,id',
            'email_type' => 'integer'
        ]);

        try {
            // $notification = resolve(Notification::class);
            $mailable = EmailTypes::toMail($request->email_type);
            // $notification->sendEmail(User::find($request->user), new $mailable);
            SendEmail::dispatch(User::find($request->user), new $mailable);
    
            return redirect()->back()->with('success', __('notification.email_sent_successfully'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', __('notification.email_has_problem'));
        }
    }

    public function sms() // method get
    {
        $users = User::all();
        return view('notifications.send-sms', compact('users'));
    }

    public function sendSms(Request $request) // method post
    {
        $request->validate([
            'users' => 'integer | exists:user,id',
            'text' => 'string | max:256'
        ]);
        
        try {
            SendSms::dispatch(User::find($request->user), $request->text);
    
            return redirect()->back()->with('sucssec', __('notification.sms_sent_successfully'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', __('notification.sms_has_problem'));
        }
    }
}
