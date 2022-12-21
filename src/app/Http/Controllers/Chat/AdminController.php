<?php

namespace Mahri\Chattle\app\Http\Controllers\Chat;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Mahri\Chattle\app\Models\Chat;

class AdminController extends Controller
{
    public function __invoke(Request $request)
    {
        $chats = Chat::withCount('unseen_messages')->orderBy('unseen_messages_count', 'desc')->paginate(10);
        return view('chattle::admin.messages', [
            'chats' => $chats
        ]);
    }
}
