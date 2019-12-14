<div class="card mb-4 border border-dark m-5 rounded-lg">
    <div class="card-header py-3">
        <h2>Datos de su Usuario: <?= $usuario->usua_id?> </h2>
    </div>
    <div class="card-body">
        <form action="<?= base_url('usuario/evaluaActualizarDatos/')?>" method="post">
            <input type="hidden" name="id" value="<?= $usuario->usua_id?>">
            <div class="form-row">
                <div class="form-group col-md-3 disabled">
                    <label for="">Codigo del Estudiante</label>
                    <input type="text" name="usua_codigo" class="form-control form-control-sm border border-dark" value="<?= $usuario->usua_codigo?>"  id="" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Nombres</label>
                    <input type="text" class="form-control form-control-sm border border-dark" value="<?= $usuario->usua_nombres?>" id="" name="usua_nombres" >
                </div> 
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Apellidos</label>
                    <input type="text" class="form-control form-control-sm border border-dark" value="<?= $usuario->usua_apellidos?>" id="" name="usua_apellidos" >
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Direccion</label>
                <input type="text" class="form-control form-control-sm border border-dark" value="<?= $usuario->usua_direccion?>" id="inputAddress" name="usua_direccion" >
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">E-mail</label>
                    <input type="email" class="form-control form-control-sm border border-dark" value="<?= $usuario->usua_email?>" id="" name="usua_email" >
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Telefono</label>
                    <input type="text" class="form-control form-control-sm border border-dark" value="<?= $usuario->usua_telefono?>" id="" name="usua_telefono" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Usuario</label>
                    <input type="text" name="usua_login" class="form-control form-control-sm border border-dark" value="<?= $usuario->usua_login?>" id="" >
                </div>
            </div>
            <hr class="sidebar-divider my-2">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Contraseña</label>
                    <input type="password" class="form-control form-control-sm border border-dark" value="" id="" name="usua_password" >
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Confirmar Contraseña</label>
                    <input type="password" class="form-control form-control-sm border border-dark" value="" id="" name="confirmar" >
                </div>
            </div>
            <!-- Divider -->
            <hr class="sidebar-divider my-2">
            <div class="text-center">
                
                <button type="submit" class="btn btn-success mb-2 btn-sm">Actualizar Datos</button>
            </div>
        </form>
    </div>
</div>