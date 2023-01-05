<?php

class WebController extends ControladorBase {

    private $clientesmodel;
    private $comprasmodel;
    private $detallecompramodel;
    private $productosmodel;
    private $proveedoresmodel;

    public function __construct() {
        parent::__construct();
        $this->clientesmodel = new ClientesModel();
        $this->productosmodel = new productosModel();
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

    
    public function modprov() {
        $id = $_POST['codproveedor'];
        $data = array("proveedor"=>json_decode(file_get_contents("http://localhost/ArroyoPerezSergioserv?id=".$id),true));
        $this->view("modificar", $data);
    }

    public function modificar() {
        $id = $_POST['codproveedor'];
        $envio = json_encode(array("codproveedor"=>$_POST['codproveedor'], "nombre"=>$_POST['nombre'], "poblacion"=>$_POST['poblacion'], "telefono"=>$_POST['telefono'], "categoria"=>$_POST['categoria']));
        $urlmiservicio = "http://localhost/ArroyoPerezSergioserv/";
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        //Cabecera, tipo de datos y longitud de envío
        curl_setopt($conexion, CURLOPT_HTTPHEADER, 
              array('Content-type: application/json', 'Content-Length: ' . mb_strlen($envio)));
        //Tipo de petición
         curl_setopt($conexion, CURLOPT_CUSTOMREQUEST, 'PUT');
        //Campos que van en el envío
        curl_setopt($conexion, CURLOPT_POSTFIELDS, $envio);
        //para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($conexion);
        curl_close($conexion);
        
        $data = array("proveedor"=>json_decode(file_get_contents("http://localhost/ArroyoPerezSergioserv?id=".$id),true), "mensaje"=>$res);
        $this->view("modificar", $data);
    }
    public function insertarprov() {
        $envio = json_encode(array("nombre"=>$_POST['nombre'], "poblacion" => $_POST['poblacion'], "telefono" => $_POST['telefono'], "categoria"=>$_POST['categoria']));
        $urlmiservicio = "http://localhost/ArroyoPerezSergioserv/";
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        //Cabecera, tipo de datos y longitud de envío
        curl_setopt($conexion, CURLOPT_HTTPHEADER, 
              array('Content-type: application/json', 'Content-Length: ' . mb_strlen($envio)));
        //Tipo de petición
         curl_setopt($conexion, CURLOPT_CUSTOMREQUEST, 'POST');
        //Campos que van en el envío
        curl_setopt($conexion, CURLOPT_POSTFIELDS, $envio);
        //para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($conexion);
        
        curl_close($conexion);
        $data = array("mensaje"=>$res, "proveedor"=>json_decode(file_get_contents("http://localhost/ArroyoPerezSergioserv/"),true));
        $this->view("insertprov", $data);
    }

    public function borrarcompra() {
        $id = $_POST['idcompra'];
        if(isset($_POST['borrardetalles'])){
            $this->detallecompramodel->borrardetalle($id);
        }
        
        $detalles = $this->detallecompramodel->tienedetalles($id);
        if(sizeof($detalles)!= 0){
            $det = sizeof($detalles);
            $compras = $this->comprasmodel->getAll($_SESSION['idcliente']);
            $data = array("detalles"=>$det, "compras"=>$compras, "id"=>$id);
            $this->view("listcompra", $data);
        }
        else{
            $mensaje = $this->comprasmodel->borrar($id);
            $compras = $this->comprasmodel->getAll($_SESSION['idcliente']);
            $data = array("mensaje"=>$mensaje, "compras"=>$compras, "id"=>$id);
            $this->view("listcompra", $data);
        }
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
            $data = $this->productosmodel->getProductos($_SESSION['categoria'], 1, $_SESSION['limite']);
            $this -> view("productos", $data);
        }
        
        if(isset($_POST['cerrar'])){
            unset($_SESSION['nombre']);
            unset($_SESSION['perfil']);
            unset($_SESSION['idcliente']);
            $data = array();
            $this->view("index", $data);
        }
        if(isset($_POST['listmodprov'])){
            $data=array("proveedores"=>json_decode(file_get_contents("http://localhost/ArroyoPerezSergioserv"),true));
            $this->view("listprov", $data);
        }
        if(isset($_POST['insertarprov'])){
            $data = array();
            $this->view("insertprov", $data);
        }
        if(isset($_POST['listcompra'])){
            $data = (array("compras"=> $this->comprasmodel->getProductos($_SESSION['idcliente'])));
            $this->view("listcompra", $data);
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
        $data = $this->productosmodel->getProductos($_SESSION['categoria'], 1, $_SESSION['limite']);
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
        $data = $this->productosmodel->getProductos($_SESSION['categoria'], $_SESSION['pagactual'], $_SESSION['limite']);   
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
                if (is_numeric($lastid)) {
                        if($_SESSION['perfil']!=1){
                            $_SESSION['nombre']=$nombre;
                            if($tipo=="empleado"){
                                $_SESSION['perfil']=2;
                            }else{$_SESSION['perfil']=3;}
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
    }

    public function modborrar(){
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
                        array_push($producto, $_POST['id_prod'], $_POST['nombre_prod'],(int) $_POST['cantidad'], $_POST['precio']);
                        array_push($_SESSION['carrito'], $producto);
                    }
                    $data = $this->productosmodel->getProductos($_SESSION['categoria'], $_SESSION['pagactual'], $_SESSION['limite']);   
                    $this -> view("productos", $data);
                }
                else{
                    $producto = array();
                    array_push($producto, $_POST['id_prod'], $_POST['nombre_prod'],(int) $_POST['cantidad'], $_POST['precio'], $_POST['imagen']);
                    $_SESSION['carrito']=array();
                    array_push($_SESSION['carrito'], $producto);
                    $data = $this->productosmodel->getProductos($_SESSION['categoria'], $_SESSION['pagactual'], $_SESSION['limite']);   
                    $this -> view("productos", $data);
                }
            }
        }
    }
}

?>