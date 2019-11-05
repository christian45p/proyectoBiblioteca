<div class="text-right container">
<a href='<?= base_url('administrador/add')?>' class='btn btn-primary'>Crear registro</a>
</div>
<h2>Ejemplar</h2>
<table class='table table-bordered'>
<thead class="thead-dark">
<tr class='info'>
<th class="text-center">ID</th>
<th class="text-center">Portada</th>
<th class="text-center">Titulo</th>
<th class="text-center">Autor</th>
<th class="text-center">Categoría</th>
<th class="text-center">Editorial</th>
<th class="text-center">Paginas</th>
<th class="text-center">Isbn</th>
<th class="text-center">Idioma</th>
<th class="text-center">Opciones</th>
  </thead>
</tr>
  <?php if(!empty($ejemplar)): ?>
  <?php foreach ($ejemplar as $admi): ?>
  <tr>
    <td class="text-center"><?= $admi->ejem_id?></td>
    <td class="text-center">
      <img class="avatar rounded mr-3" alt="..." src="<?php echo base_url().'uploads/'. $admi->ejem_portada?>" style="width: 100px;" >
    </td>
<<<<<<< HEAD
    <td class="text-center"><?= $admi->ejem_titulo?></td>
    <td class="text-center"><?= $admi->cate_nombre?></td>
    <td class="text-center"><?= $admi->ejem_editorial?></td>
    <td class="text-center"><?= $admi->ejem_paginas?></td>
    <td class="text-center"><?= $admi->ejem_isbn?></td>
    <td class="text-center"><?= $admi->ejem_idioma?></td>
=======
    <td class="text-center text-dark"><?= $admi->ejem_titulo?></td>
    <td class="text-center text-dark"><?= $admi->auto_nombres?></td>
    <td class="text-center text-dark"><?= $admi->cate_nombre?></td>
    <td class="text-center text-dark"><?= $admi->ejem_editorial?></td>
    <td class="text-center text-dark"><?= $admi->ejem_paginas?></td>
    <td class="text-center text-dark"><?= $admi->ejem_isbn?></td>
    <td class="text-center text-dark"><?= $admi->ejem_idioma?></td>
>>>>>>> d0ac2af272b5719c17b72199246f79f7cd360aa6
      <td class='text-center'>
        <a href="<?= base_url('administrador/delete/'.$admi->ejem_id)?>" class='btn btn-danger eliminar'>Eliminar</a>
        <a href="<?= base_url('administrador/edit/'.$admi->ejem_id)?>" class='btn btn-success'>Editar</a>
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