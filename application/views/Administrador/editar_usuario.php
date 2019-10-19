<div class="card mb-4 border border-warning m-5 rounded-lg">
    <div class="card-header py-3">
        <h2>Usuario # <?= $usuario->usua_id?> </h2>
    </div>
    <div class="card-body">
<<<<<<< HEAD
        <form action="<?= base_url('index.php/administrador/update_usuario')?>" method="post">
          <div class="form-row">
            <div class="form-group col-md-3 disabled">
              <label for="">Codigo del Estudiante</label>
              <input type="text" class="form-control form-control-sm border border-warning" value="<?= $usuario->usua_codigo?>"  id="" disabled>
=======
        <form action="" method="post">
            <div class="form-row">
                <div class="form-group col-md-3 disabled">
                    <label for="">Codigo del Estudiante</label>
                    <input type="text" class="form-control form-control-sm border border-warning" value="<?= $usuario->usua_codigo?>"  id="" disabled>
                </div>
>>>>>>> 4a34a0811b16747b42eeb9729ca9296926891c11
            </div>
          <div class="form-row">
<<<<<<< HEAD
            <div class="form-group col-md-6">
              <label for="inputEmail4">Nombres</label>
              <input type="text" class="form-control form-control-sm border border-warning" value="<?= $usuario->usua_nombres?>" id="" name="nombres" >
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Apellidos</label>
              <input type="text" class="form-control form-control-sm border border-warning" value="<?= $usuario->usua_apellidos?>" id="" name="apellidos" >
            </div>
          </div>
          <div class="form-group">
            <label for="inputAddress">Direccion</label>
            <input type="text" class="form-control form-control-sm border border-warning" value="<?= $usuario->usua_direccion?>" id="inputAddress" name="direccion" >
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">E-mail</label>
              <input type="email" class="form-control form-control-sm border border-warning" value="<?= $usuario->usua_email?>" id="" name="email" >
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Telefono</label>
              <input type="text" class="form-control form-control-sm border border-warning" value="<?= $usuario->usua_telefono?>" id="" name="telefono" >
            </div>
=======
              <div class="form-group col-md-6">
                  <label for="inputEmail4">Nombres</label>
                  <input type="text" class="form-control form-control-sm border border-warning" value="<?= $usuario->usua_nombres?>" id="" name="usua_nombres" >
              </div>
              <div class="form-group col-md-6">
                  <label for="inputPassword4">Apellidos</label>
                  <input type="text" class="form-control form-control-sm border border-warning" value="<?= $usuario->usua_apellidos?>" id="" name="usua_apellidos" >
              </div>
          </div>
          <div class="form-group">
              <label for="inputAddress">Direccion</label>
              <input type="text" class="form-control form-control-sm border border-warning" value="<?= $usuario->usua_direccion?>" id="inputAddress" name="usua_direccion" >
          </div>
          <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="inputEmail4">E-mail</label>
                  <input type="email" class="form-control form-control-sm border border-warning" value="<?= $usuario->usua_email?>" id="" name="usua_email" >
              </div>
              <div class="form-group col-md-6">
                  <label for="inputPassword4">Telefono</label>
                  <input type="text" class="form-control form-control-sm border border-warning" value="<?= $usuario->usua_telefono?>" id="" name="usua_telefono" >
              </div>
>>>>>>> 4a34a0811b16747b42eeb9729ca9296926891c11
          </div>
          <div class="form-row">
              <div class="form-group col-md-3">
                  <label for="inputEmail4">Usuario</label>
                  <input type="text" class="form-control form-control-sm border border-warning" value="<?= $usuario->usua_login?>" id="" disabled="1">
              </div>
          </div>
          <hr class="sidebar-divider my-2">
          <div class="form-row">
<<<<<<< HEAD
            <div class="form-group col-md-6">
              <label for="inputEmail4">Contraseña</label>
              <input type="password" class="form-control form-control-sm border border-warning" value="" id="" name="password" >
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Confirmar Contraseña</label>
              <input type="text" class="form-control form-control-sm border border-warning" value="" id="" name="confirmarPassword" >
            </div>
          </div>
                <!-- Divider -->
             <hr class="sidebar-divider my-2">
             <div class="text-center">
                <a href="<?= base_url('administrador/usuario')?>" class="btn btn-danger mb-2 btn-sm">Cancelar</a>
                <button type="submit" class="btn btn-success mb-2 btn-sm">Actualizar Datos</button>
=======
              <div class="form-group col-md-6">
                  <label for="inputEmail4">Contraseña</label>
                  <input type="email" class="form-control form-control-sm border border-warning" value="" id="" name="usua_email" >
              </div>
              <div class="form-group col-md-6">
                  <label for="inputPassword4">Confirmar Contraseña</label>
                  <input type="text" class="form-control form-control-sm border border-warning" value="" id="" name="usua_telefono" >
              </div>
          </div>
               
          <!-- Divider -->
          
          <hr class="sidebar-divider my-2">
              <div class="text-center">
                  <a href="<?= base_url('administrador/usuario')?>" class="btn btn-danger mb-2 btn-sm">Cancelar</a>
                  <button type="submit" class="btn btn-primary mb-2 btn-sm">Actualizar Datos</button>
>>>>>>> 4a34a0811b16747b42eeb9729ca9296926891c11
             </div>
        </form>
    </div>
</div>