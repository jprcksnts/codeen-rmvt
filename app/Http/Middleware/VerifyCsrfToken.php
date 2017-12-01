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
        '/message/send/cu',
        '/message/send/sp',
        '/conversation',
        '/sales_person/login',
        '/sales_person/signup',
        '/notification/send',
    ];
}
