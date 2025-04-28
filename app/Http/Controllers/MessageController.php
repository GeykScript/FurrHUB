<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index($admin_id = null)
    {
        $user = Auth::user();

        Message::where('user_id', $user->id)
            ->update(['reply_status' => 11]); // update status to read

       $messages = Message::where('user_id', $user->id)
         ->where('admin_id', $admin_id) // filter messages for that admin
       ->get();

       $admins = Admin::all();
         $selected_admin = Admin::where('admin_id', $admin_id)->first(); // 1 = admin

        return view('profile.messages' , compact('messages', 'admins',  'selected_admin'));
    }


    public function send_message(Request $request)
    {
        $user = Auth::user();

        $message = Message::create([
            'user_id' => $user->id,
            'user_msg' => $request->input('message'),
            'msg_status' => 12, // 12 = unread
            'admin_id' => $request->input('selected_admin'),
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
    
    public function message_count2()
    {
        $user = Auth::user();
        $unreadReplyCount2 = Message::where('user_id', $user->id)
            ->whereNull('user_msg')  //  if user_msg is NULL
            ->whereNotNull('admin_reply')  //  if admin_reply is NOT NULL
            ->where('reply_status', 12) //  if reply_status is unread
            ->count(); // display yung count no reply sa admin messages

        return response()->json(['unreadReplyCount2' => $unreadReplyCount2]);
    }
}
