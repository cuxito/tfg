<?php 
    
    if(isset($mensaje)){
        echo '<h3 class="col-6 rounded p-2 border text-center text-danger">'.$mensaje.'</h3>';
    }
?>

<table class="table col-8">
    <thead>
        <tr>
            <th scope="col">Codproveedor</th>
            <th scope="col">Nombre</th>
            <th scope="col">Poblacion</th>
            <th scope="col">Telefono</th>
            <th scope="col">Categoria</th>
            <th scope="col">Modificar</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach ($data['proveedores'] as $fila){
                echo '<tr><th>'.$fila['codproveedor'].'</th>';
                echo '<td>'.$fila['nombre'].'</td>';
                echo '<td>'.$fila['poblacion'].'</td>';
                echo '<td>'.$fila['telefono'].'</td>';
                echo '<td>'.$fila['categoria'].'</td>';
                echo '<form action="';
                echo $this->url("web", "modprov");
                echo '" method="post">';
                echo '<input type="text" hidden="" name="codproveedor" value="'.$fila['codproveedor'].'">';
                echo '<td><input type="submit" name="modificar" value="modificar" class="btn btn-warning"></td>';
                echo '</form></tr>';
            }
        ?>
    </tbody>
</table>

