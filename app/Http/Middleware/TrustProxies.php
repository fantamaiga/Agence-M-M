<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Http\Middleware\TrustProxies as Middleware;

class TrustProxies extends Middleware
{
    protected $proxies = '*'; // Ou spécifiez vos proxys
    // Remplacer la constante par sa valeur
    protected $headers = [
        Request::HEADER_X_FORWARDED_FOR,
        Request::HEADER_X_FORWARDED_HOST,
        Request::HEADER_X_FORWARDED_PORT,
        Request::HEADER_X_FORWARDED_PROTO,
        Request::HEADER_X_FORWARDED_AWS_ELB,
    ];

    // Ajoutez ici d'autres méthodes si nécessaire
}
