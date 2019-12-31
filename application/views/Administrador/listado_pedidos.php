<h2>Ejemplar</h2>
<div class="table-responsive py-4">
<table  id="myTable" class='table table-bordered'>
<thead class="thead-dark">
<tr class='info'>
<th class="text-center">ID</th>
<th class="text-center">Portada</th>
<th class="text-center">Libro</th>
<th class="text-center">Solicitante</th>
<th class="text-center">Fecha</th>
<th class="text-center">Opciones</th>
</tr>
</thead>
  <?php if(!empty($ejemplar)): ?>
  <?php foreach ($ejemplar as $pedido): ?>
  <tr>
    <td class="text-center"><?= $pedido->peti_id?></td>
    <td class="text-center">
      <img class="avatar rounded mr-3" alt="..." src="<?php echo base_url().'uploads/'. $pedido->ejem_portada?>" style="width: 100px;" >
    </td>
    <td class="text-center"><?= $pedido->ejem_titulo?></td>
    <td class="text-center"><strong><?= $pedido->usua_nombres?></strong></td>
    <td class="text-center"><?= $pedido->peti_fechareg?></td>
      <td class='text-center'>
        <a href="<?= base_url('administrador/delete/'.$pedido->ejem_id)?>" class='btn btn-danger eliminar'><i class="fas fa-trash-alt"></i></a>
        <a href="<?= base_url('administrador/edit/'.$pedido->ejem_id)?>" class='btn btn-success'><i class="fas fa-edit"></i></a>
      </td>
  </tr>
  <?php endforeach;?>
  <?php endif; ?>
</table>
</div>


<script>
  $(document).ready(function(){
$('#myTable').DataTable( {
    responsive: true
}) 
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