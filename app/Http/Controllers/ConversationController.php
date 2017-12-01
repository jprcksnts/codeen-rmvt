<?php

namespace App\Http\Controllers;

use App\Conversation;
use Illuminate\Http\Request;
use Mockery\Exception;

class ConversationController extends Controller
{
    public function getConversation(Request $request)
    {
//        $control_user_id = $request->control_user_id;
        $control_user_id = 1;
        $sales_person_id = $request->sales_person_id;

        $conversation = Conversation::where('control_user_id', $control_user_id)
            ->where('sales_person_id', $sales_person_id)->first();

        if (!isset($conversation->id)) {
            $conversation = new Conversation();
            $conversation->control_user_id = $control_user_id;
            $conversation->sales_person_id = $sales_person_id;
            $conversation->save();
        }

        return $conversation->toJson();
    }
}
