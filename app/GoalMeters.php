<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoalMeters extends Model
{
    //

    protected $fillable = [
        'id', 'sales_person_id', 'quarter', 'yeaer', 'amount',
    ];
    protected $hidden = [
        'created_at',
    ];
}
