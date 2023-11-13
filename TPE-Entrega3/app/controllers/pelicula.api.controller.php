<?php

require_once './app/controllers/api.controller.php';
require_once './app/helpers/auth.api.helper.php';
require_once './app/models/pelicula.model.php';

class PeliculaController extends ApiController
{
    private $model;
    private $authHelper;

    public function __construct()
    {
        parent::__construct();
        $this->model = new PeliculaModel();
        $this->authHelper = new AuthHelper();
    }
    function get($params = []) {
        // Obtener parámetros de paginación
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $pageSize = isset($_GET['pageSize']) ? intval($_GET['pageSize']) : 10;
    
        if (empty($params)) {
            $sort = isset($_GET['sort']) ? $_GET['sort'] : null;
            $order = isset($_GET['order']) ? $_GET['order'] : 'ASC';
    
            $orderQuery = '';
            $acceptedOrders = ['ASC', 'DESC'];
    
            if (isset($sort)) {
                if ($this->model->peliculaTieneColumna($sort) && in_array(strtoupper($order), $acceptedOrders)) {
                    $orderQuery = 'ORDER BY ' . $sort . ' ' . $order;
                } else {
                    $this->view->response(['response' => 'Bad Request'], 400);
                    return;
                }
            }
    
            // Agregar parámetros de paginación
            $offset = ($page - 1) * $pageSize;
            $orderQuery .= " LIMIT $pageSize OFFSET $offset";
    
            $peliculas = $this->model->getPeliculas($orderQuery);
            $this->view->response($peliculas, 200);
        } else {
            $id = $params[':ID'];
            $pelicula = $this->model->getPelicula($id); 
             if ($pelicula) {
                $this->view->response($pelicula, 200);
            } else {
                $this->view->response(
                    ['error' => 'la tarea con el id ' . $id . ' no existe'],
                    404
                );
            }
        }
    }

    

    public function delete($params = [])
    {
        $id = $params[':ID'];
        $pelicula = $this->model->getPelicula($id);
        if ($pelicula) {
            $this->model->deletePelicula($id);
            $this->view->response('La pelicula con id=' . $id . ' ha sido borrada', 200);
        } else {
            $this->view->response('La pelicula con id=' . $id . ' no existe', 404);
        }
    }

    public function create($params = [])
    {
        $body = $this->getData();
        $titulo = $body->titulo;
        $director = $body->director;
        $fechaLanzamiento = $body->fechaLanzamiento;
        $sinopsis = $body->sinopsis;
        $id_usuario = $body->id_usuario;

        if (empty($titulo) || empty($director) || empty($fechaLanzamiento) || empty($sinopsis) || empty($id_usuario)) {
            $this->view->response("Complete los datos", 400);
        } else {
            $id = $this->model->insertPelicula($titulo, $director, $fechaLanzamiento, $sinopsis, $id_usuario);
            $pelicula = $this->model->getPelicula($id);
            $this->view->response($pelicula, 201);
        }
    }

   public function update($params = [])
{
    $id = $params[':ID'];
    $pelicula = $this->model->getPelicula($id);
    
    if ($pelicula) {
        $body = $this->getData();
        $titulo = isset($body->titulo) ? $body->titulo : null;
        $director = isset($body->director) ? $body->director : null;
        $fechaLanzamiento = isset($body->fechaLanzamiento) ? $body->fechaLanzamiento : null;
        $sinopsis = isset($body->sinopsis) ? $body->sinopsis : null;

        
        $this->model->actualizarPelicula($id, $titulo, $director, $fechaLanzamiento, $sinopsis);
        $this->view->response('La pelicula con id=' . $id . ' ha sido modificada', 200);
    } else {
        $this->view->response('La pelicula con id=' . $id . ' no existe', 404);
    }
}

}