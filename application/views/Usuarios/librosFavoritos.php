    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card bg-white">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h5 class="h3 mb-0">Libros favoritos</h5>
                </div>
              </div>
            </div>
          <div class="col-xl-12">
            <?php $IdUsuario=$this->session->userdata('usua_id'); ?>
          <?php foreach ($resultado as $dato): if($dato->favo_usua_id==$IdUsuario):?>
            <div class="card-body">
              <ul class="list-group list-group-flush list my--3">
                <li class="list-group-item px-0">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <img alt="..." src="<?php echo base_url().'uploads/'.$dato->ejem_portada?>" style="width: 80px;">
                    </div>
                    <div class="col ml--2">
                      <h4 class="mb-0">
                         <h1 class="h6 font-italic text-uppercase" id="titulo"><?php echo $dato->ejem_titulo; ?></h1>
                        <a href=""></a>
                      </h4>
                      <small><h1 class="h6" id="resumen"><?php echo $dato->ejem_resumen;?></h1></small>
                    </div>
                    <div class="col-auto">
                      <a href="<?php echo base_url().'usuario/eliminarFavoritoPortada/'.$dato->favo_ejem_id?>"  class="table-action btn btn-sm btn-danger text-white" data-toggle="tooltip" data-original-title="Eliminar favorito">
                              <i class="fa fa-times"></i>
                      </a>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          <?php endif; endforeach; ?>
          </div>
          </div>
        </div>
      </div>
    </div>