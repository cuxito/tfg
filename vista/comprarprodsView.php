<div class="container">
    <?php 
         if(isset($data['mensaje'])){
            echo '<h3 class="mt-4 rounded p-2 border text-center">'.$data['mensaje'].'</h3>';
        }
    ?>
    <table class="table table-striped table-hover mt-4">
        <thead class="table-dark">
            <tr>
                <th scope="col">Imagen</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <?php 
                    if(isset($data['productos'][0]['stock'])){
                        echo '<th>Stock actual</th>';
                    }
                    if(isset($data['productos'][0]['fecha_caducidad'])){
                        echo '<th>Fecha_caducidad</th>';
                    }
                ?>
                <th scope="col">Cantidad</th>
                <th scope="col">Comprar</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($data['productos'] as $fila) {
                    $precio = round($fila['precio_prov']+(($fila['precio_prov']*15)/100),2);
                    echo '<tr">
                            <td><img src="data:image/jpeg;base64,' . $fila['imagen'] . '" alt="'.$fila['nombre_prod'].'" height="50px"></td>
                            <td>'.$fila['nombre_prod'].'<br><p>'.$fila['cantidad_prod'].'</p>';
                            if(isset($fila['nom_prov'])){
                                echo '<br><p><strong>Proveedor: </strong>'.$fila['nom_prov'].'<strong> tlf:</strong>'.$fila['telefono'].'</p>';
                            }
                            echo '</td>
                            <td>'.$precio.'€</td>';
                    if(isset($fila['stock'])){
                        echo '<td>'.$fila['stock'].'</td>';
                    };
                    if(isset($fila['fecha_caducidad'])){
                            $fecha = date_create(date("Y-m-d"));
                            $fecha = date_add($fecha, date_interval_create_from_date_string('1 months'));
                            echo '<td>'.$fila['fecha_caducidad'].'</td>';
                    }else{
                        echo '<td>No perecedero</td>';
                    }
                    echo '<form method="post" action="'. $this->url("web", "comprarprods") .'">
                            <input type="hidden" name="cod_prov" value="'. $fila['cod_prov'] .'">
                            <input type="hidden" name="id_prod" value="'. $fila['id_producto'] .'">
                            <input type="hidden" name="nombre" value="'. $fila['nombre_prod'] .'">
                            <input type="hidden" name="fecha_cad" value="'. $fila['fecha_caducidad'] .'">
                            <input type="hidden" name="precio" value="'. $precio .'">
                            <td><input type="number"';
                            if(isset($fila['stock'])){
                                echo 'value="30" min="30"';
                            }else{echo 'value="1" min="1"';}
                            echo 'name="cantidad" class="form_control"></td>
                            <td><input type="submit" value="Comprar" class="btn btn-danger"></td>
                        </form>
                </tr>';
                }
            ?>
        </tbody>
    </table>
</div>