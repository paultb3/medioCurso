<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conexion.php';


class modeloUsuario
{

    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::obtenerConexion();
    }

    public function obtenerUsuario()
    {
        $query = $this->conexion->query('select id,username,password,perfil from usuarios');

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertarUsuario($username, $password, $perfil)
    {

        $query = $this->conexion->query('insert into usuarios(username,password,perfil) values (:username, :password, :perfil)');
        $stmt = $this->conexion->prepare($query);

        $stmt->bindParam('username', $username);
        $stmt->bindParam('password', $password);
        $stmt->bindParam('perfil', $perfil);

        return $stmt->execute();
    }
}
