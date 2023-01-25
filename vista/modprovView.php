<div class="d-flex flex-column align-items-center p-3">
    <?php 
        if(isset($data['mensaje'])){
            echo '<h3 class="col-6 rounded p-2 border text-center">'.$data['mensaje'].'</h3>';
        }
    ?>
    <form class="w-50 mb-2" method="post" action="<?php echo $this->url("web", "acciones");?>">
        <button type="submit" class="btn btn-danger w-100 mt-2" name="cancelar">Volver</button>
    </form>
    <form action="<?php echo $this->url("web", "acciones")?>" class="col-6" method="post">
        <h4 class="text-center">Modificando Proveedor <?php echo $data["proveedor"][0]['nom_prov'];?></h4>
        <div class="border rounded p-2">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $data["proveedor"][0]['nom_prov']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Telefono</label>
                <input type="number" class="form-control" name="telefono" value="<?php echo $data["proveedor"][0]['telefono']; ?>" required>
            </div>
            <div class="mb-3"> 
                <label class="form-label">Direccion</label>
                <input type="text" class="form-control" name="direccion" value="<?php echo $data["proveedor"][0]['direccion']; ?>" required>
            </div>
            <input type="hidden" name="cod_prov" value="<?php echo $data["proveedor"][0]['cod_prov'] ?>">
            <button type="submit" class="btn btn-primary w-100" name="modprov">Modificar</button>
        </div>
    </form>
</div>