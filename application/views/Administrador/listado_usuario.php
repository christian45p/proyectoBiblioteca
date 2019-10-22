<!-- <div class="text-right container">
<a href='<?= base_url('index.php/administrador/add_usuario')?>' class='btn btn-primary'>Crear registro</a>
</div> -->
<h2>Usuarios</h2>
<table class='table table-bordered table-dark bg-gradient-dark'>
<tr class='info'>
<th class="text-center">ID</th>
<th class="text-center">Codigo</th>
<th class="text-center">Nombres</th>
<th class="text-center">Apellidos</th>
<th class="text-center">Direccion</th>
<th class="text-center">Email</th>
<th class="text-center">Telefono</th>
<th class="text-center">Opciones</th>
</tr>
  <?php if(!empty($usuario)): ?>
  <?php foreach ($usuario as $us): ?>
  <tr>
    <td class="text-center"><?= $us->usua_id?></td>
    <td class="text-center"><?= $us->usua_codigo?></td>
    <td class="text-center"><?= $us->usua_nombres?></td>
    <td class="text-center"><?= $us->usua_apellidos?></td>
    <td class="text-center"><?= $us->usua_direccion?></td>
    <td class="text-center"><?= $us->usua_email?></td>
    <td class="text-center"><?= $us->usua_telefono?></td>
      <td class='text-center'>
        <a href="<?= base_url('index.php/administrador/delete_usuario/'.$us->usua_id)?>" class='btn btn-danger eliminar'>Eliminar</a>
        <a href="<?= base_url('index.php/administrador/edit_usuario/'.$us->usua_id)?>" class='btn btn-success'>Editar</a>
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