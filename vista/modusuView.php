
<div class="d-flex flex-column align-items-center p-3">
    <form action="<?php echo $this->url("web", "registrar")?>" class="col-6" method="post">
        <h4 class="text-center">Modificando usuario <?php echo $data[0]['nombre_comp'];?></h4>
        <div class="border rounded p-2">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $data[0]['nombre_comp']; ?>" required>
            </div>
            <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $data[0]['email']; ?>" required>
            </div>
            <div class="mb-3"> 
                <label class="form-label">Tipo:</label>
                <select name="tipo" class="form-select" required>
                    <option value="cliente" <?php if($data[0]['tipo']=="cliente"){echo 'selected';} ?>>Cliente</option>
                    <option value="empleado" <?php if($data[0]['tipo']=="empleado"){echo 'selected';} ?>>Empleado</option>
                    <option value="administrador" <?php if($data[0]['tipo']=="administrador"){echo 'selected';} ?>>Administrador</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </div>
    </form>
</div>