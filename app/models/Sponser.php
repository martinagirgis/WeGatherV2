<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Sponser extends Model
{
    protected $table = 'sponsers';
    protected $fillable = [
        'id',
        'name',
        'email',
        'mobile',
        'logo',
    ];

    public function events()
    {
        return $this->belongsToMany('App\models\event')->using('App\models\EventsSponsers');
    }
}
