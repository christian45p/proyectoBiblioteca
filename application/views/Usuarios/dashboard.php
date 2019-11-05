
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
                  <div class="card card-profile border-bottom-secondary shadow h-100" style="width: 180px; height: 450px;">
                    <img src="<?php echo base_url().'uploads/'.$dato->ejem_portada?>" alt="Image placeholder" class="card-img-top">

                    <div class="card-body">
                      <div class="text-center">
                        <h5 class="h6 text-dark"><?php echo $dato->ejem_titulo; ?></h5>
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