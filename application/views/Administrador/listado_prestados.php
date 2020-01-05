<h2>Libros Pretados</h2>
<div class="table-responsive py-4">
<table  id="myTable" class='table table-bordered'>
<thead class="thead-dark">
<tr class='info'>
<th class="text-center">ID</th>
<th class="text-center">Solicitante Prestado</th>
<th class="text-center">Portada</th>
<th class="text-center">Nombre del Libro</th>
<th class="text-center">Fecha de Registro</th>
<th class="text-center">Cantidad de Días</th>
<th class="text-center">Día del Préstamo</th>
<th class="text-center">Fecha Devolución</th>
<th class="text-center">Opciones</th>
</tr>
</thead>
  <?php if(!empty($prestados)): ?>
  <?php foreach ($prestados as $pres): ?>
  <tr>
    <td class="text-center"><?= $pres->pres_id?></td>
    <td class="text-center"><strong><?= $pres->usua_nombres?></strong>></td>
    <td class="text-center">
      <img class="avatar rounded mr-3" alt="..." src="<?php echo base_url().'uploads/'. $pres->ejem_portada?>" style="width: 100px;" >
    </td>
    <td class="text-center"><?= $pres->ejem_titulo?></td>
    <td class="text-center"><?= $pres->pres_fechareg?></td>
    <td class="text-center"><?= $pres->pres_dias?></td>
    <td class="text-center"><?= $pres->pres_fechaprestamo?></td>
    <td class="text-center"><?= $pres->pres_fechadevolucion?></td>
      <td class='text-center'>
        <a href="<?= base_url('administrador/reportarDevolucion/'.$pres->pres_id)?>" class='btn btn-success eliminar'><i class="fas fa-edit"></i>Reportar Devolución</a>
       
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