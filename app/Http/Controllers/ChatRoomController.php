<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Kreait\Firebase\Contract\Database;
use Kreait\Firebase\Contract\Messaging;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Laravel\Firebase\Facades\Firebase;

class ChatRoomController extends Controller
{

    private $factory;
    private $messaging;

    private $database;
    public function __construct()
    {
        $this->factory = (new Factory())->withServiceAccount(public_path('/assets/admin/FirebaseKey.json'))
            ->withDatabaseUri('https://chat-37976-default-rtdb.firebaseio.com/');;
        $this->database = $this->factory->createDatabase();
    }

    public function index()
    {

        $roamer = User::where('user_type', 2)->get();

        return view('Admin.admin-chat', compact('roamer'));
    }

    public function roamerChat()
    {
        return view('Admin.seller-chat');
    }

    public function getUser($id, $Id)
    {
        $user = User::where('id', $id)->first();

        $reference = $this->database->getReference('chats');
        $snapshot = $reference->getValue();

        return response()->json([
            'status' => true,
            'data' => $user,
            'msgs' => $snapshot
        ]);
    }

    public function getMessages()
    {
        $reference = $this->database->getReference('chats');
        $snapshot = $reference->getValue();

        return response()->json([
            'status' => true,
            'msgs' => $snapshot,
        ]);
    }

    public function store(Request $request)
    {
        //  $chat =    $database->getReference('chats')->getValue();
        // $database = app('firebase.database');
        // $new_post = $database->getReference('chat')->getValue();
        // return response()->json([
        //     'status' => true,
        //     'message' => $chat
        // ]);
        $type = '';

        $chat = new Chat();

        $chat->sender_id = $request->sender_id;
        $chat->sender_name = $request->sender_name;
        $chat->receiver_id = $request->receiver_id;
        $chat->receiver_name = $request->receiver_name;
        if ($request->hasFile('file')) {
            $fileName = $request->file->getClientOriginalName();
            $file = $request->file('file');
            $destinationPath = public_path() . '/images/chat/';
            $file->move($destinationPath, $fileName);
            $chat->msg = request()->getSchemeAndHttpHost() . '/images/chat/' . $fileName;
            $type = 'file';
        } else if ($request->hasFile('img')) {
            $fileName = $request->img->getClientOriginalName();
            $file = $request->file('img');
            $destinationPath = public_path() . '/images/chat/';
            $file->move($destinationPath, $fileName);
            $chat->msg = request()->getSchemeAndHttpHost() . '/images/chat/' . $fileName;
            $type = 'img';
        } else {
            $chat->msg = $request->msg;
            $type = 'msg';
        }

        $chat->type = $type;
        $chat->is_read = 0;

        $chat->save();

        // $database = Firebase::database(config('app.database'));
        // $this->database = app('firebase.messaging');

        $data = [
            'sender_id' => $request->sender_id,
            'sender_name' => $request->sender_name,
            'receiver_id' => $request->receiver_id,
            'receiver_name' => $request->receiver_name,
            'msg' => $chat->msg,
            'type' => $type,
            'is_read' => 0,
            'time' => date(now()),
        ];

        // $database = app('firebase.database');
        $new_post = $this->database->getReference('chats')->push(
            $data
        );

        Notification::create([
            'title' => 'You received a new message from ' . $request->sender_name,
            'body' => 'You received a new message from ' . $request->sender_name,
            'user_id' => $request->sender_id,
        ]);

        Notification::create([
            'title' => 'You received a new message from ' . $request->receiver_name,
            'body' => 'You received a new message from ' . $request->receiver_name,
            'user_id' => $request->receiver_id,
        ]);


        return response()->json([
            'status' => true,
            'message' => $data,
        ]);
    }

    public function isread($id)
    {
        $chat = Chat::where('sender_id', $id)->where('is_read', 0)->get();

        foreach ($chat as $chat)
        {
            $chat->is_read = 1;
            $chat->save();
        }


        return response()->json([
            'status' => true,
        ]);

    }
}
