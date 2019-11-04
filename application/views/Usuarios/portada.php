    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Portada</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="<?php echo base_url();?>usuario/portada"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Portada</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card bg-white">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h5 class="h3 mb-0">Libros Recientes</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <?php foreach ($resultado as $dato):?>
                <div class="p-2">
                  <div class="card card-profile" style="width: 150px;">
                    <img src="<?php echo base_url().'uploads/'.$dato->ejem_portada?>" alt="Image placeholder" class="card-img-top">

                    <div class="card-body">
                      <div class="text-center">
                        <h5 class="h5"><?php echo $dato->ejem_titulo; ?></h5>
                        <div class="h5 font-weight-300">
                          <i><?php echo $dato->auto_nombres; ?></i>
                        </div>
                        <h6 class="h3"><?php echo $dato->ejem_valoracion .' / 5'; ?></h6>
                      </div>
                    </div>
                    <div class="card-body border-0 pt-4 pt-md-4 pb-0 pb-md-4">
                      <div class="d-flex justify-content-between">
                        <a href="#" class="btn btn-sm btn-danger">Favorito</a>
                        <button type="button" class="btn btn-facebook btn-icon btn-sm">
                          <span class="btn-inner--icon"><i class="fab fa-facebook"></i></span>
                        </button>
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