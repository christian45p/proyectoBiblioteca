<h2>Mis libros prestados</h2>
<div class="table-responsive py-4">
<table  id="myTable" class='table table-bordered'>
<thead class="thead-dark">
<tr class='info'>
<th class="text-center">ID</th>
<th class="text-center">Portada</th>
<th class="text-center">Libro</th>
<th class="text-center">Fecha a devolver</th>
</tr>
</thead>
  <?php
    $usuarioId=$this->session->userdata('usua_id');
  ?>
  <?php if(!empty($prestados)): ?>
  <?php foreach ($prestados as $pres): ?>
  <?php if($pres->pres_usua_id==$usuarioId): ?>
  <tr>
    <td class="text-center"><?= $pres->pres_id?></td>
    <td class="text-center">
      <img class="avatar rounded mr-3" alt="..." src="<?php echo base_url().'uploads/'. $pres->ejem_portada?>" style="width: 100px;" >
    </td>
    <td class="text-center"><?= $pres->ejem_titulo?></td>
    <td class="text-center"><strong><?= $pres->pres_fechadevolucion?></strong></td>
  </tr>
  <?php endif; ?>
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