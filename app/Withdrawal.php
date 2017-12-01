<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    protected $fillable = [
        'id','clients_id','amount'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
