<div class="card mb-4 border border-dark m-5 rounded-lg">
    <div class="card-header py-3">
        <h2>Autor # <?= $autor->auto_id?> </h2>
    </div>
    <div class="card-body">
        <form action="<?= base_url('administrador/update_autor')?>" method="post">
            <input type="hidden" name="id" value="<?= $autor->auto_id?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Nombre(s)</label>
                    <input type="text" class="form-control form-control-sm border border-dark" value="<?= $autor->auto_nombres?>" id="" name="aut_nombres" >
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Apellidos</label>
                    <input type="text" class="form-control form-control-sm border border-dark" value="<?= $autor->auto_apellidos?>" id="" name="aut_apellidos" >
                </div>
            </div>
            <!-- Divider -->
            <hr class="sidebar-divider my-2">
            <div class="text-center">
                <a href="<?= base_url('administrador/autor')?>" class="btn btn-danger mb-2 btn-sm">Cancelar</a>
                <button type="submit" class="btn btn-success mb-2 btn-sm">Actualizar Datos</button>
            </div>
        </form>
    </div>
</div>