<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'process/login',
        '/message/send/cu',
        '/message/send/sp',
        '/conversation',

        '/sales_person/login',
        '/sales_person/signup',
        '/sales_person/token',

        '/control_user/token',

        '/notification/send',
    ];
}
