<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'id', 'sales_person_id', 'control_user_id', 'from_control', 'title', 'body', 'created_at', 'updated_at',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
