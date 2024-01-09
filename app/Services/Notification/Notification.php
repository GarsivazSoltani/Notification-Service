<?php
namespace App\Services\Notification;

use App\Models\User;
use App\Services\Notification\Providers\EmailProvider;
use App\Services\Notification\Providers\SmsProvider;
use GuzzleHttp\Client;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class Notification
{
    // public function sendEmail(User $user, Mailable $mailable)
    // {
    //     $emailProvider = new EmailProvider();
    //     return $emailProvider->send($user, $mailable);
    // }

    // public function sendSms(User $user, String $text)
    // {
    //     $smsProvider = new SmsProvider();
    //     return $smsProvider->send($user, $text);
    // }

    public function __call($method, $args)
    {
        $providerPath = __NAMESPACE__ . '\Providers\\' . substr($method, 4) . 'Provider';
        $providerInstancs = new $providerPath;
        $providerInstancs->send(...$args);
        dd(...$args);
    }
}
