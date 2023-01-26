<!DOCTYPE HTML>
<html>
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="content-type">
        <meta name="autor" content="Sergio Arroyo">
        <title>Biochito</title>
        <link href="./recursos/icono.png" rel="icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="./recursos/css/estilos.css" rel="stylesheet">
    </head>
    <body>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <header class="col-12 p-2 text-center header"><img src="./recursos/logo_biochito.png" class="logo" alt="logo-biochito"></header> 
    <nav class="navbar navbar-expand navbar1">
      <div class="container-fluid">
      <form method="post" action= "<?php echo $this->url("web", "menucabecera"); ?>" class="collapse navbar-collapse d-flex" >
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white ">
                <li class="nav-item">
                  <input type="submit" name="inicio" value="Inicio" class="nav-link border-0 text-white nav-link1" />
                </li>
                <?php 
                    if(isset($_SESSION['perfil'])){
                        echo '<li class="nav-item">
                                <p class="nav-link nav-link1 border-0 text-white">Hola '.$_SESSION['nombre'].'</p>
                              </li>
                              <li class="nav-item">
                                <input type="submit" name="cerrar" value="Cerrar sesion" class="nav-link nav-link1  border-0 text-white" />
                              </li>';
                        if($_SESSION['perfil']<3){
                            echo '<li class="nav-item">
                                    <button type="submit" class="nav-link position-relative nav-link1 border-0 text-light" name="acciones">
                                    Acciones';
                                    if(isset($_SESSION['mantenerstock'])){
                                      echo '<span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border-0  rounded-circle">
                                              <span class="visually-hidden">New alerts</span>
                                            </span>';
                                    }
                                   echo'</button>
                                  </li>';
                        }
                    }else{
                      echo '<li class="nav-item">
                              <input type="submit" name="conectar" value="Log In" class="nav-link nav-link1 border-0 text-white" />
                            </li>
                            <li class="nav-item">
                              <input type="submit" name="registrarse" value="Sign up" class="nav-link nav-link1 border-0 text-white" />
                            </li>';
                    }
                ?>
            </ul>
            <ul class="nav me-auto mb-2 mb-lg-0 text-white justify-content-end">
                <?php 
                    if(isset($_SESSION['perfil'])){
                        echo '<li class="nav-item">
                                <input type="submit" name="listcompra" value="Mis compras" class="nav-link border-0 text-white nav-link1" />
                              </li>';
                        if(isset($_SESSION['carrito'])){
                          echo '<li class="nav-item">
                                    <button type="submit" class="nav-link position-relative nav-link1 border-0 text-light" name="carrito">
                                    Carrito
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">'.sizeof($_SESSION['carrito']).'

                                              <span class="visually-hidden">carrito</span>
                                    </span>';
                                    }
                                   echo'</button>
                                  </li>';
                        }
                   
                ?>
          </ul>
        </form>
      </div>
    </nav>
    <nav class="navbar navbar-expand-lg bg-body-tertiary p-0">
  <button class="navbar-toggler boton-menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvasLg" aria-controls="navbarOffcanvasLg">
    <span class="navbar-toggler-icon"><img src="./recursos/menu.png" class="image-menu"></span>
  </button>
  <div class="offcanvas offcanvas-start" tabindex="-1" id="navbarOffcanvasLg" aria-labelledby="navbarOffcanvasLgLabel">
  <nav class="navbar navbar-expand-lg navbar-light text-white">
    <div class="container-fluid">
      <form method="POST" action="<?php echo $this->url("web", "menucategorias"); ?>" class="collapse navbar-collapse d-flex justify-content-between">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white mx-auto" id="subnav">
                <li class="nav-item p-2">
                  <input type="submit" name="suplementos" value="Suplementos" class="nav-link border-0 text-white" />
                </li>
                <li class="nav-item p-2">
                  <input type="submit" name="frescos" value="Frescos" class="nav-link border-0 text-white" />
                </li>
                <li class="nav-item p-2">
                  <input type="submit" name="alimentacion" value="Alimentacion" class="nav-link border-0 text-white" />
                </li>
                <li class="nav-item p-2">
                  <input type="submit" name="cosmetica-e-higiene" value="Cosmetica e higiene" class="nav-link border-0 text-white" />
                </li> 
                <li class="nav-item p-2">
                  <input type="submit" name="mama-y-bebe" value="Mama y bebe" class="nav-link border-0 text-white" />
                </li>
                <li class="nav-item p-2">    
                  <input type="submit" name="hogar-y-huerto" value="Hogar y huerto" class="nav-link border-0 text-white" />
                </li>
            </ul>
        </form>
    </div>
</nav>
  </div>
</nav>
<div class="contenedor">   
