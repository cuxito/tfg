<?php

class ComprasModel extends Conexion{
    private $table;
    private $conexion;

    public function __construct() {
        $this->table = "compras";
        $this->conexion = $this->getConexion();
    }
    
    public function getAll($id) {
        try {
            $sql = "select * from $this->table where idcliente = $id";
            $statement = $this->conexion->query($sql);
            $registros = $statement->fetchAll(PDO::FETCH_ASSOC);
            $statement = null;
            // Retorna el array de registros
            return $registros;
        } catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
    }
    
    public function borrar($id) {
        try {
            $sql = "delete from compras where idcompra= ? ";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $id);
            $num = $sentencia->execute();
            if ($sentencia->rowCount() == 0)
                return "Registro NO Borrado, no se localiza: " . $id;
            else
                return "Registro Borrado con id: " . $id;
           } catch (PDOException $e) {
            return "ERROR AL BORRAR.<br>" . $e->getMessage();
        }
    }
}

