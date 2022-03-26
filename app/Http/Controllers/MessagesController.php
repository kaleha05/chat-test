<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessagesEvent;

class MessagesController extends Controller
{
    public function sendMessage(){
        return event(new MessagesEvent(
            array(
                'message' => 'Hi',
                'sender' => '0712345678',
				'receiver_id' => 'uGNw6z2ACeaIeLapEUHrQ6RYqLp2'
            ), 'uGNw6z2ACeaIeLapEUHrQ6RYqLp2'
        ));
    }

    public function postMessage(Request $request){
        return event(new MessagesEvent(
            array(
                'message' => $request->message,
                'sender' => $request->sender,
                'user_id' => $request->user_id,
                'receiver_id' => $request->receiver_id
            ),
            $request->receiver_id
        ));
    }
}
