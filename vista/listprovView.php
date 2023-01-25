<div class="container">
    <form class="w-100 mb-2" method="post" action="<?php echo $this->url("web", "acciones");?>">
        <button type="submit" class="btn btn-danger w-100 mt-2" name="cancelar">Volver</button>
    </form>
    <table class="table table-striped table-hover mt-4">
        <thead class="table-dark">
            <tr>
                <th scope="col">id proveedor</th>
                <th scope="col">Nombre</th>
                <th scope="col">Telefono</th>
                <th scope="col">Direccion</th>
                <th scope="col">Comprar</th>
                <th scope="col">Modificar</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($data as $fila) {
                    echo '<tr">
                            <td>'.$fila['cod_prov'].'</td>
                            <td>'.$fila['nom_prov'].'</td>
                            <td>'.$fila['telefono'].'</td>
                            <td>'.$fila['direccion'].'</td>
                            <form method="post" action="'. $this->url("web", "modborrarprov") .'">
                                <input type="hidden" name="cod_prov" value="'. $fila['cod_prov'] .'">
                                <td><input type="submit" value="Comprar" name="comprar" class="btn btn-danger"></td>
                                <td><input type="submit" value="Modificar" name="mod" class="btn btn-danger"></td>
                                <td><input type="submit" value="Borrar" name="borrar" class="btn btn-danger"></td>
                            </form>
                    </tr>';
                }
            ?>
        </tbody>
    </table>
</div>