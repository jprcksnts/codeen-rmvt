<?php

namespace App\Http\Controllers;

use App\Notification;
use App\NotificationLink;
use App\SalesPerson;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function sendNotification(Request $request)
    {
        $id = $request->id;
        $body = $request->body;
        $title = 'Notification';

        $recipients = json_decode($request->recipients);
        $recipient_emails = array();
        foreach ($recipients as $recipient) {
            array_push($recipient_emails, $recipient->tag);
        }

        $sales_people = SalesPerson::whereIn('email', $recipient_emails)
            ->whereNotNull('token')
            ->get();

        $recipient_tokens = array();
        $recipient_ids = array();
        foreach ($sales_people as $sp) {
            array_push($recipient_ids, $sp->id);
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

        $notification = new Notification();
        $notification->control_user_id = $id;
        $notification->title = $title;
        $notification->body = $body;
        $notification->save();

        $notification_links = array();
        foreach ($sales_people as $sp) {
            array_push($notification_links, array("notification_id" => $notification->id, "sales_person_id" => $sp->id));
        }

        NotificationLink::insert($notification_links);

        return response('{"successful": "true"}');
    }

    public function getNotifications($sales_person_id)
    {
        $notificationLinks = NotificationLink::where('sales_person_id', $sales_person_id)->get();

        $notification_ids = array();
        foreach ($notificationLinks as $nl) {
            array_push($notification_ids, $nl->notification_id);
        }

        $notifications = Notification::whereIn('id', $notification_ids)->get();
        return response()->json(array("notifications" => $notifications));
    }

}
