<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */
   
    'supportsCredentials' => false,
    'allowedOrigins' => ['*'],
    'allowedOriginsPatterns' => [],
    'allowedHeaders' => ['origin', 'x-requested-with', 'content-type'],
    'allowedMethods' => ['PUT', 'GET', 'POST', 'DELETE', 'OPTIONS'],
    'exposedHeaders' => [],
    'maxAge' => 0,

];
