<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        Message::where('user_id', $user->id)
            ->update(['reply_status' => 11]); // update status to read

       $messages = Message::where('user_id', $user->id)->get();
        return view('profile.messages' , compact('messages'));
    }

    public function send_message(Request $request)
    {
        $user = Auth::user();

        $message = Message::create([
            'user_id' => $user->id,
            'user_msg' => $request->input('message'),
            'msg_status' => 12, // 12 = unread
        ]);

        return response()->json(['success' => true, 'message' => $message  ]);
    }


    public function message_count()
    {
        $user = Auth::user();
        $unreadReplyCount = Message::where('user_id', $user->id)
            ->whereNull('user_msg')  //  if user_msg is NULL
            ->whereNotNull('admin_reply')  //  if admin_reply is NOT NULL
            ->where('reply_status', 12) //  if reply_status is unread
            ->count(); // display yung count no reply sa admin messages

        return response()->json(['unreadReplyCount' => $unreadReplyCount]);
    }
}
