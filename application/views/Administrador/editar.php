<div class="card mb-4 border border-dark m-5 rounded-lg">
    <div class="card-header py-3">
        <h2>Ejemplar # <?= $ejemplar->ejem_id?> </h2>
    </div>
    <div class="card-body">
        <form class="form-horizontal" action="<?= base_url('index.php/administrador/update')?>" method="post">
        <input type="hidden" name="id" value="<?= $ejemplar->ejem_id?>">
          <div class="form-row">
            <div class="form-group col-md-12">

              <div class="form-row">
                <div class="form-group col-md-12">
                <label for="titulo">Titulo</label>
                <div>
                    <input type="text" class="form-control form-control-md border border-dark" id="titulo" name="titulo" value="<?= $ejemplar->ejem_titulo ?>" placeholder="Titulo">
                </div>
            </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="editorial">Editorial</label>
                    <div>
                        <input type="text" class="form-control form-control-md border border-dark" id="editorial" name="editorial" value="<?= $ejemplar->ejem_editorial?>" placeholder="Editorial">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="paginas">Pagina</label>
                    <div>
                        <input type="text" class="form-control form-control-md border border-dark" id="paginas" name="paginas" value="<?= $ejemplar->ejem_paginas?>" placeholder="Paginas">
                    </div>
                </div>
              </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="isbn">Isbn</label>
                <div>
                    <input type="text" class="form-control form-control-md border border-dark" id="isbn" name="isbn" value="<?= $ejemplar->ejem_isbn?>" placeholder="Isbn">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="idioma" >Idioma</label>
                <div>
                    <input type="text" class="form-control form-control-md border border-dark" id="idioma" name="idioma" value="<?= $ejemplar->ejem_idioma?>"  placeholder="Idioma">
                </div>
            </div>
            <div class="form-group col-md-6">
            <select class="custom-select border-dark" name="categoria">
              <option selected>¿¿Categoría??</option>
              <?php foreach ($categoria as $cate):  ?>
                <option value="<?php echo $cate->cate_id; ?>"><?php echo $cate->cate_nombre; ?></option>
              <?php endforeach; ?>
              
            </select>
            </div>
            <div class="form-group col-md-6">         
                <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" name="ejem_portada">
                <label class="custom-file-label border-dark" for="customFile">Archivo Digital</label>
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

