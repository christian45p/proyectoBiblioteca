<!--       <?php $id_usuario=$_GET['id'];
echo $id_usuario;?> -->
      <div class="row">
        <div class="col">
          <div class="card-wrapper">
                <h3 class="mb-0"></h3>
              </div>
                <form class="needs-validation" novalidate action="<?php echo base_url().'usuario/pedir' ?>" method="post">
                  <div class="form-row">
                    <div class="col-md-3 mb-3">
                      <div class="custom-file">
                        <div class="card ">
                        <?php foreach ($resultado as $dato):?>

                        <?php if($id_usuario==$dato->ejem_id):?>                          
                          <img class="card-img-top" src="<?php echo base_url().'uploads/'.$dato->ejem_portada?>"  alt="...">
                        </div>
                      </div>
                    </div>
                    <input type="hidden" name="ide" value="<?php echo $dato->ejem_id; ?>" >
                    <div class="col-md--1"></div>
                    <div class="col-md-5 mb-3">
                      <div class="form-group">
                        <p class="h5 text-dark font-weight-bold">Titulo:</p>
                      <h1 class="h6 font-italic text-uppercase" id="titulo"><?php echo $dato->ejem_titulo; ?></h1>
                      </div>
                      <div class="form-group">
                        <p class="h5 text-dark font-weight-bold">Autor(es):</p>
                        <h1 class="h6 font-italic text-uppercase" id="autor"><?php echo $dato->auto_nombres; ?></h1>
                      </div>
                      <div class="form-group">
                        <p class="h5 text-dark font-weight-bold" id="anio">Año publicacion:</p>
                      <h1 class="h6"><?php echo $dato->ejem_anio;?></h1>
                      </div>
                      <div class="form-group">
                        <p class="h5 text-dark font-weight-bold">Editorial:</p>
                      <h1 class="h6 font-italic text-uppercase" id="editorial"><?php echo $dato->ejem_editorial;?></h1>
                      </div>
                    </div>                    
                    <div class="col-md-3 mb-3">
                      <div class="form-group">
                        <p class="h5 text-dark font-weight-bold">Categoria:</p>
                      <h1 class="h6" id="paginas"><?php echo $dato->cate_nombre;?></h1>
                      </div>
                      <div class="form-group">
                        <p class="h5 text-dark font-weight-bold">Tipo:</p>
                        <h1 class="h6"><?php echo $dato->tipo_nombre;?></h1>
                      </div>
                      <div class="form-group">
                        <p class="h5 text-dark font-weight-bold">ISBN:</p>
                      <h1 class="h6 " id="isbn"><?php echo $dato->ejem_isbn;?></h1>
                      </div>
                      <div class="form-group">
                        <p class="h5 text-dark font-weight-bold">Paginas:</p>
                        <h1 class="h6" id="paginas"><?php echo $dato->ejem_paginas;?></h1>
                      </div>
                    </div>
                  </div>                  
                  <div class="form-row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <p class="h5 text-dark font-weight-bold">Resumen:</p>
                      <h1 class="h6" id="resumen"><?php echo $dato->ejem_resumen;?></h1>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      </div>
                    </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="año">Fecha de prestamo</label>
                    <div>
                        <input type="date" class="form-control form-control-md border border-dark" id="prestamo" name="fecha" value="">
                    </div>
                </div>
                <div class="form-group">
                <label for="inputAddress">Días(cantidad)</label>
                <input type="text" class="form-control form-control-sm border border-dark"  id="inputAddress" name="peti_dias" >
                 </div>
            <div class="form-group col-md-4">
              <label>Generar peticion</label>
                <div>
                <button type="submit" class="btn btn-primary pedir">Generar peticion</button>
                </div>
            </div>
             </div>

                  <?php endif;?>
                  <?php endforeach;?>
                </div>
             </div>
            </div>
          </div>
       </div>
      </div>
    </div>
  </form>
</div>
</div>
</div>
</div>