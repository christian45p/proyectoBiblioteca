	
	<nav class="navbar navbar-default" role="navigation">
<div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">


  </div>



    <ul class="nav navbar-nav">  
      <li><a class="btn btn-warning" href="<?php echo base_url()?>index.php/Login/Registro">REGISTRO</a></li> 
    </ul>

</div>
</nav>
<div class="container">
<div class="row">
<div class="col-md-6">
		<h2>Login</h2>

		<form role="form" name="login" action="<?php echo base_url();?>index.php/Login/evaluaAcceso" method="post">
		  <div class="form-group">
		    <label for="username">Nombre de usuario o email</label>
		    <input type="text" class="form-control" id="username" name="usua_login" placeholder="Nombre de usuario">
        <span class="text-danger"><?php echo form_error('usua_login');?></span>
		  </div>
		  <div class="form-group">
		    <label for="password">Contrase&ntilde;a</label>
		    <input type="password" class="form-control" id="password" name="usua_password" placeholder="Contrase&ntilde;a">
		    <span class="text-danger"><?php echo form_error('usua_password');?></span>
		  </div>
      <div class="form-group">
      	<input type="text" name="usua_esadmin" value="0" hidden="1"> 
      <input class="border-primary"  style="width:30px;height:30px;" type="checkbox" value="1" name="usua_esadmin">Administrador?
      </div>

		  <button type="submit" class="btn btn-warning">Acceder</button>
		  <?php echo $this->session->flashdata('error');?>
		</form>
</div>
</div>
</div>

