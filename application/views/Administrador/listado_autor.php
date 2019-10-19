                $elem.closest('tr').fadeOut(1000);
            $.post( $(this).attr('href'), function( data ) {
            $elem = $(this);
            <a href="<?= base_url('administrador/delete_autor/'.$aut->ID_AUT)?>" class='btn btn-danger eliminar'>Eliminar</a>
            <a href="<?= base_url('administrador/edit_autor/'.$aut->ID_AUT)?>" class='btn btn-success'>Editar</a>
            return false;
            });
        $('.eliminar').click(function(){
        </td>
        <td class="text-center"><?= $aut->APELLIDOS_AUT?></td>
        <td class="text-center"><?= $aut->ID_AUT?></td>
        <td class="text-center"><?= $aut->NOMBRES_AUT?></td>
        <td class='text-center'>
        <th class="text-center">Apellidos</th>
        <th class="text-center">ID</th>
        <th class="text-center">Nombres</th>
        <th class="text-center">Opciones</th>
        });
    $(document).ready(function(){
    </tr>
    </tr>
    <?php endforeach;?>
    <?php endif; ?>
    <?php foreach ($autor as $aut): ?>
    <?php if(!empty($autor)): ?>
    <a href='<?= base_url('administrador/add_autor')?>' class='btn btn-primary'>Crear registro</a>
    <tr class='info'>
    <tr>
    });
</div>
</script>
</table>
<div class="text-right container">
<h2>Autor</h2>
<script>
<table class='table table-bordered table-dark'>