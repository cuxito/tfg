<div class="d-flex flex-column align-items-center p-3">
<?php 
    if(isset($detalles)){
        echo '<div class="d-flex flex-column col-8 bg-light align-items-center m-3 border rounded p-3"><p class="d-flex text-danger text-center">Atencion la compra a borrar tiene '.$detalles.' detalles. Es necesario borrarlos antes de completar</p><br>';
        echo '<form action="'.$this->url("web", "borrarcompra").'" method="post">'
                . '<input type="text" hidden="" value="'.$id.'" name="idcompra">'
                . '<input type=submit value="Pulsa para confirmar el borrado de detalles" name="borrardetalles" class="btn btn-primary d-flex">'
                . '</form></div>';
    }
    if(isset($mensaje)){
        echo '<h3 class="col-6 rounded p-2 border text-center text-danger">'.$mensaje.'</h3>';
    }
?>

<table class="table col-8">
    <thead>
        <tr>
            <th scope="col">id Compra</th>
            <th scope="col">Total</th>
            <th scope="col">Metodo Pago</th>
            <th scope="col">Fecha de Compra</th>
            <th scope="col">Borrar</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach ($data['compras'] as $fila){
                echo '<tr><th>'.$fila['idcompra'].'</th>';
                echo '<td>'.$fila['total'].'</td>';
                echo '<td>'.$fila['metodopago'].'</td>';
                echo '<td>'.$fila['fechacompra'].'</td>';
                echo '<form action="';
                echo $this->url("web", "borrarcompra");
                echo '" method="post">';
                echo '<input type="text" hidden="" name="idcompra" value="'.$fila['idcompra'].'">';
                echo '<td><input type="submit" name="borrar" value="Borrar" class="btn btn-warning"></td>';
                echo '</form></tr>';
            }
        ?>
    </tbody>
</table>



