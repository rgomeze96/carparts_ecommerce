# Ejecución
## Local
1. Se debe clonar el GitHub del proyecto:

```
git clone https://github.com/rgomeze96/carparts_ecommerce
```
2. En la carpeta raíz del proyecto corre los siguientes comandos para instalar las dependencias del proyecto.

```
composer install
composer update
```
3. Luego, en _XAMPP_ debes iniciar el módulo _Apache_ y el módulo _MySQL_.

4. Conectate a _phpMyAdmin_ y crea una base de datos llamada _car_part_project_.
 
5. Crea el archivo _.env_ basado en el _.env.example_ con los valores correspondiente a la base de datos.
    
- Por defecto se encuentra así:
```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=car_part_project
    DB_USERNAME=root
    DB_PASSWORD=
```
- Puedes ponerle otro nombre a la base de datos pero recuerda cambiarlo en _.env_

6. Ve a tu terminal y sitúate en la ruta donde se encuentre situado el proyecto. Luego ejecuta el siguiente comando para crear las migraciones a la base de datos:

```
php artisan migrate
```
7. En la misma ruta donde estás, ejecuta estos comandos:

```
php artisan key:generate
php artisan storage:link
```
8. Ya puedes hacer uso de la aplicación.

RUTA INICIAL: http://localhost/carparts_ecommerce/public/

## Remota
Para acceder al proyecto vaya al siguiente link: http://34.132.143.252/carparts_ecommerce/public/
