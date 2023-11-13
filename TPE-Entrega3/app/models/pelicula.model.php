<?php
require_once './app/models/model.php';

class PeliculaModel extends Model{
    function getPeliculas($orderQuery = ''){
        $query = $this->db->prepare('SELECT * FROM pelicula '.$orderQuery);
        $query->execute();
        $peliculas = $query->fetchAll(PDO::FETCH_OBJ);
        return $peliculas;
    }

    function getPelicula($id){
        $query = $this->db->prepare('SELECT * FROM pelicula WHERE id_pelicula=?');
        $query->execute([$id]);
    
        $peliculas = $query->fetch(PDO::FETCH_OBJ);
    
        return $peliculas;
    }
    function insertPelicula($titulo, $director, $fechaLanzamiento, $sinopsis, $id_usuario) {
        $query = $this->db->prepare('INSERT INTO pelicula (Titulo, Director, FechaDeLanzamiento, Sinopsis, id_usuario) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$titulo, $director, $fechaLanzamiento, $sinopsis, $id_usuario]);
    
        return $this->db->lastInsertId();
    }
    
    

    function deletePelicula($id_pelicula){
        $query = $this->db->prepare('DELETE FROM pelicula WHERE id_pelicula = ?');
        $query->execute([$id_pelicula]);
    
    }
    public function actualizarPelicula($id_pelicula, $titulo, $director, $fechaLanzamiento, $sinopsis){
        $query=$this->db->prepare('UPDATE pelicula SET Titulo=?, Director=?,fechaDeLanzamiento=?, Sinopsis=? WHERE id_pelicula=?');    
        $query->execute([$titulo, $director, $fechaLanzamiento, $sinopsis, $id_pelicula]);
    }
    function peliculaTieneColumna($column){
        $query = $this->db->prepare("DESCRIBE pelicula");
        $query->execute();
        $columnas = $query->fetchAll(PDO::FETCH_COLUMN);
  
        return in_array($column,$columnas);
      }
}