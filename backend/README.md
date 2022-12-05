<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## Backend API Laravel.

> A documentação dos endpoits está no arquivo postman na raiz da pasta backend.


### Informações importantes

- Para estruturar o banco, basta rodar `php artisan migrate` e depois popular com `php artisan db:seed`.
- Criei rotas adicionais de registro de usuários e logout.
- O middleware de autenticação está funcionando, porém comentado, por conta de não haver login no frontend.
- Não usei JWT, utilizei o token padrão do Laravel.
- O ambiente Docker roda, porém não está 100% construído e integrado com variáveis de ambiente.
- Não entendi muito bem os princípios de desacoplamento e arquitetura hexagonal dentro do projeto Laravel, acredito estar de acordo.


>### Bibliotecas adicionais

- [x] Sanctum: 
-  `composer require laravel/sanctum`
-  `php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider`

