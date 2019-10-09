<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-book"></i> Libro
        <small>Agregar, Editar, Eliminar</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>"><i class="fa fa-plus"></i> Agregar Nuevo Libro</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de libros</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>" method="POST" id="searchList">
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                    <th>Id</th>
					<th>Título</th>
					<th>Editorial</th>
					<th>Paginas</th>
					<th>Isbn</th>
					<th>Opciones</th>
                    <tr>
					<?php foreach($consulta->result() as $reg): ?>
					<tr>
	    			<td><?php echo $reg->ejem_id; ?></td>
	    			<td><?php echo $reg->ejem_titulo; ?></td>
	    			<td><?php echo $reg->ejem_editorial; ?></td>
	    			<td><?php echo $reg->ejem_paginas; ?></td>
	    			<td><?php echo $reg->ejem_isbn; ?></td>
					<?php endforeach; ?>
                      <td class="text-center">
                      	<a class="btn btn-sm btn-info" href="<?php echo base_url()?>"><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-sm btn-danger deleteUser" href="#" data-userid=""><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php
                        
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "userListing/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
