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
        $queryCheck = "SELECT COUNT(*) FROM usuarios WHERE username = :username";
        $stmtCheck = $this->conexion->prepare($queryCheck);
        $stmtCheck->bindParam(':username', $username);
        $stmtCheck->execute();

        if ($stmtCheck->fetchColumn() > 0) {
            return "El usuario ya existe.";
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO usuarios(username, password, perfil) VALUES (:username, :password, :perfil)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':perfil', $perfil);

        if ($stmt->execute()) {
            return "Usuario registrado correctamente.";
        } else {
            return "Error al insertar el usuario.";
        }
    }


    public function eliminarUsuarioPorNombre($username)
    {

        $query = "DELETE FROM usuarios WHERE username = :username";

        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':username', $username);
        return $stmt->execute();
    }


    public function actualizarUsuario($id, $username, $password, $perfil)
    {
        $queryGetPassword = "SELECT password FROM usuarios WHERE id = :id";
        $stmtGetPassword = $this->conexion->prepare($queryGetPassword);
        $stmtGetPassword->bindParam(':id', $id);
        $stmtGetPassword->execute();
        $currentPassword = $stmtGetPassword->fetchColumn();

        $hashedPassword = $currentPassword;
        if (!empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        }

        // Actualizar los datos del usuario
        $query = "UPDATE usuarios SET username = :username, password = :password, perfil = :perfil WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':perfil', $perfil);

        return $stmt->execute();
    }


    public function obtenerUsuarioPorNombre($username)
    {

        $query = "SELECT id, username, password, perfil FROM usuarios  WHERE username = :username";

        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function validarUsuario($username, $password)
    {
        $query = "SELECT id, perfil, password FROM usuarios WHERE username = :username";

        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($password, $usuario['password'])) {
            return [
                'id' => $usuario['id'],
                'perfil' => $usuario['perfil']
            ];
        }
        return null;
    }
}
