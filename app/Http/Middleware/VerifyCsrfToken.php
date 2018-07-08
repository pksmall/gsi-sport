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
        'login_accept',
        'contacts/send',
        '/cart/ajax/order',
        '/cart/order',
        '/search',
        '/onlinepay',
        '/mobile/search',
        '/mobile/cart/ajax/order',
        '/cart/ajax/order_success_liqpay',
    ];
}
