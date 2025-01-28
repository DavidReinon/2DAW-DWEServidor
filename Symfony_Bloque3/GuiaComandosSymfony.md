# Guia de Comandos Symfony (con Doctrine y Twig)

Concectar a Docker en Terminal local con:

docker exec -it 6262cb9f2316165 bash


## 1. Empezar Proyecto

symfony new --webapp my_project_name

symfony new my_project_name --webapp


## 2. Gestion BD

Ver todos los comandos de los que disponemos: 
php bin/console list doctrine

### - Instalar dependencias si no lo has hecho.
composer require symfony/orm-pack

(No hace falta de normal, si ya has iniciado con parametro --webapp):
composer require --dev symfony/maker-bundle

### - Configurar .env
DATABASE_URL="mysql://db_user:db_password@127.18.0.1:3306/db_name?serverVersion=10.11.2-MariaDB&charset=utf8mb4
?serverVersion=5.7“

-----
Ejemplo Real: DATABASE_URL="mysql://root:root@172.18.0.1:3306/tiendaOnline?serverVersion=10.11.2-MariaDB&charset=utf8mb4"

• db_user = usuario de acceso a la BB.DD.

• db_password = contraseña de acceso a la BB.DD.

• db_name = nombre de la BB.DD.

### - Crear DB
php bin/console doctrine:database:create

### - Crear ENTIDADES
php bin/console make:entity nombre_entidad

--------
Si decidimos modificar el código de la entidad agregando nuevas
propiedades, podemos volver a generar los métodos getter y setter de forma
automática con el comando:

php bin/console make:entity--regenerate

Si queremos que regenere todos los métodos getter y setter debemos usar
también:

php bin/console make:entity--overwrite

### - RELACIONES entre dos Entidades
1. Ejecutamos: php bin/console make:entity nombre_entidad_yaCreada

2. En el nombre indicamos una de las entidades ya creadas

3. En el Tipo indicamos tipo 'relation'

4. En el paso de ClaseRelacionada inicamos la entidad con la que queremos relacionar
   (distinta a **nombre_entidad_yaCreada**)

### - MIGRACION de Entidades a Tablas de DB
php bin/console make:migration

php bin/console doctrine:migrations:migrate

----
Al modificar alguna entidad volver a repetir los comandos, 
para crear otro archivo de migración y posteriormente ejecutarlo.


## 3. Gestion Proyecto

### - Iniciar en Local
symfony server:start

php–S localhost:8000

### - Crear CRUD de ENTIDAD
**Metodos y Vista**:
php bin/console make:crud Nombre_Entidad

### - Crear Controlador
php bin/console make:controller NewController


## 4. API concretamente

### - Contenido de endpoints en Controlador
os diferentes endpoints con metodos CRUD. o 

GET, POST, PUT - (PATCH), DELETE

Patch = Put/Update parcial.


## 5. Ayuda

### - Debugear Rutas
php bin/console debug:router

php bin/console debug:router nombre_ruta