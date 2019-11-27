<div class="text-right container">
    <a href='<?= base_url('administrador/add_autor')?>' class='btn btn-primary'>Crear registro</a>
</div>
<h2>Autor</h2>
<div class="table-responsive py-4">
<table id="myTable" class='table table-bordered'>
<thead class="thead-dark">
    <tr class='info'>
        <th class="text-center">ID</th>
        <th class="text-center">Nombres</th>
        <th class="text-center">Apellidos</th>
        <th class="text-center">Opciones</th>
    </tr>
</thead>
    <?php if(!empty($autor)): ?>
    <?php foreach ($autor as $aut): ?>
    <tr>
        <td class="text-center text-dark"><?= $aut->auto_id?></td>
        <td class="text-center text-dark"><?= $aut->auto_nombres?></td>
        <td class="text-center text-dark"><?= $aut->auto_apellidos?></td>
        <td class='text-center'>
            <a href="<?= base_url('administrador/delete_autor/'.$aut->auto_id)?>" class='btn btn-danger eliminar'><i class="fas fa-trash-alt"></i></a>
            <a href="<?= base_url('administrador/edit_autor/'.$aut->auto_id)?>" class='btn btn-success'><i class="fas fa-edit"></i></a>
        </td>
    </tr>
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