<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    protected function index() 
    {
        return view('messages');
    }

    protected function sendMessage(Request $request)
    {
        $message = $request->message;
        broadcast(new \App\Events\MessageCreated($message));
        return response()->json([
            'status' => 'message is sent successfuly!'
        ]);
    }
}
