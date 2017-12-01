<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoalMetersController extends Controller
{
    protected $fillable = [
        'id', 'sales_person_id', 'quarter', 'yeaer', 'amount',
    ];
    protected $hidden = [
        'created_at',
    ];
}
