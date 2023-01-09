<div class="container mt-4 contenedorindex">
    <div class="indexpromocion mb-4">
        <h3>Productos destacados</h3>
<?php
    echo '<div class="card-group">';
    foreach($data['destacados'] as $fila){
        echo '<div class="card">
            <img src="data:image/jpeg;base64,'.$fila['imagen'].'" class="card-img-top" alt="'.$fila['nombre_prod'].'">
            <div class="card-body">
                    <p>'.$fila['nom_prov'].'</p>
                    <h5 class="card-tittle">'.$fila['nombre_prod'].'</h5>
                    <p class="cantidad-prod">'.$fila['cantidad_prod'].'<p>'
                    .'<div class="card-price">';
                        if ($fila['descuento']!= '0'){
                            echo '<h3 style="color:red;">'.round($fila['PVP']-(($fila['PVP']*$fila['descuento'])/100),2).'€</h3><p>'.$fila['PVP'].'€</p>'
                            .'<h5>'.$fila['descuento'].'%</h5>'
                            
                            .'<input type="hidden" name="precio" value="'.round($fila['PVP']-(($fila['PVP']*$fila['descuento'])/100),2).'">';
                        }
                        else{
                            echo '<h3>'.$fila['PVP'].'€</h3>'
                            .'<input type="hidden" name="precio" value="'.$fila['PVP'].'">';;
                        };
                    echo '</div>';
                    echo '</div>';
        echo '</div>';
        
        
    }
    echo '</div>';
    echo '</div>';
    echo '<div class="indexpromocion mb-4">
    <h3>Productos en oferta</h3>';
    echo '<div class="card-group">';
    foreach($data['ofertas'] as $fila){
        echo '<div class="card">
            <img src="data:image/jpeg;base64,'.$fila['imagen'].'" class="card-img-top" alt="'.$fila['nombre_prod'].'">
            <div class="card-body">
                    <p>'.$fila['nom_prov'].'</p>
                    <h5 class="card-tittle">'.$fila['nombre_prod'].'</h5>
                    <p class="cantidad-prod">'.$fila['cantidad_prod'].'<p>'
                    .'<div class="card-price">';
                        if ($fila['descuento']!= '0'){
                            echo '<h3 style="color:red;">'.round($fila['PVP']-(($fila['PVP']*$fila['descuento'])/100),2).'€</h3><p>'.$fila['PVP'].'€</p>'
                            .'<h5>'.$fila['descuento'].'%</h5>'
                            
                            .'<input type="hidden" name="precio" value="'.round($fila['PVP']-(($fila['PVP']*$fila['descuento'])/100),2).'">';
                        }
                        else{
                            echo '<h3>'.$fila['PVP'].'€</h3>'
                            .'<input type="hidden" name="precio" value="'.$fila['PVP'].'">';;
                        };
                    echo '</div>';
                    echo '</div>';
        echo '</div>';
        
        
    }
    echo '</div>';
    echo '</div>';
?>
</div>
