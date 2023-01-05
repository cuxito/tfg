
<div id="prod_container" class="container">
    <div class="container d-flex flex-row justify-content-evenly flex-wrap mt-5 mb-5 w-75">
<?php
    foreach($data as $fila){
        echo '<div class="card h-100" style="width:18rem;">
            <img src="data:image/jpeg;base64,' . $fila['imagen'] . '" class="" card-img-top" alt="'.$fila['nombre_prod'].'">
            <form method="post" action="'. $this->url("web", "accionesprod").'">
            <div class="card-body">
                <p>'.$fila['nom_prov'].'</p>
                <h5 class="card-tittle">'.$fila['nombre_prod'].'</h5>
                <p class="cantidad-prod">'.$fila['cantidad_prod'].'<p>'
                .'<div class="card-price">';
                    if ($fila['descuento']!= ''){
                        echo '<h3 style="color:red;">'.round($fila['PVP']-(($fila['PVP']*$fila['descuento'])/100),2).'€</h3>'
                        .'<h5>'.$fila['descuento'].'%</h5>
                        <p>'.$fila['PVP'].'€</p>'
                        .'<input type="hidden" name="precio" value="'.round($fila['PVP']-(($fila['PVP']*$fila['descuento'])/100),2).'">';
                    }
                    else{
                        echo '<h3>'.$fila['PVP'].'€</h3>'
                        .'<input type="hidden" name="precio" value="'.$fila['PVP'].'">';;
                    };
                echo '</div>';
                echo '<div class="card-cantidad">'
                    .'<label>cantidad:</label>'
                    .'<input type="number" max="'.$fila['stock'].'" min="1" value="1" name="cantidad">';
                echo '</div>';
                echo '<input type="submit" class="btn btn-success" name="añadircarro" value="Añadir al Carrito">';
                if(isset($_SESSION['perfil'])){
                  if($_SESSION['perfil']<3){
                    echo '<input type="submit" class="btn btn-primary" name="modprod" value="Modificar">';
                    echo '<input type="submit" class="btn btn-danger" name="borrprod" value="Borrar">';
                  }
                }
                echo '<input type="hidden" name="id_prod" value="'.$fila['id_producto'].'">';
                echo '<input type="hidden" name="imagen" value="'.$fila['imagen'].'">';
                echo '<input type="hidden" name="nombre_prod" value="'.$fila['nombre_prod'].'">';
            echo '</div>';
            echo '</form>';
        echo '</div>';
    }
?>

    </div>

</div>


<form method="POST" action="<?php echo $this->url("web", "paginacion"); ?>">
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <?php 
      if($_SESSION['pagactual']!=1){
        echo '<input type="submit" class="page-link" value="&laquo;" name="previous"></input>';
      };
      for($x=$_SESSION['pagactual']-2; $x <= $_SESSION['pagactual']+2; $x++){
        if($x>0 && $x<=$_SESSION['pags']){
          echo '<input type="submit" class="page-link" value="'.$x.'" name="'.$x.'"></input>';
        };
      };
      if($_SESSION['pagactual']!=$_SESSION['pags']){
        echo '<input type="submit" class="page-link" value="&raquo;" name="next"></input>';
      };
      ?>
      
    </ul>
  </nav>
</form>