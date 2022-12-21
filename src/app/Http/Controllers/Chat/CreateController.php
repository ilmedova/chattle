<?php

namespace Mahri\Chattle\app\Http\Controllers\Chat;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Mahri\Chattle\app\Models\Chat;

class CreateController extends Controller
{
    public function __invoke(Request $request)
    {
        $chat = Chat::create([
            'name'              => $request->name,
            'email'             => $request->email,
            'unseen_messages'   => 0,
            'last_sender'       => 'customer'
        ]);
        return response()->json($chat, 200);
    }
}
