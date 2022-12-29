<div class="d-flex flex-column align-items-center p-3">
    <?php 
        if(isset($mensaje)){
            echo '<h3 class="col-6 rounded p-2 border text-center">'.$mensaje.'</h3>';
        }
    ?>
    
    <form action="<?php echo $this->url("web", "registrar")?>" class="col-6" method="post">
    <h4 class="text-center">Registrarse</h4>
    <div class="border rounded p-2">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre">
        </div>
        <div class="mb-3">
            <label class="form-label">Direccion</label>
            <input type="text" class="form-control" name="direccion">
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label class="form-label">Telefono</label>
            <input type="number" class="form-control" name="telef">
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="clave">
        </div>

        <button type="submit" class="btn btn-primary w-100">Submit</button>
    </div>
</form>
</div>
