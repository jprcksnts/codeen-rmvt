<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'id', 'control_user_id', 'title', 'body', 'created_at', 'updated_at',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
