<?php ?>

<div class="d-flex flex-column align-items-center p-3">
    <form class="col-6" action="<?php echo $this->url("web", "conectarse");?>" method="post">
    <h4 class="text-center">Inicia Sesion</h4>
    <?php if (isset($mensaje)) {
        echo '<p class="text-danger d-flex fs-4 text-center">' . $mensaje . "</>";
    }?>
    <div class="border rounded p-2">
        <div class="mb-3">
            <label class="form-label">Teclea nombre usuario:</label>
            <input type="text" class="form-control" name="nombre">
        </div>
        <div class="mb-3">
            <label class="form-label">Teclea Contraseña</label>
            <input type="password" class="form-control" name="clave">
        </div>

        <button type="submit" class="btn btn-primary w-100">Entrar</button>
    </div>
</form>
</div>