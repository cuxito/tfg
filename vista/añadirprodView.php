<div class="d-flex flex-column align-items-center p-3">
    <?php 
        if(isset($data['mensaje'])){
            echo '<h3 class="col-6 rounded p-2 border text-center">'.$data['mensaje'].'</h3>';
        }
    ?>
    <form class="w-50 mb-2" method="post" action="<?php echo $this->url("web", "acciones");?>">
        <button type="submit" class="btn btn-danger w-100 mt-2" name="cancelar">Volver</button>
    </form>
    <form enctype="multipart/form-data" action="<?php echo $this->url("web", "accionesprod")?>" class="col-6" method="post">
    <h4 class="text-center">Añadir Producto nuevo</h4>
    <div class="border rounded p-2">
        <div class="mb-3">
            <label class="form-label">Imagen</label>
            <input type="file" class="form-control" name="imagen" required accept="image/*">
        </div>
        <div class="mb-3">
          <label class="form-label">Nombre</label>
          <input type="text" class="form-control" name="nombre_prod" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Proveedor</label>
          <select name="proveedor" class="form-select" required>
            <?php 
                $fecha_act = date('Y-m-d');
                foreach ($data['proveedores'] as $fila) {
                    var_dump($fila);
                    echo '<option value="'.$fila['cod_prov'].'">'.$fila['nom_prov'].'</option>';
                }
            ?>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Cantidad de producto</label>
          <input type="text" class="form-control" name="cantidad_prod" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Categoria</label>
          <select name="categoria" class="form-select" required>
                <option value="suplementos">Suplementos</option>
                <option value="frescos">Frescos</option>
                <option value="alimentacion">Alimentacion</option>
                <option value="cosmetica-e-higiene">Cosmetica e higiene</option>
                <option value="mama-y-bebe">Mama y bebe</option>
                <option value="hogar-y-huerto">Hogar y huerto</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Stock</label>
          <input type="number" class="form-control" name="stock" min="1" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Precio compra proveedor</label>
          <input type="number" class="form-control" name="precio_compra" step="0.01" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Fecha de caducidad</label>
          <input type="date" class="form-control" name="fecha_caducidad" min="<?php echo $fecha_act;?>">
        </div>
        <button type="submit" class="btn btn-primary w-100" name="añadirprod">Añadir Producto</button>
    </div>
</form>
</div>