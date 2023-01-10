
<div class="container mt-4">
    <h2 class="text-center">Acciones</h2>
    <form method="post" action="<?php echo $this->url("web", "acciones"); ?>" class="border rounded p-4 mb-4">
        <label class="form-label">Listar compra por correo de cliente</label>
        <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Correo cliente" name="emailcli" aria-label="Correo cliente" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="listcompracli">Listar</button>
        </div>
        <label class="form-label">Listar compra por Id de compra</label>
        <div class="input-group mb-3">
            <input type="number" class="form-control" placeholder="Id compra" name="idcompra" aria-label="Id compra" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="listcompraid">Listar</button>
        </div>
        <div class="mb-3">
            <label class="form-label">Acciones con usuarios-></label>
            <?php 
                if($_SESSION['perfil']==1){
                    echo '<input type="submit" class="btn-primary btn" value="Añadir usuarios" name="añadirusu">
                    ';
                }
            ?>
            <input type="submit" class="btn-primary btn" value="listar usuarios" name="listusu">
        </div>
        <div class="mb-3">
            <label class="form-label">Acciones con productos-></label>
            <button type="submit" class="btn btn-primary position-relative border-0 text-light" name="restock">ReStock
                <?php 
                    if(isset($_SESSION['mantenerstock'])){
                        echo '<span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border-0  rounded-circle">
                                <span class="visually-hidden">New alerts</span>
                            </span>';
                    }
                ?>
            </button>
            <input type="submit" class="btn-primary btn" value="Añadir producto" name="añadirprod">
        </div>
        <?php 
            if($_SESSION['perfil']==1){
                echo '<div class="mb-3">
                            <label class="form-label">Acciones con proveedores-></label>
                            <input type="submit" class="btn-primary btn" value="Añadir proveedor" name="añadirprov">
                            <input type="submit" class="btn-primary btn" value="listar proveedores" name="listprov">
                        </div>
                        <input type="submit" class="btn-primary btn" value="Listar gestiones" name="listgestiones">';
            }
        ?>
        
    </form>
</div>