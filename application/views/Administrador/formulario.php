<h2>Ejemplar</h2>
<form class="form-horizontal" action="<?= base_url('administrador/insert')?>" method="post">
	<input type="hidden" name="id" value="">
    <div class="form-group">
        <label for="titulo" class="col-sm-2 control-label">Titulo</label>
        <div class="col-5">
            <input type="text" class="form-control" id="titulo" name="titulo" value="" placeholder="Titulo">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="editorial" class="col-sm-2 control-label">Editorial</label>
            <div class="col">
                <input type="text" class="form-control" id="editorial" name="editorial" value="" placeholder="Editorial">
            </div>
        </div>
        <div class="form-group">
            <label for="paginas" class="col-sm-2 control-label">Pagina</label>
            <div class="col">
                <input type="text" class="form-control" id="paginas" name="paginas" value="" placeholder="Paginas">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="isbn" class="col-sm-2 control-label">Isbn</label>
        <div class="col-5">
            <input type="text" class="form-control" id="isbn" name="isbn" value="" placeholder="Isbn">
        </div>
    </div>
    <div class="form-group">
        <label for="idioma" class="col-sm-2 control-label">Idioma</label>
        <div class="col-5">
            <input type="text" class="form-control" id="idioma" name="idioma" value="" placeholder="Idioma">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary col-3">Guardar</button>
            <a href="<?= base_url('administrador/ejemplar')?>" class="btn btn-danger col-3">Cancelar</a>
        </div>
    </div>
</form>
