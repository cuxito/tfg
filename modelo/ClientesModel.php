<?php

class ClientesModel extends Conexion { 

    private $table;
    private $conexion;

    public function __construct() {
        $this->table = "usuarios";
        $this->conexion = $this->getConexion();
    }

     function comprobarusuclave($email, $clave) {
        $consulta = "select * from $this->table where email= ?";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $email);
            $sentencia->execute();
            if ($sentencia->rowCount() == 1) { //existe usu
                $row = $sentencia->fetch();
                if (password_verify($clave, $row['pass'])) {
                    // "Validado. Clave correcta.";
                    return new Clientes($row['id_usuario'],
                            $row['nombre_comp'],
                            $row['email'],$row['pass'],$row['tipo']); 
                } else {
                    return "Usuario existe. Clave incorrecta.";
                }
            } else {
                return "Usuario " . $email . " no existe.";
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    
    public function getClienteemail($email) {
        try {
            $sql = "select * from $this->table where email=?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $email);
            $sentencia->execute();
            $row = $sentencia->fetch();
            if ($row) {
                $cliente = new Clientes($row['id_usuario'],
                            $row['nombre_comp'],
                            $row['email'],$row['pass'],$row['tipo']); 
                return $cliente;
            }

            return null;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getCliente($id) {
        try {
            $sql = "select id_usuario, nombre_comp, email, tipo from $this->table where id_usuario=?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $id);
            $sentencia->execute();
            $registros = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $registros;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    
    public function insertaCliente($nombre, $email, $clave, $tipo) {

        $consulta = "insert into $this->table (id_usuario, nombre_comp, email, pass, tipo) "
                . " values('', ?, ?, ?, ?)";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $password = password_hash($clave, PASSWORD_DEFAULT);
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $nombre);
            $sentencia->bindParam(2, $email);
            $sentencia->bindParam(3, $password);
            $sentencia->bindParam(4, $tipo);
            $num = $sentencia->execute();
            return $conn->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function modificaCliente($id, $nombre,
            $email, $tipo) {

        $consulta = "update $this->table set nombre_comp=?, email=?, tipo=? where id_usuario=?";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $nombre);
            $sentencia->bindParam(2, $email);
            $sentencia->bindParam(3, $tipo);
            $sentencia->bindParam(4, $id);
            $sentencia->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getAll() {
        try {
            $sql = "select id_usuario, nombre_comp, email, tipo from $this->table where tipo = 'cliente'";
            if($_SESSION['perfil']==1){
                $sql = $sql." or tipo = 'empleado'";
            };
            
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->execute();
            $registros = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $registros;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function borrarCliente($id_usu) {
        try {
            $sql = "delete from $this->table where id_usuario = ?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $id_usu);
            $sentencia->execute();
            $registros = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $registros;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function insertarGestion($id_usu, $id_prod, $accion, $mensaje){
        try {
            $sql = "insert into empleado_gestiona (fecha, id_usuario, id_producto, accion, descripcion) values (now(), ?, ?, ?, ?)";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $id_usu);
            $sentencia->bindParam(2, $id_prod);
            $sentencia->bindParam(3, $accion);
            $sentencia->bindParam(4, $mensaje);
            $sentencia->execute();
            $registros = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $registros;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function listarGestiones(){
        try {
            $sql = "select fecha, empleado_gestiona.id_usuario, usuarios.nombre_comp, empleado_gestiona.id_producto, productos.nombre_prod, accion, descripcion from empleado_gestiona 
            inner join usuarios on (empleado_gestiona.id_usuario = usuarios.id_usuario) inner join productos on (empleado_gestiona.id_producto = productos.id_producto)";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->execute();
            $registros = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $registros;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}
