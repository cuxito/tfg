<?php

use function PHPSTORM_META\type;

class WebController extends ControladorBase {

    private $clientesmodel;
    private $comprasmodel;
    private $productosmodel;
    private $proveedoresmodel;

    public function __construct() {
        parent::__construct();
        $this->clientesmodel = new ClientesModel();
        $this->productosmodel = new productosModel();
        $this->comprasmodel = new comprasModel();
        $this->proveedoresmodel = new proveedoresModel();

    }

    public function index() {
        //función inicial, por defecto, abrirá la vista indexView
        
        $data = array('destacados'=>$this->productosmodel->getDestacados(),'ofertas'=> $this->productosmodel->getOfertas());
        $this->view("index", $data);
    }
   
    public function conectarse(){
            $email = $_POST['email'];
            $clave = $_POST['clave'];
            $datos = $this->clientesmodel->comprobarusuclave($email, $clave);
            if (is_object($datos)) {
                $nombre = $datos->getNombre_comp();
                $_SESSION['id_usu'] = $datos->getId_usuario();
                $dat = array('mensaje' => "Bienvenido usuario: " . $nombre,
                    'nombre' => $nombre, 'clave' => $clave);
                switch ($datos->getTipo()) {
                    case 'administrador':
                        $_SESSION['perfil']=1;
                        break;
                    case 'empleado':
                        $_SESSION['perfil']=2;
                        break;
                    default:
                        $_SESSION['perfil']=3;
                        break;
                }
                $_SESSION['nombre'] = $nombre;
                $_SESSION['idcliente'] = $datos->getId_usuario();
            } else {
                $dat = array('mensaje' => $datos, 'nombre' => $email, 'clave' => $clave);
            }
        header('location: index.php');
    }

    public function menucabecera() {
        if (isset($_POST['inicio'])) {
            $this->index();
        }
        if(isset($_POST['conectar'])){
            $data = array();
            $this->view("conectarse", $data);
        }
        if(isset($_POST['registrarse'])){
            $data = array();
            $this->view("registrarse", $data);
        }
        if(isset($_POST['acciones'])){
            $data = array();
            $this->view("acciones", $data);
        }
        if(isset($_POST['carrito'])){
            $data = array();
            $this->view("carrito", $data);
        }
        if (isset($_POST['productos'])){
            if(!isset($_SESSION['limite'])){
                $_SESSION['limite'] = 9;
            }
            $_SESSION['categoria']="";
            $_SESSION['pagactual']=1;
            $paginas = $this->Conteo();
            $_SESSION['pags']=$paginas;
            $productos = $this->productosmodel->getProductos($_SESSION['categoria'], 1, $_SESSION['limite']);
            $data= array("productos"=>$productos);
            $this -> view("productos", $data);
        }

        if(isset($_POST['listcompra'])){
            $data = $this->comprasmodel->listarComprascliente($_SESSION['id_usu']);
            $this->view("listcompras", $data);
        }
        
        if(isset($_POST['cerrar'])){
            unset($_SESSION['perfil']);
            header('location: index.php');
        }
    }
    public function menucategorias() {
        
        $paginas = $this->Conteo();
        $_SESSION['pags'] = $paginas;
        if(!isset($_SESSION['limite'])){
                $_SESSION['limite'] = 9;
            }
        $_SESSION['pagactual']=1;
        $categoria = str_replace(" ", "-", implode($_POST));
        $_SESSION['categoria']=$categoria;
        $productos = $this->productosmodel->getProductos($_SESSION['categoria'], 1, $_SESSION['limite']);
        $data = array("productos"=>$productos);
        $this -> view("productos", $data);
    }
    public function Conteo(){
        $conteo = $this->productosmodel->getConteo($_SESSION['categoria']);
        $conteo = $conteo[0]['conteo'];
        $paginas = ceil($conteo/ $_SESSION['limite']);
        return $paginas;
    }

    public function paginacion(){
        if(implode($_POST)=='«'){
            $_SESSION['pagactual']=$_SESSION['pagactual']-1;
        }else{
            if(implode($_POST)=='»'){
                $_SESSION['pagactual']=$_SESSION['pagactual']+1;  
            }else{
                $_SESSION['pagactual']=implode($_POST);
            }
        };
        $_SESSION['pags'] = $this->Conteo();
        $productos = $this->productosmodel->getProductos($_SESSION['categoria'], $_SESSION['pagactual'], $_SESSION['limite']);   
        $data = array("productos"=>$productos);
        $this -> view("productos", $data);
    }

    public function acciones(){
        if(isset($_POST['añadirusu'])){
            $data = array();
            $this->view("añadirusu", $data);
        };
        if(isset($_POST['listusu'])){
            $data = $this->clientesmodel->getAll();
            $this->view("listusu", $data);
        };
        if(isset($_POST['mod'])){
            $this->clientesmodel->modificaCliente($_POST['id_usu'], $_POST['nombre'], $_POST['email'], $_POST['tipo']);
            $cliente = $this->clientesmodel->getCliente($_POST['id_usu']);
            $mensaje = 'Se ha actualizado el usuario '. $_POST['email'];
            $data = array("cliente"=>$cliente, "mensaje"=>$mensaje);
            $this->view("modusu", $data);
        }
        
        if(isset($_POST['modprov'])){
            $this->proveedoresmodel->modificaProveedor($_POST['cod_prov'], $_POST['nombre'], $_POST['telefono'], $_POST['direccion']);
            $proveedor = $this->proveedoresmodel->getProv($_POST['cod_prov']);
            $mensaje = 'Se ha actualizado el proveedor '. $_POST['nombre'];
            $data = array("proveedor"=>$proveedor, "mensaje"=>$mensaje);
            $this->view("modprov", $data);
        }
        if(isset($_POST['añadirprov'])){
            $data = array();
            $this->view("añadirprov", $data);
        }
        if(isset($_POST['añadir'])){
            $prov = $this->proveedoresmodel->getProvnombre($_POST['nombre']);
            if(is_object($prov)){
                $mensaje= "Ya existe un proveedor con ese nombre";
            }else{
                $this->proveedoresmodel->insertaProv($_POST['nombre'], $_POST['telefono'], $_POST['direccion']);
                $mensaje = "Se ha registrado el proveedor ". $_POST['nombre'];
            }
            $data = array("mensaje"=>$mensaje);
            $this->view("añadirprov",$data);
        }
        if(isset($_POST['registrar'])){
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $clave = $_POST['clave'];
            $tipo = $_POST['tipo'];

            $cliente = new Clientes(0, $nombre, $email, $clave, $tipo);
            $men = $this->clientesmodel->getClienteemail($email);
            if (is_object($men)) {
                $mensaje = "Ya existe un cliente con ese email.";
                $cliente = $men;
            } else {
                $lastid = $this->clientesmodel->insertaCliente($nombre, $email, $clave, $tipo);
                $_SESSION['id_usu']=$lastid;
                if (is_numeric($lastid)) {
                    if(isset($_SESSION['perfil'])){
                        if($_SESSION['perfil']!=1){
                            $_SESSION['nombre']=$nombre;
                            if($tipo=="empleado"){
                                $_SESSION['perfil']=2;
                            }else{$_SESSION['perfil']=3;}
                        }
                    }else{
                        $_SESSION['perfil']=3;
                    }
                    $mensaje = "Usuario Registrado ";
                } else {
                    $mensaje = "HA OCURRIDO UN ERROR EN LA INSERCIÓN";
                }
            }
            $dat = array("cliente"=>$cliente, "mensaje"=>$mensaje);
            if($_SESSION['perfil']==1){
                $this->view("añadirusu", $dat);
            }else{
                $this->view("registrarse", $dat);
            };
        }
        if(isset($_POST['listcompracli'])){
            $cli = $this->clientesmodel->getClienteemail($_POST['emailcli']);
            $cli = $cli->getId_usuario();
            $data = $this->comprasmodel->listarComprascliente($cli);
            $this->view("listcompras", $data);
        }
        if(isset($_POST['listcompraid'])){
            $data = $this->comprasmodel->listarCompraid($_POST['idcompra']);
            $this->view("listcompras", $data);
        }

        if(isset($_POST['listprov'])){
            $data = $this->proveedoresmodel->listarproveedores();
            $this->view("listprov", $data);
        }
        if(isset($_POST['restock'])){
            $productos = $this->productosmodel->necesitaStock();
            $data = array("productos"=>$productos);
            $this->view("comprarprods", $data);
        }
        if(isset($_POST['añadirprod'])){
            $proveedores = $this->proveedoresmodel->listarproveedores();
            $data = array("proveedores"=>$proveedores);
            $this->view("añadirprod", $data);
        }
        if(isset($_POST['listgestiones'])){
            $data = $this->clientesmodel->listarGestiones();
            $this->view("listgestiones", $data);
        }
    }

    public function modborrarcli(){
        if(isset($_POST['borrar'])){
            $this->clientesmodel->borrarCliente($_POST['id_usu']);
            $data = $this->clientesmodel->getAll();
            $this->view("listusu", $data);
        }
        if(isset($_POST['mod'])){
            $data = $this->clientesmodel->getCliente($_POST['id_usu']);
            $data=array('cliente'=>$data);
            $this->view('modusu', $data);
        }
    }

    public function modborrarprov(){
        if(isset($_POST['borrar'])){
            $this->proveedoresmodel->borrarProv($_POST['cod_prov']);
            $data = $this->proveedoresmodel->listarproveedores();
            $this->view("listprov", $data);
        }
        if(isset($_POST['mod'])){
            $data = $this->proveedoresmodel->getProv($_POST['cod_prov']);
            $data=array('proveedor'=>$data);
            $this->view('modprov', $data);
        }
        if(isset($_POST['comprar'])){
            $productos = $this->proveedoresmodel->getProductosprov($_POST['cod_prov']);
            $data = array("productos"=>$productos);
            $this->view("comprarprods", $data);
        }
    }

    public function accionesprod(){
        if(isset($_POST['añadircarro'])){
            if(!isset($_SESSION['perfil'])){
                $data = array();
                $this->view("conectarse", $data);
            }
            else{
                if(isset($_SESSION['carrito'])){
                    $existe = false;
                    //unset($_SESSION['carrito']);
                    $x=0;

                    foreach ($_SESSION['carrito'] as $prod) {
                        if(!$existe && $prod[0]==$_POST['id_prod']){
                            $existe = true;
                            $_SESSION['carrito'][$x][2] = $prod[2] + $_POST['cantidad'];
                        }
                        $x++;
                    }
                    if(!$existe){  
                        $producto = array();
                        array_push($producto, $_POST['id_prod'], $_POST['nombre_prod'],(int) $_POST['cantidad'], $_POST['precio'], $_POST['imagen']);
                        array_push($_SESSION['carrito'], $producto);
                    }
                    $productos = $this->productosmodel->getProductos($_SESSION['categoria'], $_SESSION['pagactual'], $_SESSION['limite']);
                    $data = array("productos"=>$productos);
                    $this -> view("productos", $data);
                }
                else{
                    $producto = array();
                    array_push($producto, $_POST['id_prod'], $_POST['nombre_prod'],(int) $_POST['cantidad'], $_POST['precio'], $_POST['imagen']);
                    $_SESSION['carrito']=array();
                    array_push($_SESSION['carrito'], $producto);
                    $productos = $this->productosmodel->getProductos($_SESSION['categoria'], $_SESSION['pagactual'], $_SESSION['limite']);
                    $data = array("productos"=>$productos);   
                    $this -> view("productos", $data);
                }
            }
        }

        if(isset($_POST['borrprod'])){
            $this->productosmodel->borrarProd($_POST['id_prod']);
            $mensaje = "Se ha eliminado el producto ". $_POST['nombre_prod'];
            $accion= "borrar";
            $this->clientesmodel->insertarGestion($_SESSION['id_usu'], $_POST['id_prod'], $accion, $mensaje);
            $productos = $this->productosmodel->getProductos($_SESSION['categoria'], $_SESSION['pagactual'], $_SESSION['limite']);
            $data = array("mensaje"=>$mensaje, "productos"=>$productos);
            $this -> view("productos", $data);
        }

        if(isset($_POST['añadirprod'])){
            $imagen = $_FILES['imagen'];
            if ($imagen['error'] != UPLOAD_ERR_OK || $imagen['size'] == 0) {
                $mensaje = "Selecciona una imagen correcta";
            } else {
                $imagen = file_get_contents($imagen['tmp_name']);
                $imagen = base64_encode($imagen);
                $mensaje = "Se ha insertado el producto ". $_POST['nombre_prod'];
                if(isset($_POST['fecha_caducidad'])){
                    $fecha = $_POST['fecha_caducidad'];
                }else{$fecha = null;}
                $n = $this->productosmodel->insertarProd($imagen, $_POST['nombre_prod'], $_POST['proveedor'], $_POST['cantidad_prod'], $_POST['categoria'], $_POST['stock'], $_POST['precio_compra'], $fecha);
                $accion= "añadir";
                var_dump($this->clientesmodel->insertarGestion($_SESSION['id_usu'], $n, $accion, $mensaje));
            }
            
            $proveedores = $this->proveedoresmodel->listarproveedores();
            $data=array("mensaje"=>$mensaje, "proveedores"=>$proveedores);
            $this->view("añadirprod", $data);
        }

        if(isset($_POST['modprod'])){
            $producto = $this->productosmodel->getProducto($_POST['id_prod']);
            $proveedores = $this->proveedoresmodel->listarproveedores();
            $data = array("producto"=>$producto, "proveedores"=>$proveedores);
            $this->view("modprod", $data);
        }
        if(isset($_POST['modificar'])){
            if($_FILES['imagen']['size']==0){
                $imagen = "";
                $mensaje = "Se ha modificado el producto ". $_POST['nombre_prod'];
            }
            else{
                if ($imagen['error'] != UPLOAD_ERR_OK || $imagen['size'] == 0) {
                    $mensaje = "Selecciona una imagen correcta";
                } else {
                    $imagen = file_get_contents($imagen['tmp_name']);
                    $imagen = base64_encode($imagen);
                    $mensaje = "Se ha modificado el producto ". $_POST['nombre_prod'];
                }
            }
            if(isset($_POST['fecha_caducidad'])){
                $fecha = $_POST['fecha_caducidad'];
            }else{$fecha = null;}
            $this->productosmodel->modificarProd($_POST['id_producto'],$imagen, $_POST['nombre_prod'], $_POST['proveedor'], $_POST['cantidad_prod'], $_POST['categoria'], $_POST['stock'], $_POST['precio_compra'], $fecha);
            $accion= "modificar";
            $this->clientesmodel->insertarGestion($_SESSION['id_usu'], $_POST['id_producto'], $accion, $mensaje);
            $proveedores = $this->proveedoresmodel->listarproveedores();
            $producto = $this->productosmodel->getProducto($_POST['id_producto']);
            $data=array("mensaje"=>$mensaje, "proveedores"=>$proveedores, "producto"=>$producto);
            $this->view("modprod", $data);
        }
    }

    public function accionescarro(){
        if(isset($_POST['borrarcarro'])){
            unset($_SESSION['carrito']);
            header('location: index.php');
        }
        if(isset($_POST['realizarcompra'])){
            $n = $this->comprasmodel->maxNcompra();
            $n_compra= $n[0]['num_compra'];
            if($n_compra=='NULL'){+
                $n_compra=1;
            }else{
                $n_compra=$n_compra+1;
            }

            foreach ($_SESSION['carrito'] as $fila) {
                $importe=$fila[3]*$fila[2];
                $this->comprasmodel->insertarCompra($fila[0],$_SESSION['id_usu'],$fila[2],$importe,$n_compra);
                $this->productosmodel->ventaProducto($fila[0], $fila[2]);
            }
            unset($_SESSION['carrito']);
            header('location: index.php');
        }
    }

    public function comprarprods(){
        if(isset($_POST['fecha_cad'])){
            $fecha = $_POST['fecha_cad'];
        }else{
            $fecha = null;
        }
        var_dump($this->productosmodel->comprarProductos($_POST['id_prod'], $_POST['cantidad'], $_POST['precio'], $fecha));
        if(isset($_POST['cod_prov'])){
            $productos = $this->proveedoresmodel->getProductosprov($_POST['cod_prov']);
        }
        else{
            $productos = $this->productosmodel->necesitaStock();
        }
        $mensaje = "Se han comprado ". $_POST['cantidad'] . ' de '. $_POST['nombre'];
        $data = array("mensaje"=>$mensaje, "productos"=>$productos);
        $this->view("comprarprods", $data);
        
    }
}

?>