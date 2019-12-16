
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card bg-white">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h5 class="h3 mb-0">Portada</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <?php foreach ($resultado as $dato):?>
                <div class="p-2">
                  <div class="card card-profile border-bottom-secondary shadow h-100 boton" style="width: 180px; height: 450px;" rel="<?php echo $dato->ejem_id;?>" data-toggle="modal" data-target="#exampleModalCenter">
                    <img src="<?php echo base_url().'uploads/'.$dato->ejem_portada?>" alt="Image placeholder" class="card-img-top">

                    <div class="card-body">
                      <div class="text-center">
                        <h5 class="h6 text-dark" ><?php echo $dato->ejem_titulo; ?></h5>
                        <div class="h6">
                          <i><?php echo $dato->auto_nombres; ?></i>
                        </div>
                        <div>
                          <i class="far fa-star"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body contenido">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>