<div class="text-right container">
    <a href='<?= base_url('administrador/add_autor')?>' class='btn btn-primary'>Crear registro</a>
</div>
<h2>historial de busqueda</h2>
<div class="table-responsive py-4">
<table id="myTable" class='table table-bordered'>
<thead class="thead-dark">
    <tr class='info'>
        <th class="text-center">ID</th>
        <th class="text-center">Termino Buscado</th>
        <th class="text-center">Fecha</th>
        <th class="text-center">Opciones</th>
    </tr>
</thead>
    <?php $IdUsuario=$this->session->userdata('usua_id'); ?>
    <?php if(!empty($historial)): ?>
    <?php foreach ($historial as $his): ?>
    <?php if($IdUsuario==$his->histo_usua_id): ?>
    <tr>
        <td class="text-center text-dark"><?= $his->histo_id?></td>
        <td class="text-center text-dark"><?= $his->histo_termino?></td>
        <td class="text-center text-dark"><?= $his->histo_fechareg?></td>
        <td class='text-center'>
            <a href="<?= base_url('usuario/delete_historial/'.$his->histo_id)?>" class='btn btn-danger eliminar'><i class="fas fa-trash-alt"></i></a>
            
        </td>
    </tr>
    <?php endif; ?>
    <?php endforeach;?>
    <?php endif; ?>
</table>
</div>
<script>
    $(document).ready(function(){
    $('#myTable').DataTable();
});
    $(document).ready(function(){
        $('.eliminar').click(function(){
            $elem = $(this);
            $.post( $(this).attr('href'), function( data ) {
                $elem.closest('tr').fadeOut(1000);
            });
            return false;
        });
    });
</script>