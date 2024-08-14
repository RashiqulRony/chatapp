<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    use HasFactory;

    protected $table = 'chat_rooms';

    protected $fillable = [
        'room_admin_id',
        'user_id_1',
        'user_id_2',
        'type',
        'room_secret_key',
    ];

    protected $hidden = [
        'room_secret_key'
    ];
}
