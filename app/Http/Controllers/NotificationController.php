<?php

namespace App\Http\Controllers;

use App\SalesPerson;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function sendNotification(Request $request)
    {
        $recipients = $request->recipients;
        $recipient_emails = array();
        foreach ($recipients as $recipient) {
            array_push($recipient_emails, $recipient["tag"]);
        }

        $sales_people = SalesPerson::select('id')
            ->whereIn('email', $recipient_emails)
            ->whereNotNull('token')
            ->get();

        $client = new Client();
        foreach ($sales_people as $sp) {
            $client->post('https://fcm.googleapis.com/fcm/send', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'key=AAAAAaBw2-o:APA91bEar5lPKdETb5EpNiczXPHz6xsne7lt_XMidLabVrECZ3U5JSfDaX51OokIBJEY-ralOdyhr-FcXVRXvKIU1fHxcu3-jst0EBRiaSmmd1604KG-FXqUTLxxsHeG_0ysPrZpCYY-'
                ],

                'json' => [
                    'to' => $sp->token,
                    'notification' => [
                        'title' => $request->title,
                        'body' => $request->body
                    ]
                ],
                ['connect_timeout' => 10],
            ]);
//            ->getStatusCode()
        }

        return '{"successful": "true"}';
    }
}
