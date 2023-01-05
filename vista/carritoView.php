<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Imagen</th>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Actualizar</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($_SESSION['carrito'] as $fila) {
                    echo '<tr>';
                    echo '<td>'. $fila[4] .'</td>
                            <td>'. $fila[1] .'</td>
                            <td>'. $fila[3]*$fila[2] .'</td>
                            <form method="post" action="'. $this->url("web", "modborrar") .'">
                                <input type="hidden" name="id_usu" value="'. $fila[0] .'">
                                <td><input type="submit" value="Modificar" name="mod" class="btn btn-danger"></td>
                                <td><input type="submit" value="Borrar" name="borrar" class="btn btn-danger"></td>
                            </form>
                    </tr>';
                }
            ?>
        </tbody>
    </table>
</div>