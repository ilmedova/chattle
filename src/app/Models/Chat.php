<?php

namespace Ilmedova\Chattle\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'chats';
    protected $guarded = ['id'];
    protected $fillable = ['name', 'email', 'unseen_messages', 'last_sender'];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * Get messages of the chat
     */
    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function unseen_messages(){
        return $this->messages()->where('sender', 'customer')->where('is_seen', 0);
    }
}
