<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EventsSponsers extends Pivot
{
    protected $table = 'events_sponsers';
    protected $fillable = [
        'id',
        'sponser_id',
        'event_id',
    ];
}
