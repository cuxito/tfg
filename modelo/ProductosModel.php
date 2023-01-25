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
            $sql = "select count(*) as conteo from productos where stock > 0";
            if($categoria!=""){
                $sql = $sql." and categoria = '$categoria'";
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
            $sql = "select id_producto, nombre_prod, cantidad_prod, stock, PVP, descuento, imagen, proveedores.nom_prov from $this->table inner join proveedores on (productos.cod_prov = proveedores.cod_prov) where productos.stock>0 order by n_ventas asc limit 5";
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
            $sql = "select id_producto, nombre_prod, cantidad_prod, stock, PVP, descuento, imagen, proveedores.nom_prov from $this->table inner join proveedores on (productos.cod_prov = proveedores.cod_prov) where productos.stock>0 order by descuento desc limit 5";
            $statement = $this->conexion->query($sql);
            $registros = $statement->fetchAll(PDO::FETCH_ASSOC);
            $statement = null;
            // Retorna el array de registros
            return $registros;
        } catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
        
    }

    public function ventaProducto($id,$cantidad){
        try {
            $sql = "update $this->table set stock = stock-?, n_ventas=n_ventas+1 where id_producto=?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $cantidad);
            $sentencia->bindParam(2, $id);
            $sentencia->execute();
        } catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
    }

    public function comprarProductos($id,$cantidad, $precio, $fecha_caducidad){
        try {
            $sql = "update $this->table set nuevo_precio = ?, stock_precio_nuevo=?, fecha_caducidad=? where id_producto=?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(2, $cantidad);
            $sentencia->bindParam(4, $id);
            $sentencia->bindParam(1, $precio);
            $sentencia->bindParam(3, $fecha_caducidad);
            $sentencia->execute();
        } catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
    }

    public function necesitaStock(){
        try {
            $sql = " select id_producto, imagen, nombre_prod, cantidad_prod, precio_prov, stock, fecha_caducidad, proveedores.nom_prov, proveedores.telefono 
                from productos inner join proveedores on productos.cod_prov = proveedores.cod_prov where stock_precio_nuevo<1 and (stock <= 20 or (fecha_caducidad != '' and date_add(curdate(), interval 7 day) >= fecha_caducidad)) and borrado = false";
            $statement = $this->conexion->query($sql);
            $registros = $statement->fetchAll(PDO::FETCH_ASSOC);
            $statement = null;
            // Retorna el array de registros
            return $registros;
        } catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
    }

    public function insertarProd($imagen, $nombre, $cod_prov, $cantidad, $categoria, $stock, $precio, $fecha_caducidad){
        try {
            $conexion = $this->getConexion();
            if($fecha_caducidad == ''){
                $fecha_caducidad=null;
            }
            $PVP = round($precio+(($precio*30)/100),2);
            $sql = "insert into productos (imagen, nombre_prod, cod_prov, cantidad_prod, categoria, stock, precio_prov, PVP, fecha_caducidad)
            values (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(1, $imagen);
            $sentencia->bindParam(2, $nombre);
            $sentencia->bindParam(3, $cod_prov);
            $sentencia->bindParam(4, $cantidad);
            $sentencia->bindParam(5, $categoria);
            $sentencia->bindParam(6, $stock);
            $sentencia->bindParam(7, $precio);
            $sentencia->bindParam(8, $PVP);
            $sentencia->bindParam(9, $fecha_caducidad);
            $n = $sentencia->execute();
            $id = $conexion->lastInsertId();
            return $id;
        } catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
    }
    public function modificarProd($id, $imagen, $nombre, $cod_prov, $cantidad, $categoria, $stock, $PVP, $fecha_caducidad){
        try {
            if($fecha_caducidad == ''){
                $fecha_caducidad=null;
            }
            if($imagen == ''){
                $sql = "update $this->table set nombre_prod=?, cod_prov=?, cantidad_prod=?, categoria=?, stock=?, PVP=?, fecha_caducidad=? where id_producto = ?";
            }else{
                $sql = "update $this->table set nombre_prod=?, cod_prov=?, cantidad_prod=?, categoria=?, stock=?, PVP=?, fecha_caducidad=? imagen=? where id_producto = ?";
            }
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $nombre);
            $sentencia->bindParam(2, $cod_prov);
            $sentencia->bindParam(3, $cantidad);
            $sentencia->bindParam(4, $categoria);
            $sentencia->bindParam(5, $stock);
            $sentencia->bindParam(6, $PVP);
            $sentencia->bindParam(7, $fecha_caducidad);
            if($imagen!=''){
                $sentencia->bindParam(8, $imagen);
                $sentencia->bindParam(9, $id);
            }else{
                $sentencia->bindParam(8, $id);
            }
            
            $sentencia->execute();
        } catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
    }

    public function borrarProd($id_prod){
        try {
            $sql = "update $this->table set borrado=true, stock=0 where id_producto = ?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $id_prod);
            $sentencia->execute();
            $registros = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $registros;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getProducto($id){
        try {
            $sql = "select id_producto, imagen, nombre_prod, cod_prov, cantidad_prod, categoria, stock, precio_prov, PVP, fecha_caducidad from $this->table where id_producto = ?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $id);
            $sentencia->execute();
            $registros = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $registros;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
