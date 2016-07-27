<?php


return [
    /*
    |--------------------------------------------------------------------------
    | API Root
    |--------------------------------------------------------------------------
    |
    | Retorna a url da api com a versão padrão.
    | Ex.: sprintf('//%s/api/%s', env('APP_DOMAIN'), env('API_VESRION', 'v1'))
    |
    |
    */
    'root' => sprintf('//api.%s/%s', env('APP_DOMAIN'), env('API_VESRION', 'v1'))
];

