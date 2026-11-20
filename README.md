
# MULTIBELAND-CODEIGNITER4

<p align="center">
  <strong>Proyecto base desarrollado con CodeIgniter 4</strong>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-7.4%20%7C%208.x-777BB4?logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/CodeIgniter-4-EF4223?logo=codeigniter&logoColor=white" alt="CodeIgniter 4">
  <img src="https://img.shields.io/badge/MySQL-MariaDB-4479A1?logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/Composer-Dependencies-885630?logo=composer&logoColor=white" alt="Composer">
</p>

---

## Descripción

Repositorio base de un proyecto web desarrollado utilizando el framework **CodeIgniter 4**, diseñado como punto de partida para el desarrollo, mantenimiento y personalización de aplicaciones web en PHP.

El proyecto utiliza la estructura estándar de CodeIgniter 4, separando la lógica de aplicación, los recursos públicos, las pruebas y los componentes del framework.

## Tecnologías

- **PHP:** Lenguaje de programación backend.
- **CodeIgniter 4:** Framework PHP basado en MVC.
- **Composer:** Gestor de dependencias PHP.
- **MySQL / MariaDB:** Sistema de gestión de bases de datos, según las necesidades de la aplicación.
- **Apache:** Servidor web utilizado para el entorno de desarrollo local.

## Estructura del proyecto

```text
MULTIBELAND-CODEIGNITER4/
├── app/                  # Aplicación: configuración, controladores, modelos y vistas
├── public/               # Punto de entrada y recursos públicos
├── system/               # Núcleo del framework CodeIgniter 4
├── tests/                # Pruebas automatizadas
├── writable/             # Caché, logs, sesiones y archivos generados
├── .gitignore            # Archivos excluidos de Git
├── .htaccess             # Configuración Apache
├── composer.json          # Dependencias del proyecto
├── composer.lock          # Versiones de dependencias
├── preload.php            # Archivo de precarga
├── phpunit.xml.dist       # Configuración de PHPUnit
└── spark                 # CLI de CodeIgniter
```

## Requisitos

Para ejecutar el proyecto en un entorno local se recomienda disponer de:

- PHP compatible con la versión de CodeIgniter 4 utilizada.
- Apache.
- Composer.
- MySQL o MariaDB, si la aplicación requiere base de datos.
- XAMPP para el entorno de desarrollo local en Windows.

Las extensiones PHP requeridas dependerán de la configuración y funcionalidades de la aplicación.

## Instalación local

### 1. Clonar el repositorio

Desde una terminal, ubicarse en el directorio `htdocs` de XAMPP:

```bash
cd C:\xampp\htdocs
```

Clonar el repositorio:

```bash
git clone https://github.com/karlosystem/MULTIBELAND-CODEIGNITER4.git
```

Ingresar al proyecto:

```bash
cd MULTIBELAND-CODEIGNITER4
```

### 2. Instalar dependencias

Ejecutar Composer:

```bash
composer install
```

Este comando instala las dependencias definidas en `composer.json` y `composer.lock`.

### 3. Configurar el entorno

Copiar el archivo de configuración de entorno de CodeIgniter:

```bash
copy env .env
```

Si el archivo `env` no está disponible en el repositorio, utilizar la plantilla de configuración correspondiente a la versión instalada de CodeIgniter 4.

Editar el archivo `.env` y configurar los parámetros necesarios para el entorno local.

Ejemplo:

```ini
CI_ENVIRONMENT = development

app.baseURL = 'http://localhost/MULTIBELAND-CODEIGNITER4/public/'
```

La configuración de `baseURL` debe ajustarse según la configuración del servidor web y la estructura de despliegue.

### 4. Configurar la base de datos

Si la aplicación utiliza base de datos, configurar las credenciales en el archivo `.env`.

Ejemplo:

```ini
database.default.hostname = localhost
database.default.database = nombre_base_datos
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

Reemplazar los valores por los correspondientes al entorno local.

### 5. Ejecutar el proyecto

Con Apache iniciado desde XAMPP, acceder a la aplicación según la configuración del entorno.

Ejemplo de acceso:

```text
http://localhost/MULTIBELAND-CODEIGNITER4/public/
```

También es posible utilizar el servidor de desarrollo integrado de CodeIgniter:

```bash
php spark serve
```

Por defecto, el servidor de desarrollo permite acceder mediante:

```text
http://localhost:8080
```

## Comandos útiles

| Comando | Descripción |
|---|---|
| `composer install` | Instala las dependencias |
| `php spark serve` | Inicia el servidor de desarrollo |
| `php spark` | Consulta los comandos disponibles de CodeIgniter |
| `php spark routes` | Lista las rutas registradas |
| `php spark migrate` | Ejecuta las migraciones, si están configuradas |

## Seguridad

El repositorio excluye archivos y elementos que no deben versionarse, incluyendo:

- Archivo `.env`.
- Dependencias instaladas en `vendor/`.
- Archivos temporales y caché.
- Logs y archivos generados.
- Información privada del entorno local.

Las credenciales, configuraciones privadas y datos sensibles deben mantenerse fuera del repositorio.

## Desarrollo

Este repositorio sirve como base para desarrollar y ampliar aplicaciones web utilizando CodeIgniter 4.

Las funcionalidades, módulos, controladores, modelos, vistas y configuraciones pueden adaptarse según los requerimientos de cada proyecto.

## Autor

**Carlos Alberto Marquina Chuquihuaccha**

GitHub: [@karlosystem](https://github.com/karlosystem)

---

<p align="center">
  Proyecto desarrollado con PHP y CodeIgniter 4.
</p>
