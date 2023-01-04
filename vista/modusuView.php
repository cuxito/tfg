
<div class="d-flex flex-column align-items-center p-3">
    <?php 
        if(isset($data['mensaje'])){
            echo '<h3 class="col-6 rounded p-2 border text-center">'.$data['mensaje'].'</h3>';
        }
    ?>
    <form action="<?php echo $this->url("web", "acciones")?>" class="col-6" method="post">
        <h4 class="text-center">Modificando usuario <?php echo $data['cliente']['nombre_comp'];?></h4>
        <div class="border rounded p-2">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $data['cliente']['nombre_comp']; ?>" required>
            </div>
            <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $data['cliente']['email']; ?>" required>
            </div>
            <div class="mb-3"> 
                <label class="form-label">Tipo:</label>
                <select name="tipo" class="form-select" required>
                    <option value="cliente" <?php if($data['cliente']['tipo']=="cliente"){echo 'selected';} ?>>Cliente</option>
                    <option value="empleado" <?php if($data['cliente']['tipo']=="empleado"){echo 'selected';} ?>>Empleado</option>
                    <option value="administrador" <?php if($data['cliente']['tipo']=="administrador"){echo 'selected';} ?>>Administrador</option>
                </select>
            </div>
            <input type="hidden" name="id_usu" value="<?php echo $data['cliente']['id_usuario'] ?>">
            <button type="submit" class="btn btn-primary w-100" name="mod">Modificar</button>
        </div>
    </form>
</div>