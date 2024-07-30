<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatGroup extends Model
{
    use HasFactory;

    protected $table = 'chat_groups';

    protected $fillable = [
        'chat_room_id',
        'group_name',
    ];
}
