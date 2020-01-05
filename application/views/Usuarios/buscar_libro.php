    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card bg-white">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h5 class="h3 mb-0 text-dark">Buscar Libro</h5>
                </div>
              </div> 
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-xl-12">
                  <div class="card-header py-0">
                    <form action="<?php echo base_url('usuario/buscarLibro');?>" method = "post">
                    <div class="form-row">
                        <div class=" col-md-2" >
                                <select id="inputState" class="form-control" name=""  >
                                  <option value="1" >Area - Categoria</option>
                                </select>
                        </div>                    
                      <div class="col-md-10 d-block">
                        <div class="navbar-search navbar-search-light" id="navbar-search-main">
                          <div class="form-group md-10">
                            <div class="input-group input-group-alternative input-group-merge">
                              <input class="form-control" placeholder="Buscar" type="text" name="valor">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                              </div>
                            </div>
                          </div>
                        </div>                   
                      </div>
                    </div>
                    <div class="form-inline ">
                      <div class="form-check mr-3">
                          <input class="form-check-input"  id="chk-todo-task-2" type="checkbox" checked>
                          <label class="form-check-input" for="chk-todo-task-2">Titulo</label>
                      </div>  
                      <div class="form-check mr-3">
                          <input class="form-check-input" id="chk-todo-task-2" type="checkbox">
                          <label class="form-check-input" for="chk-todo-task-2">Autor</label>
                      </div>  
                      <div class="form-check mr-3">
                          <input class="form-check-input" id="chk-todo-task-3" type="checkbox">
                          <label class="form-check-input" for="chk-todo-task-3">Anio</label>
                      </div>  
                      <div class="form-check mr-3">
                          <input class="form-check-input" id="chk-todo-task-4" type="checkbox">
                          <label class="form-check-input" for="chk-todo-task-4">Isbn</label>
                      </div>  
                      <div class="form-check mr-3">
                          <input class="form-check-input" id="chk-todo-task-5" type="checkbox">
                          <label class="form-check-input" for="chk-todo-task-5">Editorial</label>

                      </div>                      
                    </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>
            <?php foreach ($resultado as $dato):?>
            <div class="card-body">
              <ul class="list-group list-group-flush list my--3">
                <li class="list-group-item px-0">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <a href="#" class="rounded">
                        <img alt="..." class="img-fluid shadow shadow-lg--hover" src="<?php echo base_url('uploads/'.$dato->ejem_portada)?>" style="width: 100px">
                      </a>
                    </div>
                    <div class="col-md-7">
                      <h4 class="h5 text-uppercase text-dark font-weight-bold">
                        <?php echo $dato->ejem_titulo; ?></a>
                      </h4 class="font-italic">
                      <p><?php echo $dato->ejem_resumen; ?></p>
                    </div>
                   <div class="col-auto test-right boton" rel="<?php echo $dato->ejem_id;?>" data-toggle="modal" data-target=".bd-example-modal-lg">
                      <a class="table-action btn btn-primary rounded btn-sm text-white" >
                        Generar peticion
                      </a>
                      <a href=""  class="table-action btn btn-secondary btn-sm text-white" >
                        <i class="fa fa-star"></i>
                      </a>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          <?php endforeach;?>
          </div>
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