<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notifications;

class NotificationsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Update all notifications to read status
        Notifications::where('user_id', $user->id)
            ->update(['is_read' => 1]); // update status to read

        $notifications = Notifications::where('user_id', $user->id)->get();

        return view('profile.notifications', compact('notifications'));
    }
    public function notification_count()
    {
        $user = Auth::user();

        $unreadNotificationCount = Notifications::where('user_id', $user->id)
            ->where('is_read', 0) // only unread notifications
            ->count();

        return response()->json(['unreadNotificationCount' => $unreadNotificationCount]);
    }
    public function notification_count2()
    {
        $user = Auth::user();

        $unreadNotificationCount2 = Notifications::where('user_id', $user->id)
            ->where('is_read', 0) // only unread notifications
            ->count();

        return response()->json(['unreadNotificationCount2' => $unreadNotificationCount2]);
    }
}
