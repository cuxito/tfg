<?php 
    function getConexion() {
        $servername = "localhost:3306";
        $database = "tfg";
        $username = "root";
        $password = "";

        try {
            $conexion = new PDO("mysql:host=$servername;dbname=$database;charset=utf8",
                    $username, $password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            $mensajeerror = $e->getMessage();
        }

    }
    function comprobarCaducidad(){
        try{
            $conn = getConexion();
            $sql = "update productos set stock=0 where fecha_caducidad <= curdate()";
            $sentencia = $conn->query($sql);
            $sentencia->execute();
            return $sentencia;
        }catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
    }
    function hacerDescuento(){
        try{
            $conn = getConexion();
            $sql = "update productos set descuento = 30 where stock < 30 or (fecha_caducidad != '' and date_add(curdate(), interval 7 day) >= fecha_caducidad)";
            $sentencia = $conn->query($sql);
            $sentencia->execute();
            return $sentencia;
        }catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
    }

    function quitarDescuento(){
        try{
            $conn = getConexion();
            $sql = "update productos set descuento = 0 where stock >= 30";
            $sentencia = $conn->query($sql);
            $sentencia->execute();
            return $sentencia;
        }catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
    }
    
    function nuevoStock(){
        try{
            $conn = getConexion();
            $sql = "update productos set stock = stock_precio_nuevo, PVP = nuevo_precio, nuevo_precio = 0, stock_precio_nuevo = 0 where stock = 0 and stock_precio_nuevo != 0";
            $sentencia = $conn->query($sql);
            $sentencia->execute();
            return $sentencia;
        }catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
    }
    function comprobarStock(){
        try{
            $conn = getConexion();
            $sql = "select id_producto from productos where stock<30 or fecha_caducidad< date_add(curdate(), interval 7 day)";
            $sentencia = $conn->query($sql);
            $registros = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            $sentencia = null;
            // Retorna el array de registros
            return $registros;
        }catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
    }

    

    comprobarCaducidad();
    hacerDescuento();
    nuevoStock();
    quitarDescuento();

    if(isset($_SESSION['perfil'])){
        if($_SESSION['perfil']<3){
            $n = comprobarStock();
            if(isset($n[0])){
                $_SESSION['mantenerstock'] = true;
            }
            
        }
    }
    
?>