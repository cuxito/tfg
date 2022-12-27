<?php

class productosModel extends Conexion{
    private $table;
    private $conexion;

    public function __construct() {
        $this->table = "productos";
        $this->conexion = $this->getConexion();
    }
    
    public function getProductos($categoria, $pagina, $limite)
    {
     
        $offset = ($pagina-1)*$limite;
        try {
            $sql = "select id_producto, nombre_prod, cantidad_prod, stock, PVP, descuento, imagen, n_ventas, nom_prov from $this->table left join proveedores on productos.cod_prov = proveedores.cod_prov where productos.stock > 0 limit $limite offset $offset";
            if($categoria != ""){
                $sql = "select id_producto, nombre_prod, cantidad_prod, stock, PVP, descuento, imagen, n_ventas, nom_prov from $this->table left join proveedores on productos.cod_prov = proveedores.cod_prov where productos.stock > 0 and categoria = '$categoria' limit $limite offset $offset";
            }
            $statement = $this->conexion->query($sql);
            $productos = $statement->fetchAll(PDO::FETCH_ASSOC);
            $statement = null;
            // Retorna el array de registros
            return $productos;
        } catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
            
        
    }

    public function getConteo($categoria){
        try{
            $sql = "select count(*) as conteo from productos";
            if($categoria!=""){
                $sql = $sql." where categoria = '$categoria'";
            };
            $statement = $this->conexion->query($sql);
                $productos = $statement->fetchAll(PDO::FETCH_ASSOC);
                $statement = null;
                // Retorna el array de registros
            return $productos;
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
