<?php 
class proveedoresModel extends Conexion{
    private $table;
    private $conexion;

    public function __construct() {
        $this->table = "proveedores";
        $this->conexion = $this->getConexion();
    }

    public function listarproveedores(){
        try {
            $sql = "select * from $this->table";
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
    
    public function borrarProv($cod_prov) {
        try {
            $sql = "delete from $this->table where cod_prov = ?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $cod_prov);
            $sentencia->execute();
            $registros = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $registros;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getProv($cod_prov){
        try {
            $sql = "select * from $this->table where cod_prov = ?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $cod_prov);
            $sentencia->execute();
            $registros = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $registros;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getProvnombre($nom_prov){
        try {
            $sql = "select * from $this->table where nom_prov = ?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $nom_prov);
            $sentencia->execute();
            $row = $sentencia->fetch();
            if ($row) {
                $proveedor = new Proveedores($row['cod_prov'],
                            $row['nom_prov'],
                            $row['telefono'],$row['direccion']); 
                return $proveedor;
            }
            return null;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    
    public function modificaProveedor($cod, $nombre,
            $telefono, $direccion) {

        $consulta = "update $this->table set nom_prov=?, telefono=?, direccion=? where cod_prov=?";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $nombre);
            $sentencia->bindParam(2, $telefono);
            $sentencia->bindParam(3, $direccion);
            $sentencia->bindParam(4, $cod);
            $sentencia->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function insertaProv($nombre, $telefono, $direccion) {

        $consulta = "insert into $this->table (cod_prov, nom_prov, telefono, direccion) "
                . " values('', ?, ?, ?)";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $nombre);
            $sentencia->bindParam(2, $telefono);
            $sentencia->bindParam(3, $direccion);
            $num = $sentencia->execute();
            return $conn->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getProductosprov($cod_prov){
        try {
            $sql = "select proveedores.cod_prov, nom_prov, productos.imagen, productos.nombre_prod, productos.cantidad_prod, productos.id_producto, productos.precio_prov, telefono, productos.fecha_caducidad from $this->table inner join productos on proveedores.cod_prov = productos.cod_prov where proveedores.cod_prov = ?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $cod_prov);
            $sentencia->execute();
            $registros = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $registros;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
?>