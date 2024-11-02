<?php

namespace App\Http\Controllers;

use App\Events\RedisEvent;
use App\Models\Message;
use Illuminate\Http\Request;


class RedisController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('messages', compact('messages'));
    }


    public function postSendMessage(Request $request)
    {
        $messages = Message::create($request->all());
        event(
            $e = new RedisEvent($messages)
        );
        return redirect()->back();
    }

}
