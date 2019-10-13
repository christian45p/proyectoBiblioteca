<div class="text-right container">
<a href='<?= base_url('index.php/administrador/add')?>' class='btn btn-primary'>Crear registro</a>
</div>
<h2>Ejemplar</h2>
<table class='table table-bordered table-dark'>
<tr class='info'>
<th class="text-center">ID</th>
<th class="text-center">Titulo</th>
<th class="text-center">Editorial</th>
<th class="text-center">Paginas</th>
<th class="text-center">Isbn</th>
<th class="text-center">Idioma</th>
<th class="text-center">Opciones</th>
</tr>
  <?php if(!empty($ejemplar)): ?>
  <?php foreach ($ejemplar as $admi): ?>
  <tr>
    <td class="text-center"><?= $admi->ejem_id?></td>
    <td class="text-center"><?= $admi->ejem_titulo?></td>
    <td class="text-center"><?= $admi->ejem_editorial?></td>
    <td class="text-center"><?= $admi->ejem_paginas?></td>
    <td class="text-center"><?= $admi->ejem_isbn?></td>
    <td class="text-center"><?= $admi->ejem_idioma?></td>
      <td class='text-center'>
        <a href="<?= base_url('index.php/administrador/delete/'.$admi->ejem_id)?>" class='btn btn-danger eliminar'>Eliminar</a>
        <a href="<?= base_url('index.php/administrador/edit/'.$admi->ejem_id)?>" class='btn btn-success'>Editar</a>
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