
<?php 
    if(isset($data[0])){
        echo'<div class="container">
        <table class="table mt-4">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Nombre Usuario</th>
                    <th scope="col">Accion</th>
                    <th scope="col">Nombre Producto</th>
                    <th scope="col">Descripcion</th>
                </tr>
            </thead>
            <tbody>';
                    foreach ($data as $fila) {
                        if($fila['tipo']=='administrador'){
                            echo '<tr class="table-warning">';
                        }else{echo '<tr class="table-success">';}
                        
                        echo '<td>'. $fila['fecha'] .'</td>
                                <td>'.$fila['id_usuario'].' - '. $fila['nombre_comp'] .'</td>
                                <td>'. $fila['accion'] .'</td>
                                <td>'. $fila['id_producto'].' - '. $fila['nombre_prod'] .'</td>
                                <td>'. $fila['descripcion'] .'</td>
                        </tr>';
                    }
            echo '</tbody>
        </table>
    </div>';
    }else{
        echo'<div class="container">
            <h1 class="text-center text-danger m-5"><i class="bi bi-exclamation-circle"></i> NO se han realizado gestiones todavia</h1> 
        </div>';
    }
?>
