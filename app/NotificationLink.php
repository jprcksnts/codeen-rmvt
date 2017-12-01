<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationLink extends Model
{
    protected $fillable = [
        'id', 'notification_id', 'sales_person_id',
    ];
}
