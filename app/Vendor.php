<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendor extends Authenticatable
{
    use Notifiable;

    protected $guard = 'vendor';

    protected $fillable = [
        'fname','lname', 'email', 'password','phone','img',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
