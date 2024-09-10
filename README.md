# Proyecto Laravel - Backend Evaluación de Proyectos

Este es el README del proyecto Laravel Backend Evaluación de Proyectos. Aquí encontrarás instrucciones sobre cómo instalar y levantar el proyecto, así como crear la imagen Docker.

## Instalación

1. Clona el repositorio en tu máquina local:

```bash
git clone https://github.com/tu-usuario/backend-evaluacion-proyectos.git
```

2. Navega al directorio del proyecto:

```bash
cd backend-evaluacion-proyectos
```

3. Instala las dependencias del proyecto:

```bash
composer install
```

4. Crea un archivo `.env` basado en el archivo `.env.example` y configura las variables de entorno necesarias.

5. Genera una nueva clave de aplicación:

```bash
php artisan key:generate
```
6. Configurar la base de datos en el archivo `.env`

```bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

## Levantar el proyecto

1. Ejecuta el siguiente comando para levantar el servidor de desarrollo:

```bash
php artisan serve
```

2. Accede a la aplicación en tu navegador web utilizando la URL proporcionada por el comando anterior.

## Crear la imagen Docker

1. Asegúrate de tener Docker instalado en tu máquina.

2. Navega al directorio del proyecto:

```bash
cd backend-evaluacion-proyectos
```

3. Construye la imagen Docker ejecutando el siguiente comando:

```bash
docker build -t nombre-imagen .
```

4. Una vez que la imagen se haya construido correctamente, puedes ejecutar un contenedor basado en ella:

```bash
docker run -p 8000:8000 nombre-imagen
```

5. Accede a la aplicación en tu navegador web utilizando `localhost:8000`.
