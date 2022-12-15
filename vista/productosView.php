<?php

    foreach($data as $fila){
        echo $fila['nombre_prod'];
        echo $fila['cantidad_prod'];
        echo $fila['stock'];
        echo $fila['PVP'];
        echo $fila['descuento'],'%';
        echo '<img src="data:image/jpeg;base64, ' . $fila['imagen'] . '" class="" width="100px" alt="...">';
        echo '<br>';
    }

