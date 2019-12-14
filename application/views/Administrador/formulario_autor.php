<div class="row justify-content-center">
    <div class="col-xl-6 col-lg-8 col-md-10 ">
        <div class="col-md-12 p-3 ">
        <h2 class="font-italic text-muted col-md-12 h4">Autor</h2>
            <div class="form-row ">
                <div class="form-group col-md-12">
                    <div class="card o-hidden border-1 shadow-sm p-3 mb-5 bg-white rounded border border-dark">
                        <div class="card-body p-0">
                            <div class="col-md-12">
                                <div class="p-4">
                                    <form role="form" name="registro" action="<?php echo base_url();?>administrador/insert_autor" method="post">
                                        <div class="form-group">
                                            <label for="text">Nombre(s)</label>
                                            <input type="text" class="form-control border border-dark" id="autorname" name="aut_nombres" placeholder="nombre del autor">
                                        </div>
                                        <div class="form-group">
                                            <label for="text">Apellidos</label>
                                            <input type="text" class="form-control border border-dark" id="autorlastname" name="aut_apellidos" placeholder="apellidos del autor">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Biografia</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="auto_biografia"  rows="3"></textarea>
                                        </div>
                                                                                

                                  <!--  <div class="form-group">
                                            <input class="border-primary"  style="width:30px;height:30px;" type="checkbox" value="1" name="usua_esadmin">Administrador?
                                        </div> -->

                                        <hr class="sidebar-divider my-3 mb-2">
                                        <button type="submit" class="btn btn-success btn-block btn-sm">Registrar</button>
                                        <a href="<?= base_url('administrador/autor')?>" class="btn btn-danger btn-block btn-sm">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
        </div>
