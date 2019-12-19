<div class="card mb-4 border border-dark m-5 rounded-lg">
  <div class="card-header py-3">
    <h2>Ejemplar # <?= $ejemplar->ejem_id ?> </h2>
  </div>
  <div class="card-body">
    <form class="form-horizontal" action="<?= base_url('index.php/administrador/update') ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $ejemplar->ejem_id ?>">
      <div class="form-row">
        <div class="form-group col-md-6">
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
              <label for="titulo">Autores</label>
              <div>
                <select class="cmultiple form-control form-control-md border border-dark" name="autores[]" multiple>
                  <?php foreach ($autores as $autor) :  ?>
                    <option value="<?php echo $autor->auto_id; ?>" 
                    <?php foreach ($autores_sel as $sel) {
                          if ($autor->auto_id == $sel->rela_auto_id) {
                            echo "selected";
                          }
                        }
                        ?>><?php echo $autor->auto_nombres; ?></option>
                  <?php endforeach; ?>
                </select>
            
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="editorial">Editorial</label>
              <div>
                <input type="text" class="form-control form-control-md border border-dark" id="editorial" name="editorial" value="<?= $ejemplar->ejem_editorial ?>" placeholder="Editorial">
              </div>
            </div>
            <div class="form-group col-md-6">
              <label for="paginas">Pagina</label>
              <div>
                <input type="text" class="form-control form-control-md border border-dark" id="paginas" name="paginas" value="<?= $ejemplar->ejem_paginas ?>" placeholder="Paginas">
              </div>
            </div>
            <div class="form-group col-md-12">
              <label for="isbn">Isbn</label>
              <div>
                <input type="text" class="form-control form-control-md border border-dark" id="isbn" name="isbn" value="<?= $ejemplar->ejem_isbn ?>" placeholder="Isbn">
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="año">Año</label>
              <div>
                <input type="text" class="form-control form-control-md border border-dark" id="año" name="año" value="<?= $ejemplar->ejem_anio ?>" placeholder="año">
              </div>
            </div>
            <div class="form-group col-md-6">
              <label for="idioma">Idioma</label>
              <div>
                <input type="text" class="form-control form-control-md border border-dark" id="idioma" name="idioma" value="<?= $ejemplar->ejem_idioma ?>" placeholder="Idioma">
              </div>
            </div>
            <div class="form-group col-md-6">
               <label for="isbn">Categoria</label>
              <select class="custom-select border-dark" name="categoria">
                <option>¿¿Categoría??</option>
                <?php foreach ($categoria as $cate) :  ?>
                  <option value="<?php echo $cate->cate_id;?>" <?php if($ejemplar->ejem_cate_id == $cate->cate_id){
                        echo "selected";} ?>>
                        <?php echo $cate->cate_nombre; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-6">
               <label for="isbn">Tipo</label>
              <select class="custom-select border-dark" name="tipo">
                <option>¿¿Tipo??</option>
                <?php foreach ($tipo as $t) :  ?>
                  <option value="<?php echo $t->tipo_id; ?>" <?php if ($t->ejem_tipo_id == $t->tipo_id) {echo "selected";} ?>>
                        <?php echo $t->tipo_nombre; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        <div class="form-row">
        <div class="form-group col-md-12">
            <label for="">Resumen</label>
              <textarea class="form-control border-dark" id="exampleFormControlTextarea1" rows="2" name="resumen" id="resumen"><?= $ejemplar->ejem_resumen;?></textarea>
          </div> 
        </div>
        </div>
    <div class="form-group col-md-6">
        <div class="form-row">
          <div class="form-group col-md-6 mb-7">
            <div class="custom-file">
            <label class="form-control-label" for="validationCustom05">Imagen de portada</label>
            <input type="text" name="ejem_portada" value="<?= $ejemplar->ejem_portada ?>" hidden>
            <div class="card"><img class="card-img-top" src="<?php echo base_url('uploads/'.$ejemplar->ejem_portada)?>"  alt="...">
            </div>
            </div>
            <label class="form-control-label" for="validationCustom05">Actualizar portada</label>
            <div class="custom-file">
             <input type="file" class="custom-file-input" id="customFileLang" name="new_ejem_portada">
             <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
            </div>
          </div>
        </div>
      </div>
        </div>
      <hr class="sidebar-divider my-2">
      <div class="text-center">
        <a href="<?= base_url('administrador/ejemplar') ?>" class="btn btn-danger mb-2 btn-sm">Cancelar</a>
        <button type="submit" class="btn btn-success mb-2 btn-sm">Guardar</button>
      </div>
    </form>
  </div>
</div>