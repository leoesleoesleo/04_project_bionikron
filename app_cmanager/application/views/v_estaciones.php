
	<div class="col-lg-6 col-xl-12	">	
		<section class="card card-featured-left card-featured-primary mb-4">
			<div class="card-body">
				<div class="widget-summary widget-summary-md">
					<div class="widget-summary-col widget-summary-col-icon">
						<div class="summary-icon bg-primary">
							<i class="fa fa-laptop"></i>
						</div>
					</div>
					<div class="widget-summary-col">
						<div class="summary">
							<h4 class="card-title">Estaciones</h4>
							<div class="info">
								<?php foreach ($consulta_estaciones as $key => $value):?>
								<strong class="amount"><?php echo number_format($value['fre'], 0, '', '.');?></strong>
								<?php endforeach; ?>
								<span class="text-primary">(Estaciones Creadas)</span>
							</div>
							<div class="info">
								<?php foreach ($consulta_grupos as $key => $value):?>
								<strong class="amount"><?php echo number_format($value['fre'], 0, '', '.');?></strong>
								<?php endforeach; ?>
								<span class="text-primary">(Grupos Creados)</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer card-footer-btn-group">
				<?php if($_SESSION['rol'] != 'Usuario'): ?>
				<a href="#" data-toggle="modal" data-target="#dialog_estaciones" onclick="crear_estacion()"><i class="fa fa-plus-circle"></i> Crear Estación</a>
				<a href="#" data-toggle="modal" data-target="#dialog_estaciones" onclick="agrupar_estacion()"><i class="fa fa-th"></i> Agrupar Estaciones</a>
				<a href="#" data-toggle="modal" data-target="#dialog_estaciones" onclick="crear_grupo('new_grupo')"><i class="fa fa-plus-circle"></i> Crear Grupo</a>
				<?php endif;?>
			</div>
		</section>
	</div>

	<div class="col-lg-12 col-xl-7">
	<!-- start: page -->
		<section class="card">
			<header class="card-header">						
				<h5 style="color:#62A3A9 !important;" class="card-title">Listado de Estaciones</h5>
			</header>
			<div class="card-body">
				<!--<div class="row">
					<div class="col-sm-6">
						<div class="mb-3">	
							<a style="color:#fff;" class="btn btn-primary" data-toggle="modal" data-target="#dialog_estaciones" onclick="crear_estacion()" >Add Estación <i style="color:#fff;" class="fa fa-plus-circle"></i></a>
						</div>
					</div>
				</div>-->


				<table class="table table-bordered table-striped mb-0" id="datatable-estaciones" border cellpadding=2  cellspacing=0 style="font-size:11px;">
				<thead>
					<tr>
						<th>Empresa</th>
						<th>Nombre</th>
						<th>Estacion</th>
						<th>Dominio</th>
						<th>Grupo</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($estaciones as $fila){ ?> 	
					<tr>
						<td><?= $fila->cliente;?></td>
						<td><?= $fila->nombre;?></td>
						<td><?= $fila->estacion;?></td>
						<td><?= $fila->dominio;?></td>
						<td><?= $fila->grupo;?></td>
						<td class="actions">
							<?php if($_SESSION['rol'] != 'Usuario'): ?>
							<a style="color:#A89600;" onclick="update_estacion('<?= $fila->id;?>','<?= $fila->nombre;?>','<?= $fila->estacion;?>','<?= $fila->dominio;?>','<?= $fila->licenciasPermitidas;?>','<?= $fila->idCliente;?>','<?= $fila->cliente;?>','<?= $fila->grupo;?>','<?= $fila->id_grupo;?>');" href="#" class="on-default edit-row" data-toggle="modal" data-target="#dialog_estaciones" title="Actualizar Estacion" ><i class="fa fa-pencil"></i></a>
							<a style="color:#A80000;" onclick="eliminar_estacion('<?= $fila->id;?>','<?= $fila->nombre;?>')" href="#" class="on-default remove-row" title="Eliminar Estacion" data-toggle="modal" data-target="#dialog_estaciones"><i class="fa fa-trash-o"></i></a>
							<?php endif;?>
						</td>
					</tr>
					<?php } ?>   
				</tbody>
			</table>
			</div>

		</section>
	</div>

	<div class="col-lg-12 col-xl-5">
	<!-- start: page -->
		<section class="card">
			<header class="card-header">						
				<h5 style="color:#62A3A9 !important;" class="card-title">Grupos</h5>
			</header>
			<div class="card-body">
				<!--<div class="row">
					<div class="col-sm-6">
						<div class="mb-3">	
							<a style="color:#fff;" class="btn btn-primary" data-toggle="modal" data-target="#dialog_estaciones" onclick="crear_grupo('new_grupo')" >Add Grupo <i style="color:#fff;" class="fa fa-plus-circle"></i></a>
						</div>
					</div>
				</div>-->


				<table class="table table-bordered table-striped mb-0" id="datatable-grupos" border cellpadding=2  cellspacing=0 style="font-size:11px;">
				<thead>
					<tr>
						<th>Empresa</th>
						<th>Grupo</th>
						<th>Estaciones Creadas</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($grupos as $fila){ ?> 	
					<tr>
						<td><?= $fila->cliente;?></td>
						<td><?= $fila->grupo;?></td>
						<td><?= $fila->fre;?></td>
						<td class="actions">
							<?php if($_SESSION['rol'] != 'Usuario'): ?>
							<a style="color:#A89600;" onclick="update_grupo('<?= $fila->id_grupo_;?>','<?= $fila->grupo;?>','<?= $fila->cliente;?>','<?= $fila->id_cliente;?>');" href="#" class="on-default edit-row" data-toggle="modal" data-target="#dialog_estaciones" title="Modificar Grupo" ><i class="fa fa-pencil"></i></a>
							<a style="color:#A80000;" onclick="eliminar_grupo('<?= $fila->id_grupo_;?>','<?= $fila->grupo;?>')" href="#" class="on-default remove-row" title="Eliminar Grupo" data-toggle="modal" data-target="#dialog_estaciones"><i class="fa fa-trash-o"></i></a>
							<a style="color:#0088cc;" onclick="auto_listarestaciones_grupo('<?= $fila->id_grupo_;?>');" href="#" class="on-default remove-row" title="Ver y editar estaciones del grupo" data-toggle="modal" data-target="#dialog_estaciones"><i class="fa fa-eye"></i></a>
							<?php endif;?>
						</td>
					</tr>
					<?php } ?>   
				</tbody>
			</table>
			</div>

		</section>
	</div>

	


	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="dialog_estaciones">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	       <div class="modal-header">
	       		<h4 class="modal-title"></h4>
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">&times;</span></button>
	        </div>
	        <div class="container-fluid">
	            <br>

	            <div id="pop_estaciones"></div>

	       </div>
	      </div>
	  </div>
	</div>


<script>
$(document).ready(function() {
    $('#datatable-estaciones').DataTable({
        responsive: true
    });
});

$(document).ready(function() {
    $('#datatable-grupos').DataTable({
        responsive: true
    });
});

</script>	


