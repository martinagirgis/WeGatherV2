<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class EventUsersLikes extends Model
{
    protected $table = 'event_users_likes';
    protected $fillable = [
        'id',
        'event_id',
        'user_id',
    ];
}
