## Sobre a aplicação

- PHP >=7.3
- Laravel 8

Para criação do banco de dados, rodar o comando abaixo:

```
CREATE DATABASE nomedobanco; 
```

- Alterar as configurações da conexão do banco
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

Para executar a aplicação, seguir os passos abaixo:

- Cria as dependencias necessarias para o funcionamento da aplicação
```
composer install
```

- Cria a chave da aplicação
```
php artisan key:generate
```

- Cria as tabelas e popula o banco atraves das migrations
```
php artisan migrate --seed
```

- Para startar a aplicação
```
php artisan serve
```
