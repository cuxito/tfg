
<div class="d-flex flex-column align-items-center p-3">
    <?php 
        if(isset($data['mensaje'])){
            echo '<h3 class="col-6 rounded p-2 border text-center">'.$data['mensaje'].'</h3>';
        }
    ?>
    <form class="w-50 mb-2" action="<?php echo $this->url("web", "acciones")?>" class="col-6" method="post">
        <h4 class="text-center">Modificando usuario <?php echo $data["cliente"][0]['email'];?></h4>
        <div class="border rounded p-2">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $data["cliente"][0]['nombre_comp']; ?>" required>
            </div>
            <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $data["cliente"][0]['email']; ?>" required>
            </div>
            <div class="mb-3">
            <label class="form-label">Nueva contraseña</label>
            <input type="text" class="form-control" name="nuevapass" >
            </div>
            <div class="mb-3"> 
                <label class="form-label">Tipo</label>
                <select name="tipo" class="form-select" required>
                    <option value="cliente" <?php if($data["cliente"][0]['tipo']=="cliente"){echo 'selected';} ?>>Cliente</option>
                    <option value="empleado" <?php if($data["cliente"][0]['tipo']=="empleado"){echo 'selected';} ?>>Empleado</option>
                    <option value="administrador" <?php if($data["cliente"][0]['tipo']=="administrador"){echo 'selected';} ?>>Administrador</option>
                </select>
            </div>
            <input type="hidden" name="id_usu" value="<?php echo $data["cliente"][0]['id_usuario'] ?>">
            <input type="hidden" name="viejapass" value="<?php echo $data["cliente"][0]['pass'] ?>">
            <button type="submit" class="btn btn-primary w-100" name="mod">Modificar</button>
        </div>
    </form>
</div>