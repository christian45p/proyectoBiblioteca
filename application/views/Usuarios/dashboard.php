    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <?php foreach ($categoria as $cate): ?>
          <div class="card bg-white mb-4">
            <div class="card-header" style="background: #15202B;">
              <div class="row align-items-center">
                <div class="col">
                  <h5 class="h3 text-white mb-0"><?php echo $cate->cate_nombre;?></h5>
                </div>
              </div>
            </div>
            <div class="card-body">
            <div class="row">
              <?php foreach ($resultado as $dato): if($dato->ejem_cate_id == $cate->cate_id):?>
                <div class="p-2">
                  <div class="card card-profile border-bottom-secondary shadow h-100" style="width: 180px; height: 450px;" >
                    <img src="<?php echo base_url().'uploads/'.$dato->ejem_portada?>" alt="Image placeholder" class="card-img-top  boton" rel="<?php echo $dato->ejem_id;?>" data-toggle="modal" data-target=".bd-example-modal-lg">
 
                    <div class="card-body">
                      <div class="text-center">
                        <h5 class="h6 text-dark" ><?php echo $dato->ejem_titulo; ?></h5>
                        <div class="h6">
                          <i><?php echo $dato->auto_nombres; ?></i>
                       </div>
                          <?php if($grado==0):?>
                        <div class="card-body border-0 pt-4 pt-md-4 pb-0 pb-md-4">
                          <div class="d-flex">
                            <?php $IdUsuario=$this->session->userdata('usua_id'); ?>
                            <?php foreach ($favorito as $fav): if($dato->ejem_id == $fav->favo_ejem_id && $fav->favo_usua_id==$IdUsuario):?>
                            <a href="<?php echo base_url().'usuario/eliminarFavoritoPortada/'.$fav->favo_ejem_id?>" class="btn btn-sm btn-danger"><i class="fa fa-times-circle"></i></a> 
                          <?php endif; endforeach; ?>
                          <a href="<?php echo base_url().'usuario/agregarFavorito/'.$dato->ejem_id?>" class="btn btn-sm btn-success" ><i class="fa fa-thumbs-up"></i></a>
                      </div>
                    </div>
                        <?php endif;?>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endif; endforeach; ?>
              </div>
            </div>
          </div>
        <?php endforeach;?>
        </div>
      </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Portada</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body contenido">
        
      </div>
<!--       <div class="modal-footer">
  <button type="button" class="btn btn-d" data-dismiss="modal">Cerrar</button>
</div> -->
    </div>
  </div>
</div>


<script>
  $('.modal').find('form').submit(function(){

      $.ajax({
        method: "POST",
        url: $(this).attr('action'),
        data: $( this ).serialize()
      })
      return false;
  })

  </script>