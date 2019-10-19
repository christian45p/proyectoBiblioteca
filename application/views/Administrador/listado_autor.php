<div class="text-right container">
    <a href='<?= base_url('administrador/add_autor')?>' class='btn btn-primary'>Crear registro</a>
</div>
<h2>Autor</h2>
<table class='table table-bordered table-dark'>
    <tr class='info'>
        <th class="text-center">ID</th>
        <th class="text-center">Nombres</th>
        <th class="text-center">Apellidos</th>
        <th class="text-center">Opciones</th>
    </tr>
    <?php if(!empty($autor)): ?>
    <?php foreach ($autor as $aut): ?>
    <tr>
        <td class="text-center"><?= $aut->auto_id?></td>
        <td class="text-center"><?= $aut->auto_nombres?></td>
        <td class="text-center"><?= $aut->auto_apellidos?></td>
        <td class='text-center'>
            <a href="<?= base_url('administrador/delete_autor/'.$aut->auto_id)?>" class='btn btn-danger eliminar'>Eliminar</a>
            <a href="<?= base_url('administrador/edit_autor/'.$aut->auto_id)?>" class='btn btn-success'>Editar</a>
        </td>
    </tr>
    <?php endforeach;?>
    <?php endif; ?>
</table>
<script>
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