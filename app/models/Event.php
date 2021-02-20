<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = [
        'id',
        'title_ar',
        'title_en',
        'description_ar', 
        'description_en',
        'max_capacity',
        'cover',
        'lng',
        'lat',
        'address_ar',
        'address_en',
        'price',
        'available_seats',
        'start_date',
        'end_date',
        'vendor_id',
        'category_id'
    ];

    public function events_owners()
    {
        return $this->belongsTo('App\Vendor','vendor_id');
    }

    public function sponsers()
    {
        return $this->belongsToMany('App\models\Sponser','events_sponsers','event_id','sponser_id');
    }
}
