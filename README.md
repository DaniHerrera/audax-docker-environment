# Audax -  Test 
---------------
He desarrollado la práctica en un entorno docker.
1)  Clonar el repositorio en local  
   - Ejecutar: (sudo) git clone https://github.com/DaniHerrera/audax-docker-environment.git
   - (sudo) git checkout master
2) Entrar dentro del directorio audax-docker-environment
   - Ejecutar: docker-compose up -d 
   - Se levantaran los contenedores de nginx, php y mysql
   - En nginx he creado una redirección 404 para cuando no encuentre una página, y para Mysql he creado un script que
     te crea la base de datos { Test_Audax } y la tabla { historial_busquedas }
   - Los puertos utilizados por defecto para que se vean los contenedores en vuestro host son:  4306 MySql y 8085 nginx.
     En caso de generar conflicto con algún servicio; utilizad otro gracias.
3)  Para visualizar el proyecto:  http://localhost:8085/
4)  Para acceder al contenedor mysql:
    docker exec -it mysql8-container bash
    mysql -p (password: secret)
    show databases;
    use Test_Audax;
    show tables;
    select * from historial_busquedas;
    # Y se podrán ver todos los términos buscados.


![index Audax](/images/audax.png)

## Práctica desarrollada en Ubuntu 22.04.1
------------------------------------------

## Instalación docker y docker-compose  ( de DigitalOcean )
## https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-20-04
## https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-compose-on-ubuntu-20-04-es
