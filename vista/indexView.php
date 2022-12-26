<p class="bg-secondary col-12 p-3 text-center fs-3">EXAMEN Junio. Sergio Arroyo</p>

<?php
    foreach($data['destacados'] as $fila){
        echo $fila['nombre_prod'];
        echo $fila['cantidad_prod'];
        echo $fila['stock'];
        echo $fila['PVP'];
        echo $fila['descuento'],'%';
        echo '<img src="data:image/jpeg;base64, ' . $fila['imagen'] . '" class="" width="100px" alt="...">';     
    }
    echo '***********************************************************';
    foreach($data['ofertas'] as $fila){
        echo $fila['nombre_prod'];
        echo $fila['cantidad_prod'];
        echo $fila['stock'];
        echo $fila['PVP'];
        echo $fila['descuento'],'%';
        echo '<img src="data:image/jpeg;base64, ' . $fila['imagen'] . '" class="" width="100px" alt="...">';
    }
?>

