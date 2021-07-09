# project-symfony4
Instalación

1- Clonar repo: https://github.com/tatigoliat/project-symfony4.git

2- Utilizar la rama master: git checkout master

3- Instalar componentes y dependencias ejecutando: composer install

4- Configurar datos de conexión en el archivo .env

5- Crear la base de datos con doctrine: php bin/console doctrine:database:create

6- importar el archivo .sql con doctrine: php bin/console doctrine:database:import resources/sql/user.sql

7.- Ejecutar localhost con el comando:  php bin/console server:run

Usuarios de prueba:
AMIND
	Username: admin
	Password:  adminpassword
PAGE_1
	Username: page1
	Password:  page1
PAGE_2
Username: page2
	Password:  page2

Importante:

Para visualizar la funcionalidad del CRUD, ir al primer commit con descripción “CRUD” utilizando el comando: git checkout afc0fb144fb7047aa6f3547827c066aed3235f89

