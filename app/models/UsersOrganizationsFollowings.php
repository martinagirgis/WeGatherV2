<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class UsersOrganizationsFollowings extends Model
{
    protected $table = 'users_organizations_followings';
    protected $fillable = [
        'id',
        'vendor_id',
        'user_id',
    ];
}
