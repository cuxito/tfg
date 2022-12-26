
<select id="select">
    <option>asdfasdf</option>
    <option>fsdf</option>
    <option>fdsf</option>+
    <option>sdf</option>
    <option>dfsdfsdf</option>
</select>

<div id="prod_container" class="container">
    <div class="row row-cols-lg-3 row-cols-1 justify-content-evenly">
<?php
    foreach($data as $fila){
        echo '<div class="col card h-100" style="width:18rem;">
        <img src="data:image/jpeg;base64,' . $fila['imagen'] . '" class="" card-img-top" alt="'.$fila['nombre_prod'].'">
        <div class="card-body">
            <h5 class="card-tittle">'.$fila['nombre_prod'].'</h5>
            <
        </div>';



        echo $fila['nombre_prod'];
        echo $fila['cantidad_prod'];
        echo $fila['stock'];
        echo $fila['PVP'];
        echo $fila['descuento'],'%';
        echo '<img src="data:image/jpeg;base64, ' . $fila['imagen'] . '" class="" width="100px" alt="...">';
        echo '</div>';
    }
?>
    </div>
</div>