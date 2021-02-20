<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class EventUsersBookings extends Model
{
    protected $table = 'event_users_bookings';
    protected $fillable = [
        'id',
        'numberOfTicket',
        'user_id',
        'event_id',
    ];
}
