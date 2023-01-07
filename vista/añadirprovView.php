<div class="d-flex flex-column align-items-center p-3">
    <?php 
        if(isset($data['mensaje'])){
            echo '<h3 class="col-6 rounded p-2 border text-center">'.$data['mensaje'].'</h3>';
        }
    ?>
    <form action="<?php echo $this->url("web", "acciones")?>" class="col-6" method="post">
        <h4 class="text-center">Añadir Proveedor</h4>
        <div class="border rounded p-2">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Telefono</label>
                <input type="number" class="form-control" name="telefono" required>
            </div>
            <div class="mb-3"> 
                <label class="form-label">Direccion</label>
                <input type="text" class="form-control" name="direccion" required>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="añadir">Añadir</button>
        </div>
    </form>
</div>