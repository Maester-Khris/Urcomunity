<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class MessagerieController extends Controller
{

    public function index(){
        $messages = Chat::with('membre')->get();
        return view('messagerie')->with(compact('messages'));
    }

    public function getMessages(Request $request){
        $messages = Chat::with('membre')->get();
        return response()->json(['data'=>$messages], 200);
    }

    public function pushMessage(Request $request){
        $chat_message = new Chat;
        $chat_message->membre_id = $request->memberid;
        $chat_message->message = $request->mes;
        $chat_message->save();
        // return response()->json(['data' => $this->messages], 200);
        return response()->json(['data' => 'message saved!!'], 200);
    }

     // array_push($this->messages, $request->mes);
     // return the newly inserted message with necesera: text; image, time
}
