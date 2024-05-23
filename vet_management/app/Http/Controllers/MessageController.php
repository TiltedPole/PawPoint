<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        $incomingFields = $request->validate([
            "sender_id" => "required",
            "recipient_id" => "required",
            "message_content" => "required"
        ]);

        $message = new Message();
        $message->sender_id = $incomingFields['sender_id'];
        $message->recipient_id = $incomingFields['recipient_id'];
        $message->message = $incomingFields['message_content'];

        try {
            $message->save();
            if (Auth::user()->type == "client") {
                return redirect('/dashboard?openSection=message-board');
            }else{
                return redirect('/admin-dashboard?openSection=message-board');
            }
        } catch (\Exception $e) {
            if (Auth::user()->type == "client") {
                return redirect('/dashboard?openSection=message-board')->with('error', 'Failed to send message. Please try again.');
            }else{
                return redirect('/admin-dashboard?openSection=message-board')->with('error', 'Failed to send message. Please try again.');
            }
        }
    }
}
