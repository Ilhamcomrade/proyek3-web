<?php  

namespace App\Http;  

use Illuminate\Foundation\Http\Kernel as HttpKernel;  

class Kernel extends HttpKernel  
{  
    protected $middleware = [  
        // Middleware global  
    ];  

    protected $middlewareGroups = [  
        'web' => [  
            // Middleware web  
        ],  
        'api' => [  
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class, 
        ],  
    ];  

    protected $middlewareAliases = [  
        // Middleware aliases  
    ];
}
