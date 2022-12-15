<div class="d-flex flex-column align-items-center p-3">
    <?php 
        if(isset($data['mensaje'])){
            echo '<h3 class="col-6 rounded p-2 border text-center text-danger">'.$data['mensaje'].'</h3>';
        }
    ?>

<form action="<?php echo $this->url("web", "modificar")?>" class="col-6" method="post">
    <h4 class="text-center">Modificar Proveedor</h4>
    <div class="border rounded p-2">
        <input type="text" hidden="" name="codproveedor" value="<?php echo $proveedor[0]['codproveedor']; ?>">
        <div class="mb-3">
            <label class="form-label">Cod Proveedor</label>
            <input type="number" class="form-control" placeholder="<?php echo $proveedor[0]['codproveedor']; ?>" disabled>
        </div>
        <div class="mb-3">
          <label class="form-label">Nombre Proveedor</label>
          <input type="text" class="form-control" name="nombre" value="<?php echo $proveedor[0]['nombre']; ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Poblacion</label>
          <input type="text" class="form-control" name="poblacion" value="<?php echo $proveedor[0]['poblacion']; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Telefono</label>
            <input type="number" class="form-control" name="telefono" placeholder="<?php echo $proveedor[0]['telefono']; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">proveedores</label>
            <select class="form-select" name="categoria">
                <option>Servicios</option>
                <option>Materiales</option>
                <option>Productos</option>
                <option>Recursos</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary w-100">Modificar</button>
    </div>
</form>