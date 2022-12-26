<?php

class productosModel extends Conexion{
    private $table;
    private $conexion;

    public function __construct() {
        $this->table = "productos";
        $this->conexion = $this->getConexion();
    }
    
    public function getAll($categoria)
    {
     
        try {
            if($categoria == ""){
                $sql = "select id_producto, nombre_prod, cantidad_prod, stock, PVP, descuento, imagen, n_ventas from $this->table";
            }
            else{
                $sql = "select id_producto, nombre_prod, cantidad_prod, stock, PVP, descuento, imagen, n_ventas from $this->table where categoria = '$categoria'";

            }
            $statement = $this->conexion->query($sql);
            $registros = $statement->fetchAll(PDO::FETCH_ASSOC);
            $statement = null;
            // Retorna el array de registros
            return $registros;
        } catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
            
        
    }
    
    public function getDestacados() {
        try {
            $sql = "select id_producto, nombre_prod, cantidad_prod, stock, PVP, descuento, imagen from $this->table order by n_ventas asc limit 5";
            $statement = $this->conexion->query($sql);
            $registros = $statement->fetchAll(PDO::FETCH_ASSOC);
            $statement = null;
            // Retorna el array de registros
            return $registros;
        } catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
    }
    
    public function getOfertas() {
        
        try {
            $sql = "select id_producto, nombre_prod, cantidad_prod, stock, PVP, descuento, imagen from $this->table order by descuento desc limit 5";
            $statement = $this->conexion->query($sql);
            $registros = $statement->fetchAll(PDO::FETCH_ASSOC);
            $statement = null;
            // Retorna el array de registros
            return $registros;
        } catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
        
    }
}
