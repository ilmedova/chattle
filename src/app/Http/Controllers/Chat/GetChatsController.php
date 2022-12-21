<?php


namespace Ilmedova\Chattle\app\Http\Controllers\Chat;
use Illuminate\Routing\Controller;
use Mahri\Chattle\app\Models\Chat;
use Ilmedova\Http\Request;

class GetChatsController extends Controller
{
    public function __invoke(){
        $chats = Chat::withCount('unseen_messages')->orderBy('unseen_messages_count', 'desc')->paginate(10);
        return response()->json($chats, 200);
    }
}
