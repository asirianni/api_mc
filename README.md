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

finalizadas la instalacion de dependencias y migraciones. Corra el servidor con el siguiente comando

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





## Authors

* **Adrian Sirianni** - *Analista Tecnico Programador* -
