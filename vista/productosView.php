
<div id="prod_container" class="container">
    <div class="container d-flex flex-row justify-content-evenly flex-wrap mt-5 mb-5 w-75">
<?php
    foreach($data as $fila){
        echo '<div class="card h-100" style="width:18rem;">
            <img src="data:image/jpeg;base64,' . $fila['imagen'] . '" class="" card-img-top" alt="'.$fila['nombre_prod'].'">
            <div class="card-body">
                <p>'.$fila['nom_prov'].'</p>
                <h5 class="card-tittle">'.$fila['nombre_prod'].'</h5>
                <p class="cantidad-prod">'.$fila['cantidad_prod'].'<p>'
                .'<div class="card-price">';
                    if ($fila['descuento']!= ''){
                        echo '<h3 style="color:red;">'.round($fila['PVP']-(($fila['PVP']*$fila['descuento'])/100),2).'€</h3>'
                        .'<h5>'.$fila['descuento'].'%</h5>
                        <p>'.$fila['PVP'].'€</p>';
                    }
                    else{
                        echo '<h3>'.$fila['PVP'].'€</h3>';
                    };
                echo '</div>';
                echo '<div class="card-cantidad">'
                    .'<label>cantidad:</label>'
                    .'<input type="number" max="'.$fila['stock'].'" min="1" value="1"></input>';
                echo '</div>';
                echo '<button class="btn btn-success">Comprar</button>';
                if(isset($_SESSION['perfil'])){
                  if($_SESSION['perfil']<3){
                    echo '<button class="btn btn-primary">Modificar</button>';
                    echo '<button class="btn btn-danger">Borrar</button>';
                  }
                }
            echo '</div>';
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