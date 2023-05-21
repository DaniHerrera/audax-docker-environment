# Audax -  Test 
---------------
He desarrollado la práctica en un entorno docker.
1)  Clonar el repositorio en local  
   - Ejecutar: (sudo) git clone https://github.com/DaniHerrera/audax-docker-environment.git
  
2) Entrar dentro del directorio audax-docker-environment
   - git config --global --add safe.directory {{ path_correspondiente }}  ## no se si será obligatorio este paso
   - (sudo) git checkout master
   - Ejecutar: docker-compose up -d 
   - Se levantaran los contenedores de nginx, php y mysql
   - En nginx he creado una redirección 404 para cuando no encuentre una página, y para Mysql he creado un script que
     te crea la base de datos { Test_Audax } y la tabla { historial_busquedas }
   - Los puertos utilizados por defecto para que se vean los contenedores en vuestro host son:  4306 MySql y 8085 nginx.
     En caso de generar conflicto con algún servicio; utilizad otro gracias.
   
3) Acceder al contenedor de php y ejecutar: 
   - docker exec -it php81-container bash
   - composer up  #( instalaremos el autoload PSR-4 Para la conexión Singleton PDO)

4)  Para visualizar el proyecto:  http://localhost:8085/

5)  Para acceder al contenedor mysql y visualizar que las peticiones quedan registradas:
   - docker exec -it mysql8-container bash
   - mysql -p (password: secret)
   - show databases;
   - use Test_Audax;
   - show tables;
   - select * from historial_busquedas;
   - # Y se podrán visualizar todos los términos buscados.


![index Audax](/images/audax.png)

## Práctica desarrollada en Ubuntu 22.04.1
------------------------------------------

## Instalación docker y docker-compose  ( de DigitalOcean )
## https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-20-04
## https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-compose-on-ubuntu-20-04-es

Requerimientos técnicos:
·       La aplicación debe ser desarrollada en HTML5, CSS3, JavaScript y PHP.
·       Se debe utilizar la API pública de Wikipedia (https://www.mediawiki.org/wiki/API:Main_page) para realizar la búsqueda de términos y obtener los resultados.
·       Se deben utilizar eventos de JavaScript para capturar el término de búsqueda ingresado por el usuario y realizar la llamada a la API de Wikipedia.
·       Los resultados obtenidos deben mostrarse en la misma página de manera clara y legible.
·       Se debe crear una base de datos SQL para guardar el historial de búsquedas realizadas por el usuario.
·       Se deben utilizar consultas preparadas de SQL para evitar inyecciones SQL.
·       Se debe utilizar PHP para conectarse a la base de datos y guardar el historial de búsquedas.

Especificaciones técnicas:
·        Se debe utilizar HTML5 para la estructura de la página.
·        Se debe utilizar CSS3 para dar estilo a la página.
·        Se debe utilizar JavaScript para capturar el término de búsqueda ingresado por el usuario y realizar la llamada a la API de Wikipedia.
·        Se debe utilizar PHP para conectarse a la base de datos SQL y guardar el historial de búsquedas.
·        Se debe entregar el código fuente completo de la aplicación.


