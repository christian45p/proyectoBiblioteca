
<h1>Lista de libros</h1>
<section class="content box box-body table-responsive no-padding">
<table class='table table-hover'>
<tr class='info'>
<th>Título</th>
<th>Autor</th>
<th>Área</th>
<th>Categoría</th>
<th>Opciones</th>
</tr>
	<?php foreach($consulta->result() as $reg): ?>
	<tr>
	    <td><?php echo $reg->ejem_titulo; ?></td>
	    <td>Por definir</td>
	    <td>Por definir</td>
	    <td>Por definir</td>
	    <td>Por definir</td>
	</tr>
	<?php endforeach; ?>
</table>
</section>