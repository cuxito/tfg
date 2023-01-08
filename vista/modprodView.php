<div class="d-flex flex-column align-items-center p-3">
    <?php 
        if(isset($data['mensaje'])){
            echo '<h3 class="col-6 rounded p-2 border text-center">'.$data['mensaje'].'</h3>';
        }
    ?>
    
    <form enctype="multipart/form-data" action="<?php echo $this->url("web", "accionesprod")?>" class="col-6" method="post">
    <h4 class="text-center">Modificar Producto <?php echo $data['producto'][0]['nombre_prod'];?></h4>
    <div class="border rounded p-2">
    <img src="data:image/jpeg;base64,<?php echo $data['producto'][0]['imagen'];?>" height="200px" alt="<?php echo $data['producto'][0]['nombre_prod'];?>">
        <div class="mb-3">
            <label class="form-label">Nueva Imagen</label>
            <input type="file" class="form-control" name="imagen" accept="image/*">
        </div>
        <div class="mb-3">
          <label class="form-label">Nombre</label>
          <input type="text" class="form-control" name="nombre_prod" value="<?php echo $data['producto'][0]['nombre_prod'];?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Proveedor</label>
          <select name="proveedor" class="form-select" >
            <?php 
                $fecha_act = date('Y-m-d');
                foreach ($data['proveedores'] as $fila) {
                    var_dump($fila);
                    echo '<option value="'.$fila['cod_prov'].'"';
                    if($fila['cod_prov']==$data['producto'][0]['cod_prov']){
                        echo 'selected';
                    }
                    echo '>'.$fila['nom_prov'].'</option>';
                }
            ?>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Cantidad de producto</label>
          <input type="text" class="form-control" name="cantidad_prod" value="<?php echo $data['producto'][0]['cantidad_prod'];?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Categoria</label>
          <select name="categoria" class="form-select" >
                <option value="suplementos" <?php if($data['producto'][0]['categoria']=="suplementos"){echo 'selected';} ?>>Suplementos</option>
                <option value="frescos" <?php if($data['producto'][0]['categoria']=="frescos"){echo 'selected';} ?>>Frescos</option>
                <option value="alimentacion"  <?php if($data['producto'][0]['categoria']=="alimentacion"){echo 'selected';} ?>>Alimentacion</option>
                <option value="cosmetica-e-higiene" <?php if($data['producto'][0]['categoria']=="cosmetica-e-higiene"){echo 'selected';} ?>>Cosmetica e higiene</option>
                <option value="mama-y-bebe" <?php if($data['producto'][0]['categoria']=="mama-y-bebe"){echo 'selected';} ?>>Mama y bebe</option>
                <option value="hogar-y-huerto" <?php if($data['producto'][0]['categoria']=="hogar-y-huerto"){echo 'selected';} ?>>Hogar y huerto</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Stock</label>
          <input type="number" class="form-control" name="stock" min="1" value="<?php echo $data['producto'][0]['stock'];?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Precio</label>
          <input type="number" class="form-control" name="precio_compra" step="0.01" value="<?php echo $data['producto'][0]['PVP'];?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Fecha de caducidad</label>
          <input type="date" class="form-control" name="fecha_caducidad" min="<?php echo $fecha_act;?>" value="<?php if(isset($data['producto'][0]['fecha_caducidad'])){echo $data['producto'][0]['fecha_caducidad'];}?>">
        </div>
        <input type="hidden" name="id_producto" value="<?php echo $data['producto'][0]['id_producto'];?>">
        <button type="submit" class="btn btn-primary w-100" name="modificar">Modificar Producto</button>
    </div>
</form>
</div>