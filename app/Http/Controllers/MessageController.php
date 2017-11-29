<?php

namespace App\Http\Controllers;

use App\Message;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function sendToControlUser(Request $request)
    {
        $message = new Message($request->all());
        $message->from_control = false;

        $client = new Client();
        $response = $client->post('https://fcm.googleapis.com/fcm/send', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'key=AAAAAaBw2-o:APA91bEar5lPKdETb5EpNiczXPHz6xsne7lt_XMidLabVrECZ3U5JSfDaX51OokIBJEY-ralOdyhr-FcXVRXvKIU1fHxcu3-jst0EBRiaSmmd1604KG-FXqUTLxxsHeG_0ysPrZpCYY-'
            ],

            'json' => [
                'to' => 'ee13SoSJLUo:APA91bFzvt0oyFyOZrmTY45d67Z-nsG2uzYZ83l7MkgoS0RIFwgIJ1A0teGXysQkBL2GR8OZxHJ93vstPxmC4Ak27Q7vJkiNK5zTWcG92XTzga3UCg--JG9AOAPREpzFzPrK_pARASD7',
                'notification' => [
                    'title' => $request->title,
                    'body' => $request->body
                ]
            ],
            ['connect_timeout' => 10],
        ])->getStatusCode();

        if ($response == 200) {

        } else {

        }

        return $response;
    }

    public function sendToSalesPerson(Request $request)
    {
        $message = new Message($request->all());
        $message->from_control = true;
        return $message;
    }

}