<!DOCTYPE HTML>
<html>
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="content-type">
        <meta name="autor" content="Sergio Arroyo">
        <title>Carrito Sergio Arroyo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <p class="bg-secondary col-12 p-3 text-center fs-1 m-0">EXAMEN Junio. Sergio Arroyo</p>    
    <nav class="navbar navbar-expand-lg navbar-light bg-dark text-white">
  <div class="container-fluid">
    <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
        <form method="post" action= "<?php echo $this->url("web", "menucabecera"); ?>">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">
                <li class="nav-item">
                  <input type="submit" name="inicio" value="Inicio" class="nav-link bg-dark border-0 text-white" />
                </li>
                <li class="nav-item">
                  <input type="submit" name="productos" value="Productos" class="nav-link bg-dark border-0 text-white" />
                </li>
                <li class="nav-item">
                  <input type="submit" name="registrarse" value="Registrate" class="nav-link bg-dark border-0 text-white" />
                </li>
                <?php 
                    if(isset($_SESSION['perfil'])){
                        if($_SESSION['perfil']==1){
                            echo '<li class="nav-item">
                                    <input type="submit" name="listmodprov" value="Listar/Modificar proveedores" class="nav-link bg-dark border-0 text-white" />
                                  </li>
                                  <li class="nav-item">
                                    <input type="submit" name="insertarprov" value="Insertar proveedores" class="nav-link bg-dark border-0 text-white" />
                                  </li>';  
                        }else if($_SESSION['perfil']==2){
                            echo '<li class="nav-item">
                                    <input type="submit" name="listcompra" value="Listar/Borrar Compras" class="nav-link bg-dark border-0 text-white" />
                                  </li>';  
                        }
                        echo '<li class="nav-item">
                                <input type="submit" name="cerrar" value="Cerrar sesion" class="nav-link bg-dark border-0 text-white" />
                              </li>
                              <li class="nav-item">
                                <p class="nav-link bg-dark border-0 text-white">USUARIO CONECTADO: '.$_SESSION['nombre'].'</p>
                              </li>';
                    }else{
                        echo '<li class="nav-item">
                  <input type="submit" name="conectar" value="Conectarse" class="nav-link bg-dark border-0 text-white" />
                </li>';
                    }
                ?>
        </ul>
        </form>
    </div>
  </div>
</nav> 
<nav class="navbar navbar-expand-lg navbar-light bg-dark text-white">
  <div class="container-fluid">
    <div class="collapse navbar-collapse d-flex justify-content-between" >
      <form method="POST" action="<?php echo $this->url("web", "menucategorias"); ?>">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white" id="subnav">
                <li class="nav-item">
                  <input type="submit" name="suplementos" value="Suplementos" class="nav-link bg-dark border-0 text-white" />
                </li>
                <li class="nav-item">
                  <input type="submit" name="frescos" value="Frescos" class="nav-link bg-dark border-0 text-white" />
                </li>
                <li class="nav-item">
                  <input type="submit" name="alimentacion" value="Alimentacion" class="nav-link bg-dark border-0 text-white" />
                </li>
                <li class="nav-item">
                  <input type="submit" name="cosmetica-e-higiene" value="Cosmetica e higiene" class="nav-link bg-dark border-0 text-white" />
                </li>
                <li class="nav-item">
                  <input type="submit" name="mama-y-bebe" value="Mama y bebe" class="nav-link bg-dark border-0 text-white" />
                </li>
                <li class="nav-item">
                  <input type="submit" name="hogar-y-huerto" value="Hogar y huerto" class="nav-link bg-dark border-0 text-white" />
                </li>
            </ul>
        </form>
    </div>
  </div>
</nav>