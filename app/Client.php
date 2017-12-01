<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'id', 'salesperson_id', 'acc_no', 'first_name', 'middle_name', 'last_name', 'balance', 'action_log',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
