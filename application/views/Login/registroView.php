
<div class="container">
<div class="row justify-content-md-center">

	<nav class="navbar navbar-default" role="navigation">
<div class="container">

    <ul class="nav navbar-nav">
      <li><a class="btn btn-warning" href="<?php echo base_url()?>index.php/Login">LOGIN-INICIO</a></li>
    </ul>
</nav>
</div>
</div>
</nav>
<div class="container">
<div class="row">
<div class="col-md-6">
		<h2>Registro</h2>

		<form role="form" name="registro" action="<?php echo base_url();?>index.php/Login/evaluaRegistro" method="post">
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

		  <button type="submit" class="btn btn-warning btn-lg">Registrar</button>
		</form>
		</div>
		</div>
		</div>
	
</div>
