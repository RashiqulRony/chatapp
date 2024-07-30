<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatGroupUser extends Model
{
    use HasFactory;

    protected $table = 'chat_group_users';

    protected $fillable = [
        'chat_group_id',
        'user_id',
        'chat_group_id',
    ];
}
