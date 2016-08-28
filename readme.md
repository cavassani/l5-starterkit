## StarterKit

#### Instalação

* Pacotes do [composer](https://getcomposer.org/):  
    `$ composer install`

* Pacotes npm:  
    `$ npm install`

* Arquivo .env
    - Copiar o arquivo __.env.example__ para __.env__ 
    - Ajustar as configurações nesse arquivo (DB, email, etc)

* Gerar Application Key:  
    `$ php artisan key:generate`
 
* Gerar Secret para os JWT:   
    `$ php artisan jwt:generate`

* Permissões do diretório  __storage__:  
   Alterar permissões do diretório para que o web server tenha
permissão de escrita:  
   `$ sudo chown -R :www-data .` #mudar o grupo do diretório do projeto para o grupo do web server  
    
   `$ sudo chmod -R 775 storage` #permissão de escrita para o dono e para o grupo

##### Gulp tasks disponíveis
Gerar documentação de api usando [APIDOC](http://apidocjs.com/):  
`$ gulp apidocs`

Gerar documentação geral do sistema com [sammi](https://github.com/FriendsOfPHP/Sami):  
`$ gulp sami-docs`

Gerar as duas documentações simultaneamente:  
`$ gulp docs`

Executar a bateria de testes unitários com [phpunit](https://phpunit.de/):  
`$ gulp phpunit`

-----

__Autenticação com JSON Web Tokens__  
Documentação na seção wiki do projeto: [tymondesigns/jwt-auth](https://github.com/tymondesigns/jwt-auth/wiki)
