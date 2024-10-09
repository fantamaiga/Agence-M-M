<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use App\Http\Middleware\TrimStrings; // Assurez-vous d'importer votre middleware

class Kernel extends HttpKernel
{
    protected $middleware = [
        // autres middlewares...
    ];

    protected $middlewareGroups = [
        'web' => [
            // Autres middlewares...
            \App\Http\Middleware\TrimStrings::class,
        ],

        'api' => [
            // Autres middlewares...
        ],
    ];
}
