<?php

namespace App\Http\Controllers;

use App\SalesPerson;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function sendNotification(Request $request)
    {
        $body = $request->body;
        $title = 'RMVT';
        if ($request->has('title')) {
            $title = $request->title;
        }

        $recipients = json_decode($request->recipients);
        $recipient_emails = array();
        foreach ($recipients as $recipient) {
            array_push($recipient_emails, $recipient->tag);
        }

        $sales_people = SalesPerson::select('token')
            ->whereIn('email', $recipient_emails)
            ->whereNotNull('token')
            ->get();

        $recipient_tokens = array();
        foreach ($sales_people as $sp) {
            array_push($recipient_tokens, $sp->token);
        }

        $client = new Client();
        $client->post('https://fcm.googleapis.com/fcm/send', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'key=AAAAAaBw2-o:APA91bEar5lPKdETb5EpNiczXPHz6xsne7lt_XMidLabVrECZ3U5JSfDaX51OokIBJEY-ralOdyhr-FcXVRXvKIU1fHxcu3-jst0EBRiaSmmd1604KG-FXqUTLxxsHeG_0ysPrZpCYY-'
            ],

            'json' => [
                'registration_ids' => $recipient_tokens,
                'notification' => [
                    'title' => $title,
                    'body' => $body
                ]
            ],
            ['connect_timeout' => 10],
        ]);

        return response('{"successful": "true"}');
    }
}
