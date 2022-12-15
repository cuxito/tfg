<div class="d-flex flex-column align-items-center p-3">
    <?php 
        if(isset($data['mensaje'])){
            echo '<h3 class="col-6 rounded p-2 border text-center text-danger">'.$data['mensaje'].'</h3>';
        }
    ?>

<form action="<?php echo $this->url("web", "insertarprov")?>" class="col-6" method="post">
    <h4 class="text-center">Insertar Proveedor</h4>
    <div class="border rounded p-2">
        <input type="text" hidden="" name="codproveedor" value="<?php if(isset($proveedor)){echo $proveedor[0]['codproveedor'];} ?>">
        <div class="mb-3">
          <label class="form-label">Nombre Proveedor</label>
          <input type="text" class="form-control" name="nombre" value="<?php if(isset($proveedor)){echo $proveedor[0]['nombre'];} ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Poblacion</label>
          <input type="text" class="form-control" name="poblacion" value="<?php if(isset($proveedor)){echo $proveedor[0]['poblacion'];} ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Telefono</label>
            <input type="number" class="form-control" name="telefono" placeholder="<?php if(isset($proveedor)){echo $proveedor[0]['telefono'];} ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">proveedores</label>
            <select class="form-select" name="categoria">
                <option <?php if(isset($proveedor)){if($proveedor[0]['categoria']=="Servicios"){echo 'selected';}}?>>Servicios</option>
                <option <?php if(isset($proveedor)){if($proveedor[0]['categoria']=="Materiales"){echo 'selected';}}?>>Materiales</option>
                <option <?php if(isset($proveedor)){if($proveedor[0]['categoria']=="Productos"){echo 'selected';}}?>>Productos</option>
                <option <?php if(isset($proveedor)){if($proveedor[0]['categoria']=="Recursos"){echo 'selected';}}?>>Recursos</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary w-100">Insertar Proveedor</button>
    </div>
</form>

