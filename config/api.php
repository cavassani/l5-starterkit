<?php


return [
    /*
    |--------------------------------------------------------------------------
    | API Root
    |--------------------------------------------------------------------------
    |
    | Retorna a url da api com a versão padrão.
    | Ex. de acesso via subdomínio:
    |  'root' => sprintf('//api.%s/%s', env('APP_DOMAIN'), env('API_VESRION', 'v1'))
    |
    | Ex. de acesso estilo diretório:
    |  'root' => sprintf('//%s/api/%s', env('APP_DOMAIN'), env('API_VESRION', 'v1'))
    |
    |
    */
    'root' => sprintf('//%s/api/%s', env('APP_DOMAIN'), env('API_VESRION', 'v1'))
];



