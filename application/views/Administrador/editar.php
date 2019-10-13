<div>
<h2>Ejemplar # <?= $ejemplar->ejem_id?> </h2>
<form class="form-horizontal" action="<?= base_url('index.php/administrador/update')?>" method="post">
    <input type="hidden" name="id" value="<?= $ejemplar->ejem_id?>">
    <div class="form-group">
        <label for="titulo" class="col-sm-2 control-label">Titulo</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $ejemplar->ejem_titulo ?>" placeholder="Nombres">
        </div>
    </div>
    <div class="form-group">
        <label for="editorial" class="col-sm-2 control-label">Editorial</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="editorial" name="editorial" value="<?= $ejemplar->ejem_editorial?>" placeholder="Area">
        </div>
    </div>
    <div class="form-group">
        <label for="pagina" class="col-sm-2 control-label">pagina</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="pagina" name="pagina" value="<?= $ejemplar->ejem_paginas?>" placeholder="Login">
        </div>
    </div>
    <div class="form-group">
        <label for="isbn" class="col-sm-2 control-label">isbn</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="isbn" name="isbn" value="<?= $ejemplar->ejem_isbn?>" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <label for="idioma" class="col-sm-2 control-label">idioma</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="idioma" name="idioma" value="<?= $ejemplar->ejem_idioma?>" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="<?= base_url('index.php/administrador')?>" class="btn btn-danger">Cancelar</a>
        </div>
    </div>
</form>
</div>