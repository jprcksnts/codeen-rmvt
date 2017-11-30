<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesPerson extends Model
{
    //
    protected $fillable = [
        'id','first_name','middle_name', 'last_name', 'email', 'password', 'quota_id',
    ];

    protected $hidden = [
        'password', 'created_at',
    ];
}
