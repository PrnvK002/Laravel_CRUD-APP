<?php
 $middlewareGroups = [
    'web' => [
        // Other middlewares...
        \App\Http\Middleware\VerifyCsrfToken::class,
    ],
    // API middlewares...
];
