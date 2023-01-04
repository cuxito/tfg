<div class="d-flex flex-column align-items-center p-3">
    <?php 
        if(isset($mensaje)){
            echo '<h3 class="col-6 rounded p-2 border text-center">'.$mensaje.'</h3>';
        }
    ?>
    
    <form action="<?php echo $this->url("web", "acciones")?>" class="col-6" method="post">
    <h4 class="text-center">Registrarse</h4>
    <div class="border rounded p-2">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="clave" required>
        </div>
        <input type="hidden" name="tipo" value="cliente">
        <button type="submit" class="btn btn-primary w-100" name="registrar">Registrarme</button>
    </>
</form>
</div>
