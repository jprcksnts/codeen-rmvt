<?php

namespace App\Http\Controllers;

use App\SalesPerson;
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
        return $sales_people;
//        return response()->json($recipients);
    }
}
