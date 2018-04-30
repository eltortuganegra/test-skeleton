# Enunciado

Crear un par de servicios que permite crear y publicar un anuncio. 

Un anuncio está compuesto por una colección de componentes. Estos componentes, por el
momento, queremos que sean del tipo imagen, vídeo o texto; pero en el futuro nos gustaría poder
aumentar este listado. Cada tipo de componente tiene sus peculiaridades: un componente imagen
consta de un enlace a una imagen externa, un formato y un peso; lo mismo pasa con el componente
de tipo vídeo; por otro lado, un componente texto constará de una cadena de texto. Además, todos
ellos comparten unas características: un nombre, una posición en los 3 ejes (x, y, z), un ancho y un
alto.

## Requisitos

Hay 3 estados posibles en un anuncio: published, stopped, publishing.

* Un anuncio no se puede modificar si su estado es publishing.
* Al crear un anuncio todos sus componentes deben ser válidos.
* Solo permitimos imágenes con el formato JPG y PNG.
* Un vídeo solo será válido si está en formato MP4 y WEBM.
* El texto no puede sobrepasar los 140 caracteres.
* Todo componente se debe serializar en formato JSON para poder comunicarnos con la
aplicación de front.

## Especificación
* Los servicios reciben los datos en formato JSON.


### Endpoints

* **/ad/create**

Crea un anuncio.Puede ser contener de 0 a N componentes. 

* **/ad/publish**
Publica un anuncio. Cambia el estado de un anuncio.

## Arrancar el proyecto

php bin/console server:run 
 
## Examples Json for services

* Crear un anuncio sin componentes.

{
	"name": "Stark Industries promo"
}

* Crear un anuncio con un componente de texto.

{
	"name": "Stark Industries promo",
	"components":[
		{
			"type": "TextComponent",
			"name": "Super Ad",
            "position": "10,20,30",
            "width": 50,
            "height": 100,
            "text": "Zombie ipsum reversus ab viral inferno, nam rick grimes malum cerebro."
		}
	]
}

* Crear un anuncio con tres componentes.

{
	"name": "Stark Industries promo",
	"components":[
		{
			"type": "TextComponent",
			"name": "Super Ad",
            "position": "10,20,30",
            "width": 50,
            "height": 100,
            "text": "Zombie ipsum reversus ab viral inferno, nam rick grimes malum cerebro."
		},
		{
			"type": "ImageComponent",
			"name": "Super Ad",
            "position": "10,20,30",
            "width": 50,
            "height": 100,
            "linkToExternalImage": "http://wanna-joke.com/wp-content/uploads/2015/11/programmers-meme-no-errors.jpg",
            "format": "jpg",
            "size": 1000
		},
		{
			"type": "VideoComponent",
			"name": "Super Ad",
            "position": "10,20,30",
            "width": 50,
            "height": 100,
            "linkToExternalImage": "http://wanna-joke.com/wp-content/uploads/2015/11/programmers-meme-no-errors.jpg",
            "format": "mp4",
            "size": 1000
		}
	]
}



# test-skeleton

Este es el repositorio para la prueba técnica de SunMedia, puedes usar este skeleton o hacerlo tu mismo.


## Docker (opcional)

En este repositorio tienes configurado una composición de contenedores docker que puedes utilizar, para ello tienes que tener instalado docker y docker-compose.

Para acceder al contenedor del servidor web: 

  - **docker-compose exec --user application webserver bash**
  
Para acceder al contenedor del servidor de la base de datos: 

  - **docker-compose exec database bash**
  
Los puertos expuestos:

  - **Servidor web**: 80
  - **Servidor base de datos**: 3306
  
Base de datos: sunmedia

Usuarios:

  - nombre de usuario: **root**
  - password: **root**
  

  - nombre de usuario: **sunmedia**
  - password: **sunmedia**
  
  
