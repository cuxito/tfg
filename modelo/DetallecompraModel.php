<?php 

class DetallecomprasModel extends Conexion{
    private $table;
    private $conexion;

    public function __construct() {
        $this->table = "detallecompra";
        $this->conexion = $this->getConexion();
    }
    
    public function tienedetalles($id) {
        try {
            $sql = "select * from $this->table where idcompra = $id";
            $statement = $this->conexion->query($sql);
            $registros = $statement->fetchAll(PDO::FETCH_ASSOC);
            $statement = null;
            // Retorna el array de registros
            return $registros;
        } catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
    }
    public function borrardetalle($id) {
        try {
            $sql = "delete from detallecompra where idcompra= ? ";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $id);
            $num = $sentencia->execute();
            if ($sentencia->rowCount() == 0)
                return "Registro NO Borrado, no se localiza: " . $id;
            else
                return "Registro Borrado: " . $id;
           } catch (PDOException $e) {
            return "ERROR AL BORRAR.<br>" . $e->getMessage();
        }
    }
}
