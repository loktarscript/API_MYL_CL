
# API cartas Mitos y Leyendas

## PHP 8.1 / Laravel 9.1

- [Puedes acceder a toda la documentación del framework acá](https://laravel.com/docs/9.x).

### Instalation

* Clone proyect

```sh
$ git@github.com:loktarscript/API_MYL_CL.git
```

* Instalar dependencias dentro de la carpeta del repositorio:

```sh
$ cd API_MYL_CL
$ composer install
$ npm install
```

### Configuration

* Crear archivo .env
```sh
$ cp .env.example .env
```

* Configura el arhivo .env con la conexión a la base de datos local.
```php
DB_DATABASE=db_name
DB_USERNAME=db_user
DB_PASSWORD=db_pw
```

* Crear app key
```sh
$ php artisan key:generate
```

* Poblar database
 ```sh
$ php artisan migrate:fresh --seed
```

* Generar KEY para JWT
```sh
php artisan jwt:secret
```


## License Laravel

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
