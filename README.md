# api_mc

API REST MECUBRO


## Getting Started

Servicio Desarrollado en Laravel 8

### Pre-requisitos

Verifique que su equipo tenga instalado las siguientes versiones. Abra una consola cmd  o terminal powershell:

```
php -v // PHP 7.4.27
composer -v // Version 2.2.1
git --version // version 2.34.1.windows.1

```

### Instalacion

Abra consola y por terminal seleccionar la ruta donde se va a clonar el proyecto. 

```
cd documents
```

crear carpeta en la ruta seleccionada con el siguiente comando

```
mkdir mecubro
```

ingresar a la carpeta

```
cd mecubro
```

Iniciar repositorio en la carpeta

```
git init .
```

agregar la ruta de clonacion con el siguiente comando

```
git remote add origin https://github.com/asirianni/api_mc.git
```

clonar proyecto

```
git pull origin main
```

Es posible que El sistema solicitara sus credenciales de acceso al repositorio git 

```
abra una ventana del browser cuando se lo solicite, logguese y luego cierre la pestaña asi corre el proceso por consola.
```

finalizada la clonacion corra el siguiente comando para instalar las dependencias

```
composer install
```

Editar el archivo .env en el proyecto con los datos de acceso de su base de datos local

```
DB_DATABASE=XXXXXX
DB_USERNAME=XXXXXX
DB_PASSWORD=XXXXXX
```

En una consola correr el siguiente comando 

```
php artisan migrate
```

El sistema mostrara las migraciones creadas en la base de datos

```
Migration table created successfully.
Migrating: 2022_11_15_175801_create_types_user_table
Migrated:  2022_11_15_175801_create_types_user_table (18.72ms)
Migrating: 2022_11_15_175838_create_activities_table
Migrated:  2022_11_15_175838_create_activities_table (12.67ms)
Migrating: 2022_11_15_175905_create_quotes_table
Migrated:  2022_11_15_175905_create_quotes_table (12.32ms)
Migrating: 2022_11_15_175926_create_state_quotes_table
Migrated:  2022_11_15_175926_create_state_quotes_table (11.79ms)
Migrating: 2022_11_15_175942_create_valuations_table
Migrated:  2022_11_15_175942_create_valuations_table (12.30ms)
Migrating: 2022_11_15_180145_add_campos_to_users
Migrated:  2022_11_15_180145_add_campos_to_users (421.65ms)

```

Luego ejecutar los seeders de las tablas

```
php artisan db:seed

```

El sistema mostrara aviso de ejecucion de los registros insertados en las tablas de estado 

```
Seeding: Database\Seeders\TypesUserSeeder
Seeded:  Database\Seeders\TypesUserSeeder (51.54ms)
Seeding: Database\Seeders\StateQuotesSeeder
Seeded:  Database\Seeders\StateQuotesSeeder (17.88ms)
Seeding: Database\Seeders\ActivitiesSeeder
Seeded:  Database\Seeders\ActivitiesSeeder (12.10ms)
```


finalizadas la instalacion de dependencias y migraciones y seeders; Corra el servidor con el siguiente comando

Si tiene un orquestador de contenedores LAMP levante el orquestador con el siguiente comando. Siempre parado en la ruta del proyecto del docker-compose.yml

```
[ruta/del/proyecto] sudo docker compose up -d 
```

Opcional si no dispone de docker, 

```
php artisan serve
```

El servidor estara corriendo en el puerto 8000

```
PHP 7.4.27 Development Server (http://127.0.0.1:8000) started
```


## API

## USUARIOS

* POST / http://localhost:8000/api/login

Body
```
    {
        "email": "sirianni.adrian@gmail.com",
        "password": "cirilo1128"
    }
```
Resp
```
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9sb2dpbiIsImlhdCI6MTY2ODU1MjE3NSwiZXhwIjoxNjY4NTU1Nzc1LCJuYmYiOjE2Njg1NTIxNzUsImp0aSI6IlhUZ3FHclZWdExXeUxFMXciLCJzdWIiOiIxIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.yvsXkiRAWDSZ9dCKNdSTPQHW0D1aNwmnwgOilibmG34"
}
    
```

* POST / http://localhost:8000/api/register

Body
```
    {
    "name" :  "Federico",
    "email" :  "fede@gmail.com",
    "password" :  "fede",
    "password_confirmation" :  "fede",
    "surname" :  "Molina",
    "type" :  1

    }
```
Resp
```
{
    "user": {
        "name": "Federico",
        "email": "fede@gmail.com",
        "surname": "Molina",
        "id_type": 1,
        "updated_at": "2022-11-15T22:45:02.000000Z",
        "created_at": "2022-11-15T22:45:02.000000Z",
        "id": 3
    },
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9yZWdpc3RlciIsImlhdCI6MTY2ODU1MjMwMiwiZXhwIjoxNjY4NTU1OTAyLCJuYmYiOjE2Njg1NTIzMDIsImp0aSI6IjBROUhvUXZibzV0YnM2RmEiLCJzdWIiOiIzIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.yyTwbw1qWtVSlv6YOH9fAqz8AZHLMr7efyJehKd1LUk"
}
    
```

 GET / http://localhost:8000/api/profile


```
    Authorization
    Bearer Token
    Token
    <token>
```
Resp
```
{
    {
        "status": "Token is Expired"
    }

    or 

    {
        "user": {
            "id": 1,
            "name": "Adrian",
            "email": "sirianni.adrian@gmail.com",
            "email_verified_at": null,
            "surname": null,
            "id_type": null,
            "birth": null,
            "id_activitie": null,
            "address": null,
            "location": null,
            "province": null,
            "country": null,
            "created_at": "2022-11-14T22:09:30.000000Z",
            "updated_at": "2022-11-14T22:09:30.000000Z"
        }
    }
}
    
```

PUT / http://localhost:8000/api/user


```
    Authorization
    Bearer Token
    Token
    <token>

    {
        "address":"billingurs 144",
        "id_type":1,
        "birth":"1985-12-13",
        "id_activitie":1
    }
```
Resp
```
{
    {
        "status": "Token is Expired"
    }

    or 

    {
        "update": true,
        "user": {
            "id": 1,
            "name": "Adrian",
            "email": "sirianni.adrian@gmail.com",
            "email_verified_at": null,
            "surname": null,
            "id_type": 1,
            "birth": "1985-12-13",
            "id_activitie": 1,
            "address": "billingurs 144",
            "location": null,
            "province": null,
            "country": null,
            "created_at": "2022-11-14T22:09:30.000000Z",
            "updated_at": "2022-11-16T14:46:55.000000Z"
        }
    }
}
    
```

## Authors

* **Adrian Sirianni** - *Analista Tecnico Programador* -
