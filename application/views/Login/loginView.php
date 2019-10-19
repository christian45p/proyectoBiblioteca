
<div class="text-center mt-5 mb-2 p-3">
  <h1 class="font-italic h4">BIENVENIDO AL SISTEMA DE BIBLIOTECA</h1>
</div>
      <div class="row justify-content-center">
          <div class="col-xl-9">
            <div class="form-group row p-5">

              <div class="form-group col-md-6 p-3 ">
                <h1 class="font-italic h4">Acceso al sistema</h1>
<div class="card o-hidden border-1 shadow-sm p-3 mb-5 bg-white rounded">
    <div class="card-body p-0">
<div class="col-md-12">
 <div class="p-4">
<div class="row text-center">
   <form role="form" name="login" action="<?php echo base_url();?>Login/evaluaAcceso" method="post">
		 <div class="form-group row mb-2">
		    <label for="username ">Nombre de usuario o email</label>
		    <input type="text" class="form-control" id="username" name="usua_login" placeholder="Nombre de usuario">
        <span class="text-danger"><?php echo form_error('usua_login');?></span>
		  </div>
		  <div class="form-group row mb-2">
		    <label for="password">Contrase&ntilde;a</label>
		    <input type="password" class="form-control" id="password" name="usua_password" placeholder="Contrase&ntilde;a">
		    <span class="text-danger"><?php echo form_error('usua_password');?></span>
		  </div>
		  <hr>
      <div class="form-group row mb-7">
      	<input type="text" name="usua_esadmin" value="0" hidden="1"> 
      <input class="border-primary"  style="width:30px;height:30px; pa: 12px;" type="checkbox" value="1" name="usua_esadmin">Administrador?
      </div>
		  <button type="submit" class="btn btn-warning btn-block mb-2">Acceder</button>
		  <?php echo $this->session->flashdata('error');?>
		</form>
                            </div>
                          </div>
                      </div>
                  </div>
                </div>

              </div>
              <div class="topbar-divider d-none d-sm-block" style="border: 1px solid black; align-items: center;"></div>
              <div class="form-group col-md-5">

                <h1 class="font-italic h4">Registarse</h1>

                <div class="row p-4">
                  <p class="font-italic">Para poder utilizar el sistema de bilbliteca es necesario ser estudiante de la Universidad Nacional del Altiplano - Puno.</p>
                  <br>
                  <p>Favor de registrarse en el siguiente formulario.</p>
                </div>
                <div class="row p-4">
              <div class="col-md-12">
       <div class="text-center mt-5">
		<ul class="nav navbar-nav">  
  		<li><a class="btn btn-warning" href="<?php echo base_url()?>Login/Registro">REGISTRO</a></li> 
		</ul>
</div>
              </div>
                  </div>





              </div>

            </div>
        </div>
      </div>