<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminMessageController extends Controller
{
    public function index($user_id = null)
    {
        $admin = Auth::guard('admin')->user();
        if (!$admin) {
            return redirect()->route('admin-login')->with('error', 'You must be logged in to view the messages.');
        }

        $messages = Message::where('admin_id', $admin->admin_id)
            ->where('user_id', $user_id) // filter messages for that user
            ->get();

        $users = User::all();

        $selected_user = User::where('id', $user_id)->first();
        

        return view('admin.admin_messages', compact('messages', 'admin', 'users','selected_user'));
    }


    public function send_message(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        if (!$admin) {
            return redirect()->route('admin-login')->with('error', 'You must be logged in to send messages.');
        }

        $message = Message::create([
            'user_id' => $request->input('selected_user'),
            'admin_id' => $admin->admin_id,
            'user_msg' => null,
            'admin_reply' => $request->input('message'),
            'msg_status' => 12, // 12 = unread
            'reply_status' => 12, // 11 = read
        ]);
        return redirect()->route('admin_messages', ['user_id' => $request->input('selected_user')])
            ->with('success', 'Message sent successfully.');
        }
        
    
}
