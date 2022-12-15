<?php

class ClientesModel extends Conexion { 

    private $table;
    private $conexion;

    public function __construct() {
        $this->table = "clientes";
        $this->conexion = $this->getConexion();
    }

     function comprobarusuclave($nombre, $clave) {
        $consulta = "select * from clientes where nombre= ?";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $nombre);
            $sentencia->execute();
            if ($sentencia->rowCount() == 1) { //existe usu
                $row = $sentencia->fetch();
                if (password_verify($clave, $row['clave'])) {
                    // "Validado. Clave correcta.";
                    return new Clientes($row['idcliente'],
                            $row['perfil'],
                            $row['nombre'],$row['direccion'],$row['email'],
                            $row['clave'],$row['telef'],$row['fechaalta']); 
                } else {
                    return "Usuario existe. Clave incorrecta.";
                }
            } else {
                return "Usuario " . $nombre . " no existe.";
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    
    public function getClientenombre($nombre) {
        try {
            $sql = "select * from $this->table where nombre=?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $nombre);
            $sentencia->execute();
            $row = $sentencia->fetch();
            if ($row) {
                $cliente = new Clientes($row['idcliente'],
                        $row['perfil'], $row['nombre'],
                        $row['direccion'], $row['email'],
                        $row['clave'], $row['telef'],
                        $row['fechaalta']);
                return $cliente;
            }

            return null;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getCliente($nombre) {
        try {
            $sql = "select * from $this->table where nombre=?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $nombre);
            $sentencia->execute();
            $registros = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $registros;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    
    public function insertaCliente($perfil, $nombre, $direccion,
            $email, $clave, $telef, $fechaalta) {

        $consulta = "insert into clientes (perfil, nombre, direccion, email, clave, telef, fechaalta) "
                . " values(?, ?, ?, ?, ?, ?, ?)";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $password = password_hash($clave, PASSWORD_DEFAULT);
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $perfil);
            $sentencia->bindParam(2, $nombre);
            $sentencia->bindParam(3, $direccion);
            $sentencia->bindParam(4, $email);
            $sentencia->bindParam(5, $password);
            $sentencia->bindParam(6, $telef);
            $sentencia->bindParam(7, $fechaalta);
            $num = $sentencia->execute();
            return $conn->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function modificaCliente($id, $direccion,
            $email, $telef) {

        $consulta = "update $this->table set direccion=?, email=?, telef=? where idcliente = ?";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $direccion);
            $sentencia->bindParam(2, $email);
            $sentencia->bindParam(3, $telef);
            $sentencia->bindParam(4, $id);
            $num = $sentencia->execute();
            return $conn->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}
