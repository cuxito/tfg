<h2>Acciones usuarios</h2>
<div class="container">
    <form method="post" action="<?php echo $this->url("web", "acciones"); ?>">
        <input type="submit" class="btn-primary btn" value="Añadir usuarios" name="añadirusu">
        <input type="submit" class="btn-primary btn" value="listar usuarios" name="listusu">
        <label class="form-label">Listar compra por correo de cliente</label>
        <input type="email" class="form-control" name="emailcli">
        <input type="submit" class="btn-primary btn" value="listar Compra" name="listcompracli">
        <label class="form-label">Listar compra por id de compra</label>
        <input type="number" class="form-control" name="idcompra">
        <input type="submit" class="btn-primary btn" value="listar Compra" name="listcompraid">
        <input type="submit" class="btn-primary btn" value="Añadir proveedor" name="añadirprov">
        <input type="submit" class="btn-primary btn" value="listar proveedores" name="listprov">
        <input type="submit" class="btn-primary btn" value="ReStock" name="restock">
    </form>
</div>