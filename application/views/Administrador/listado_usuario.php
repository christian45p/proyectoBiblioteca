<!-- <div class="text-right container">
<a href='<?= base_url('index.php/administrador/add_usuario')?>' class='btn btn-primary'>Crear registro</a>
</div> -->
<h2>Usuarios</h2>
<table id="myTable" class='table table-bordered'>
<thead class="thead-dark">
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
</thead>
  <?php if(!empty($usuario)): ?>
  <?php foreach ($usuario as $us): if($us->usua_esadmin == 0): ?>
  <tr>
    <td class="text-center text-dark"><?= $us->usua_id?></td>
    <td class="text-center text-dark"><?= $us->usua_codigo?></td>
    <td class="text-center text-dark"><?= $us->usua_nombres?></td>
    <td class="text-center text-dark"><?= $us->usua_apellidos?></td>
    <td class="text-center text-dark"><?= $us->usua_direccion?></td>
    <td class="text-center text-dark"><?= $us->usua_email?></td>
    <td class="text-center text-dark"><?= $us->usua_telefono?></td>
      <td class='text-center'>
        <a href="<?= base_url('index.php/administrador/delete_usuario/'.$us->usua_id)?>" class='btn btn-danger eliminar'>Eliminar</a>
        <a href="<?= base_url('index.php/administrador/edit_usuario/'.$us->usua_id)?>" class='btn btn-success'>Editar</a>
      </td>
  </tr>
  <?php endif; endforeach; endif;?>
</table>
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