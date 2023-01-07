
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id usuario</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">tipo</th>
                <th scope="col">Modificar</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($data as $fila) {
                    if($fila['tipo']=='empleado'){
                        echo '<tr class="table-warning">';
                    }else{echo '<tr class="table-success">';}
                    
                    echo '<th>'. $fila['id_usuario'] .'</th>
                            <td>'. $fila['nombre_comp'] .'</td>
                            <td>'. $fila['email'] .'</td>
                            <td>'. $fila['tipo'] .'</td>
                            <form method="post" action="'. $this->url("web", "modborrarcli") .'">
                                <input type="hidden" name="id_usu" value="'. $fila['id_usuario'] .'">
                                <td><input type="submit" value="Modificar" name="mod" class="btn btn-danger"></td>
                                <td><input type="submit" value="Borrar" name="borrar" class="btn btn-danger"></td>
                            </form>
                    </tr>';
                }
            ?>
        </tbody>
    </table>
</div>