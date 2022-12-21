<?php

namespace Ilmedova\Chattle\app\Http\Controllers\Chat;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Ilmedova\Chattle\app\Events\ChatUpdate;
use Ilmedova\Chattle\app\Models\Chat;
use Ilmedova\Chattle\app\Models\Message;

class GetMessagesController extends Controller
{
    public function __invoke(Request $request)
    {
        $messages = Message::where('chat_id', $request->chat_id)->orderBy('created_at', 'asc')->get();
        foreach($messages as $message){
            $message->is_seen = 1;
            $message->save();
        }
        $chats = Chat::withCount('unseen_messages')->orderBy('unseen_messages_count', 'desc')->paginate(10);
        event(new ChatUpdate($chats));
        return response()->json($messages, 200);
    }
}
