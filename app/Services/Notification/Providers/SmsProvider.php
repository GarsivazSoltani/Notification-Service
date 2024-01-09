<?php
namespace App\Services\Notification\Providers;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;

class SmsProvider
{
  public function send(User $user, String $text)
  {
    $client = new Client();
    dd($this->prepareDataForSms($user, $text));

    $response = $client->post(config('services.sms.uri'), $this->prepareDataForSms($user, $text));
    return $response->getBody();
  }

  private function prepareDataForSms(User $user, String $text)
  {
    $data =
        array_merge(
            config('services.sms.auth'),
            [
                'op' => 'send',
                'message' => $text,
                'to' => [$user->phone_number],
            ]
        );
    
    return ['json' => $data];
  }
}