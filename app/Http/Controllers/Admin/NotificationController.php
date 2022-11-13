<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function notification()
    {
        $notifications = auth()->user()->notifications()->paginate(10);

        return view('admin.notification.index', compact('notifications'));
    }

    public function readNotification(DatabaseNotification $databaseNotification)
    {
        $databaseNotification->markAsRead();

        return back();
    }

    public function readAllNotification()
    {
        foreach (auth()->user()->unreadNotifications as $notification) {
            $notification->markAsRead();
        }

        return back();
    }
}
