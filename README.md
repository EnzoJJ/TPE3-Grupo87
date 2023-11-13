# TPE3-Grupo87
Trabajo Practico especial- WEB 2- Grupo: 87
Enzo Joaquin Jatip: enzojatip@gmail.com

Tema: Informacion de peliculas

Descripcion: Esta pagina va a ser dedicada a brindar información y recomendaciones de películas para ayudar a los aficionados al cine a tomar decisiones informadas sobre qué películas ver. Aquí encontrarás recomendaciones recomendaciones para una amplia variedad de películas de diferentes géneros y épocas. Nuestro objetivo es ser una fuente confiable para los amantes del cine, ofreciendo una visión completa y objetiva de las películas que cubrimos.

El diagrama entidad relación (DER) del modelo de datos planteado: 
![35fdfed2-42ed-48a1-a015-27f771af0724](https://github.com/EnzoJJ/TPE-89/assets/114018093/155519cc-85dd-48a8-ab8b-704892bec34d)

-ENDPOINTS: 

  Peliculas: 
    Cada pelicula se va a mostrar de esta forma.
      {
        "id_pelicula": 8,
        "Titulo": "La isla siniestra",
        "Director": "Martin Scorsese",
        "FechaDeLanzamiento": "2010-02-18",
        "Sinopsis": "Verano de 1954. Los agentes judiciales Teddy Daniels y Chuck Aule son enviados a una remota isla del puerto de       
        Boston para investigar la desaparición de una       
        peligrosa asesina recluida en el hospital psiquiátrico Ashecliffe, un centro penitenciario para cr",
        "id_usuario": 1
    }


  Listar todas las peliculas:
  
  -GET:/api/pelicula
  Este endpoint devuelve la lista completa de peliculas de la base de datos.

  Listar pelicula por id: 
  
  -GET:/api/pelicula/:id
  Este endpoint devuelve la pelicula con el id indicado.

  Agregar Pelicula:
  
  -POST:/api/pelicula
  
  Este endpoint recibe un JSON en el body del HTTP Request en este formato:
  POST: {
    "titulo": "Nuevoo título",
    "director": "Nuevo director",
    "fechaLanzamiento": "2023-11-10",
    "sinopsis": "Nueva descripción de la película",
    "id_usuario":2
  }

  Editar Pelicula:
  
  -PUT:/api/pelicula/:id 
  Este endpoint recibe un JSON parecido al anterior, y modifica el elemento con ese id.
  PUT: {
    "titulo": "Nuevo título",
    "director": "Nuevo director",
    "fechaLanzamiento": "2023-11-10",
    "sinopsis": "Nueva descripción de la película"
  }

  Parametros de ordenamiento:
  
  Al solicitar la lista de peliculas(GET:/pelicula) 
  
  Ordenar de forma ascendente:
  
  -GET:api/pelicula?sort=CampoDeseado&order=ASC 
  
  Ordenar de forma descendente:
  
  -GET:api/pelicula?sort=CampoDeseado&order=DESC

  Ejemplo ordenar por fecha:

  -GET:api/pelicula?sort=FechaDeLanzamiento&order=DESC

  Paginar:
  
  GET:/api/pelicula?page=1&pageSize=2 (esto es si quieres probar otros tamaños o ver otra "pagina" pero ya el codigo tiene un limite de
  10 peliculas por pagina).

  Este es un ejemplo para ordenar las peliculas y a la vez elegir el tamaño y la pagina
  
  GET:/api/pelicula?sort=Titulo&order=ASC&page=1&pageSize=10
