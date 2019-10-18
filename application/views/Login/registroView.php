
<div class="text-center mt-5">
      <ul class="nav navbar-nav">
      <li><a class="btn btn-warning" href="<?php echo base_url()?>Login">LOGIN-INICIO</a></li>
    </ul>
</div>
<div class="row justify-content-center">
          <div class="col-xl-6 col-lg-8 col-md-10">
              <div class="col-md-12 p-3">
              	<h2 class="font-italic text-muted col-md-12 h4">Registro</h2>
<div class="form-row">
<div class="form-group col-md-12">
<div class="card o-hidden border-1 shadow-sm p-3 mb-5 bg-white rounded">
 <div class="card-body p-0">
<div class="col-md-12">
     <div class="p-4">
		<form role="form" name="registro" action="<?php echo base_url();?>Login/evaluaRegistro" method="post">
		  <div class="form-group">
		    <label for="text">Código de Estudiante</label>
		    <input type="text" class="form-control" id="username" name="usua_codigo" placeholder="Código de Estudiante">
		  </div>
		  <div class="form-group">
		    <label for="text">Nombres</label>
		    <input type="text" class="form-control" id="nombres" name="usua_nombres" placeholder="Nombres">
		  </div>
		  <div class="form-group">
		    <label for="text">Apellidos</label>
		    <input type="text" class="form-control" id="apellidos" name="usua_apellidos" placeholder="Apellidos">
		  </div>
		  <div class="form-group">
		    <label for="text">Dirección</label>
		    <input type="text" class="form-control" id="direccion" name="usua_direccion" placeholder="Dirección">
		  </div>
		  <div class="form-group">
		    <label for="text">Usuario</label>
		    <input type="text" class="form-control" id="usuario" name="usua_login" placeholder="Usuario">
		  </div>
		  <div class="form-group">
		    <label for="confirm_password">Contraseña</label>
		    <input type="password" class="form-control" id="contraseña" name="usua_password" placeholder="Contraseña">
		  </div>
		  <div class="form-group">
		    <label for="confirm_password">Confirmar Contrase&ntilde;a</label>
		    <input type="password" class="form-control" id="confirm_password" name="confirmar" placeholder="Confirmar Contrase&ntilde;a">
		  </div>
		  <div class="form-group">
		    <label for="email">Email</label>
		    <input type="email" class="form-control" id="email" name="usua_email" placeholder="Email">
		  </div>
		  <div class="form-group">
		    <label for="text">Teléfono</label>
		    <input type="text" class="form-control" id="telefono" name="usua_telefono" placeholder="Teléfono">
		  </div>
		 <!--  <div class="form-group">
          <input class="border-primary"  style="width:30px;height:30px;" type="checkbox" value="1" name="usua_esadmin">Administrador?
       	  </div> -->
 			<hr class="sidebar-divider my-3 mb-2">
			<button type="submit" class="btn btn-warning btn-block mb-2">Registrar</button>
       			</div>
			</div>
			</div>
		</div>
		</div>
	</div>
</div>
