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
            $nombre = $_POST['nombre'];
            $clave = $_POST['clave'];
            $datos = $this->clientesmodel->comprobarusuclave($nombre, $clave);
            if (is_object($datos)) {
                $dat = array('mensaje' => "Bienvenido usuario: " . $nombre,
                    'nombre' => $nombre, 'clave' => $clave);

                $_SESSION['perfil'] = $datos->getPerfil();
                $_SESSION['nombre'] = $nombre;
                $_SESSION['idcliente'] = $datos->getIdcliente();
            } else {
                $dat = array('mensaje' => $datos, 'nombre' => $nombre, 'clave' => $clave);
            }
        $this->view("conectarse", $dat);
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
        if (isset($_POST['productos'])){
            $categoria = "";
            $data = $this->productosmodel->getAll($categoria);
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
            $data = (array("compras"=> $this->comprasmodel->getAll($_SESSION['idcliente'])));
            $this->view("listcompra", $data);
        }
    }
    public function menucategorias() {

        if(isset($_POST['suplementos'])){
            $categoria = 'suplementos';
        }
        if(isset($_POST['frescos'])){
            $categoria = 'frescos';
        }
        if(isset($_POST['alimentacion'])){
            $categoria = 'alimentacion';
        }
        if(isset($_POST['cosmetica-e-higiene'])){
            $categoria = 'cosmetica-e-higiene';
        }
        if(isset($_POST['mama-y-bebe'])){
            $categoria = 'mama-y-bebe';
        }
        if(isset($_POST['hogar-y-huerto'])){
            $categoria = 'hogar-y-huerto';
        }
        $data = $this->productosmodel->getAll($categoria);
        $this -> view("productos", $data);
    }

    
}

?>