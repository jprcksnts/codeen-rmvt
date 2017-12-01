<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ControlUser extends Model
{
    protected $fillable = [
        'id', 'email', 'password', 'first_name', 'middle_name', 'last_name', 'created_at', 'updated_at',
    ];

    protected $hidden = [
        'password', 'created_at', 'updated_at',
    ];
}
