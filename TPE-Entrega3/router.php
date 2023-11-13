<?php
    require_once 'config.php';
    require_once 'libs/router.php';

    require_once 'app/controllers/pelicula.api.controller.php';

    $router = new Router();

    #                 endpoint      verbo     controller           método
    $router->addRoute('pelicula',     'GET',    'PeliculaController', 'get'   ); # TaskApiController->get($params)
    $router->addRoute('pelicula',     'POST',   'PeliculaController', 'create');
    $router->addRoute('pelicula/:ID', 'GET',    'PeliculaController', 'get'   );
    $router->addRoute('pelicula/:ID', 'PUT',    'PeliculaController', 'update');
    $router->addRoute('pelicula/:ID', 'DELETE', 'PeliculaController', 'delete');
    
    $router->addRoute('user/token', 'GET',    'UserApiController', 'getToken'   ); # UserApiController->getToken()
    
    #               del htaccess resource=(), verbo con el que llamo GET/POST/PUT/etc
    $router->route($_GET['resource']        , $_SERVER['REQUEST_METHOD']);