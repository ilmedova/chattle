<?php

namespace Ilmedova\Chattle\app\Events;

use Domain\Users\Models\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\Channel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;

class ChatUpdate implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  public $chats;

  public function __construct($chats)
  {
      $this->chats = $chats;
  }

  public function broadcastOn()
  {
      return 'chats-update';
  }

  public function broadcastAs()
  {
      return 'chats';
  }
}
