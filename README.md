# Meganegocios Vip

_Hecha de acuerdo a los requerimiento del cliente Meganegocios Vip, se realizo un pagina autoadministrable en la cual se puedan agregar Productos y luego los usuarios puedan suscribirse a los distintos planes que le ofrecen beneficios para  comprar los productos de su preferencia.
Especial agradecimeinto a Meganegocios Vip por la oportunidad de poder brindarles una solución a su emprendimiento._

## Comenzando 🚀

_Estas instrucciones te permitirán obtener una copia del proyecto en tu máquina local para propósitos de desarrollo y pruebas._

### Pre-requisitos 📋

_Este proyecto se realizo utilizando el framework Laravel-8, Tailwind, AlpineJs, Livewire y PHP 7.4 ._

```
composer global require laravel/installer 
```
```
https://www.apachefriends.org/download.html 
```

### Instalación 🔧

_Paso a paso para clonar este entorno de desarrollo_


_1. Copiar la dirección HTTPS del repositorio, en la opción de clonar:_

```
https://github.com/jeison-git/vip.git
```

_2. Después en la consola de comandos de Git Bash o la Terminal CMD,  una ves dentro de la carpeta donde clonarás tu repositorio. Ejecute el comado:_

```
git clone https://github.com/jeison-git/vip.git
```

_3. En la carpeta del proyecto que acabas de clonar, desde consola  ejecuta el comando: composer install (debe tener instalado el gestor de paquetes Composer).
Esto descargará e instalará las dependencias utilizadas por el proyecto._

```
composer install
```

_4. Lo siguiente es copiar el contenido del archivo .env.example en un nuevo archivo con el nombre .env._

```
copy .env.example .env
```

_5. Abrir el archivo .env y agregar el nombre de la base de datos que creo, en el parametro "DB_DATABASE" , nombre de usuario "DB_USERNAME" y su contraseña "DB_PASSWORD".
Llene los campo correspondiente deacuerdo a su configuración preferida.
De forma predeterminada, el nombre de usuario es root y puede dejar el campo de contraseña vacío. (Esto es para Xampp)._

_6. Desde consola ejecutar el comando:  npm install (debe tener instalado Node.js)._

```
npm install
```

_7. Generar APP_KEY, La APP_KEY es una cadena de carácteres generada aleatoriamente por Laravel que se utiliza para todas las cookies cifradas, como las cookies de sesión. Para generar la APP_KEY del proyecto ejecutar el siguiente comando:_

```
 php artisan key:generate
```

_8. Desde consola ejecutar el comando: php artisan migrate (Para crear todas las tablas y relaciones del proyecto, dentro de la bases de datos que creo y espesífico en el archivo .env)._

```
php artisan migrate
```
_9. El siguiente paso es dirigirse al directorio "storage\app\public" y crear dos carpetas, una llamada " cursos " y la otra " resources ". Luego ejecutar el siguiente comando que creara los enlaces o links simbolicos entre storage y public:_

```
php artisan storage:link
```

_10. El siguiente comando a ejecutar llenara con datos de prueba la base de datos del proyecto (La mayoria de los datos de prueba son importantes, ya que estos le ahorrarian tiempo, evitando tener que llenar los crub manualmente). Ejecute:_

```
php artisan migrate:fresh --seed
```

_11. Ir a localhost y ver el proyecto_


## [MeganegociosVip.com](https://meganegociosvip.com) - Si quieres visitar este proyecto, Let's Go. 🖇️

## Construido con 🛠️

_Herramientas que utilize para crear el proyecto_

* [Laravel](https://laravel.com/docs) - El framework web usado.
* [VisualStudioCode](https://code.visualstudio.com/Download) - Editor de codigo
* [Composer](https://getcomposer.org/download/) - Usado para gestionar las dependencias.
* [Xampp](https://www.apachefriends.org/download.html ) - Servicios independientes.
* Entre otros ;)

---
⌨️ Por [jeison-git](https://github.com/jeison-git) 😊
