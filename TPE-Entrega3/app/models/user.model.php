<?php
require_once './app/models/model.php';
class UserModel extends Model {
    function __construct()
    {
        parent::__contruct();
    }

    public function getByUsername($username) {
        try {
            // Preparar la consulta
            $query = $this->db->prepare('SELECT * FROM usuario WHERE nombre = ?');
            // Ejecutar la consulta con el parámetro
            $query->execute([$username]);
            // Obtener el usuario como objeto
            return $query->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die('Error al obtener el usuario: ' . $e->getMessage());
        }
    }
}
?>
