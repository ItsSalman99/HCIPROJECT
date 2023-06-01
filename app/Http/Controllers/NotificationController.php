<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        return view('Admin.notification');
    }

    public function markRead($id)
    {

        $notification = Notification::where('user_id', $id)->get();

        foreach ($notification as $notification)
        {
            $notification->is_read = 1;
            $notification->save();

        }

        return response()->json([
            'status' => true,
            'msg' => 'Your notification has been marked'
        ]);

    }

}
