<div class="card mb-4 border border-dark m-5 rounded-lg">
    <div class="card-header py-3">
        <h2>Ejemplar</h2>
    </div>
    <div class="card-body">
        <form class="form-horizontal" action="<?= base_url('administrador/insert')?>" method="post">
          <div class="form-row">
            <div class="form-group col-md-12">

              <div class="form-row">
                <div class="form-group col-md-12">
                <label for="titulo">Titulo</label>
                <div>
                    <input type="text" class="form-control form-control-md border border-dark" id="titulo" name="titulo" value="" placeholder="Titulo">
                </div>
            </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="editorial">Editorial</label>
                    <div>
                        <input type="text" class="form-control form-control-md border border-dark" id="editorial" name="editorial" value="" placeholder="Editorial">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="paginas">Pagina</label>
                    <div>
                        <input type="text" class="form-control form-control-md border border-dark" id="paginas" name="paginas" value="" placeholder="Paginas">
                    </div>
                </div>
              </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="isbn">Isbn</label>
                <div>
                    <input type="text" class="form-control form-control-md border border-dark" id="isbn" name="isbn" value="" placeholder="Isbn">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="idioma" >Idioma</label>
                <div>
                    <input type="text" class="form-control form-control-md border border-dark" id="idioma" name="idioma" value="" placeholder="Idioma">
                </div>
            </div>
              </div>
                </div>
              </div>
            <hr class="sidebar-divider my-2">
            <div class="text-center">
                <a href="<?= base_url('administrador/ejemplar')?>" class="btn btn-danger mb-2 btn-sm">Cancelar</a>
                <button type="submit" class="btn btn-success mb-2 btn-sm">Guardar</button>
            </div>
        </form>
    </div>
</div>

