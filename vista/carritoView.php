<div class="container">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Imagen</th>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $preciototal = 0;
                foreach ($_SESSION['carrito'] as $fila) {
                    $preciototal = $preciototal+($fila[3]*$fila[2]);
                    echo '<tr>';
                    echo '<td><img src="data:image/jpeg;base64,' . $fila[4] . '" alt="'.$fila[1].'" height="100px"></td>
                            <td>'. $fila[1] .'</td>
                            <td>'. $fila[2] .'</td>
                            <td>'. $fila[3]*$fila[2] .'€</td>
                            <form method="post" action="'. $this->url("web", "modborrar") .'">
                                <input type="hidden" name="id_usu" value="'. $fila[0] .'">
                                <td><input type="submit" value="Borrar" name="borrar" class="btn btn-danger"></td>
                            </form>
                    </tr>';
                }
            ?>
        </tbody>
    </table>
    <h3>Precio total: <?php echo $preciototal;?>€</h3>
    <form method="post" action="<?php echo $this->url("web", "accionescarro") ?>">
        <input type="submit" value="Realizar compra" class="btn btn-danger" name="realizarcompra">
        <input type="submit" value="borrar carro" class="btn btn-danger" name="borrarcarro">
    </form>
</div>