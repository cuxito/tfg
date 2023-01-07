<?php

class comprasModel extends Conexion{
    private $table;
    private $conexion;

    public function __construct() {
        $this->table = "compra";
        $this->conexion = $this->getConexion();
    }
    
    public function insertarCompra($id_prod,$id_cli,$cantidad,$importe,$n_compra){
        try {
            $sql = "insert into $this->table (fecha, id_usuario, id_producto, cantidad, importe, num_compra) values (now(), ?, ?, ?, ?, ?)";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $id_cli);
            $sentencia->bindParam(2, $id_prod);
            $sentencia->bindParam(3, $cantidad);
            $sentencia->bindParam(4, $importe);
            $sentencia->bindParam(5, $n_compra);
            $sentencia->execute();
        } catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
    }

    public function maxNcompra(){
        try {
            $sql = "select max(num_compra) as num_compra from $this->table";
            $sentencia = $this->conexion->query($sql);
            $sentencia->execute();
            $registros = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            $sentencia = null;
            // Retorna el array de registros
            return $registros;
        } catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
    }
    
    public function listarComprascliente($id_cli){
        try {
            $sql = "select fecha, productos.nombre_prod, productos.imagen, cantidad, importe, num_compra from compra inner join productos on productos.id_producto = compra.id_producto where id_usuario = ?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $id_cli);
            $sentencia->execute();
            $registros = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            $sentencia = null;
            // Retorna el array de registros
            return $registros;
        } catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
    }
    public function listarCompraid($id_compra){
        try {
            $sql = "select fecha, productos.nombre_prod, productos.imagen, id_usuario, cantidad, importe, num_compra from compra inner join productos on productos.id_producto = compra.id_producto where num_compra = ?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $id_compra);
            $sentencia->execute();
            $registros = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            $sentencia = null;
            // Retorna el array de registros
            return $registros;
        } catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
    }

}
