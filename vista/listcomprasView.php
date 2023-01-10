<div class="container">
    
    <?php 
        if(sizeof($data)==0){
            echo '<h1 class="text-center text-danger m-5"><i class="bi bi-exclamation-circle"></i> NO se han realizado compras todavia</h1>';
        }
        $ini = 0;
        $x = 0;
        foreach($data as $fila){
            if($fila['num_compra']!=$ini){
                $importetotal = 0;
                $ini = $fila['num_compra'];
                echo '<div class="table-responsive">
                        <table class="table table-striped table-hover mt-4">
                            <thead class="table-dark">
                                <tr>
                                    <th>Numero de compra</th>
                                    <td>'.$fila['num_compra'].'</td>
                                    <th>Fecha de compra</th>
                                    <td>'.$fila['fecha'].'</td>
                                </tr>
                                <tr>
                                    <th>imagen</th>
                                    <th>nombre</th>
                                    <th>cantidad</th>
                                    <th>importe</th>
                                </tr>
                            </thead>
                            <tbody>';
            }
            $importetotal = $importetotal + $fila['importe'];
            echo '<tr>
                        <td><img src="data:image/jpeg;base64,' . $fila['imagen'] . '" alt="'.$fila['nombre_prod'].'" height="100px"></td>
                        <td>'.$fila['nombre_prod'].'</td>
                        <td>'.$fila['cantidad'].'</td>
                        <td>'.$fila['importe'].'€</td>
                    </tr>';
            if(isset($data[$x+1])){
                if($data[$x+1]['num_compra']!=$ini){
                    echo '<tr class="table-info">
                            <th>Importe total</th>
                            ';
                    if(isset($fila['id_usuario'])){
                        echo'<td>'.$importetotal.'€</td>
                            <th>Id usuario</th>
                            <td>'.$fila['id_usuario'].'</td>';
                    }else{echo '<td colspan="3">'.$importetotal.'€</td>';}
                    echo '
                        </tr>
                        </tbody>
                        </table>
                        </div>';
                }
            }
            else{
                
                echo '<tr class="table-info">
                            <th>Importe total</th>
                            ';
                    if(isset($fila['id_usuario'])){
                        echo'<td>'.$importetotal.'€</td>
                            <th>Id usuario</th>
                            <td>'.$fila['id_usuario'].'</td>';
                    }else{echo '<td colspan="3">'.$importetotal.'€</td>';}
                    echo '
                        </tr>
                        </tbody>
                        </table>
                        </div>';
            }
            $x++;
        }
    ?>
</div>