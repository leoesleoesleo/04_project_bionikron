
<div class="col-lg-12 col-xl-12">	
	<section class="card card-featured-left card-featured-primary mb-4">
		<div class="card-body">
			<div class="widget-summary widget-summary-sm">
				<div class="widget-summary-col widget-summary-col-icon">
					<div class="summary-icon bg-primary">
						<i class="fa fa-user-secret"></i>
					</div>
				</div>
				<div class="widget-summary-col">
					<div class="summary">
						<h4 class="card-title">Clientes</h4>
						<div class="info">
							<?php foreach ($clientes_vol as $key => $value):?>
							<strong class="amount"><?php echo number_format($value['vol'], 0, '', '.');?></strong>
							<?php endforeach; ?>
							<span class="text-primary">(Clientes creados)</span>
						</div>
						<div class="info">
							<?php foreach ($vol_activ as $key => $value):?>
							<strong class="amount"><?php echo number_format($value['vol'], 0, '', '.');?></strong>
							<?php endforeach; ?>
							<span class="text-primary">(Clientes Activos)</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer card-footer-btn-group">
			<?php if($_SESSION['rol'] == 'Admin'): ?>
			<a href="#" data-toggle="modal" data-target="#dialog_crear" onclick="pop_cliente();" ><i class="fa fa-user-plus"></i> Crear nuevo Cliente</a>
			<?php endif;?>
			<?php if($_SESSION['rol'] == 'Admin'): ?>
			<a href="#" onclick="listar_ip();" ><i class="fa fa-cog"></i> Admin Ip's Clientes</a>
			<a href="#" data-toggle="modal" data-target="#dialog_crear" onclick="pop_crear_ip('val_new');" ><i class="fa fa-plus-circle"></i> Crear nueva Ip cliente</a>
			<?php endif;?>
		</div>
	</section>
</div>

<div class="col-lg-12 col-xl-8">
<!-- start: page -->
	<section class="card">
		<header class="card-header">						
			<h2 style="color:#62A3A9 !important;" class="card-title">Listado de Clientes</h2>
		</header>
		<div class="card-body">

			<table class="table table-bordered table-striped mb-0" id="datatable-clientes" border cellpadding=2  cellspacing=0 style="font-size:11px;">
			<thead>
				<tr>
					<th>Nombres</th>
					<th>Licencias</th>
					<th>Actividad</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($clientes as $fila){ ?> 	
				<tr>
					<td><?= $fila->nombre;?></td>
					<td><?= $fila->nro_licencias_permitidas;?></td>
					<td><?= $fila->activo;?></td>
					<td class="actions">
						<?php if($_SESSION['rol'] == 'Admin'): ?>
						<a style="color:#A89600;" onclick="update_cliente('<?= $fila->id_clientes;?>','<?= $fila->nombre;?>','<?= $fila->activo;?>','<?= $fila->nro_licencias_permitidas;?>');" href="#" data-toggle="modal" data-target="#dialog_crear" ><i class="fa fa-pencil"></i></a>
						<a style="color:#A80000;" onclick="eliminar_cliente('<?= $fila->id_clientes;?>','<?= $fila->nombre;?>')" href="#" title="Eliminar Cliente" data-toggle="modal" data-target="#dialog_crear"><i class="fa fa-trash-o"></i></a>
						<a style="color:#0088cc;" onclick="listar_ip('<?= $fila->id_clientes;?>','<?= $fila->nombre;?>')" href="#" title="Admin Ip"><i class="fa fa-cog"></i></a>
						<?php endif;?>
					</td>
				</tr>
				<?php } ?>   
			</tbody>
		</table>
		</div>

	</section>
</div>

	<div style="display:none !important;" class="col-lg-12 col-xl-4" id="table_ip">
	<!-- start: page -->
		
	</div>

		<div id="dialog" class="modal-block mfp-hide">
			<section class="card">
				<header class="card-header">
					<h2 class="card-title">Are you sure?</h2>
				</header>
				<div class="card-body">
					<div class="modal-wrapper">
						<div class="modal-text">
							<p>Are you sure that you want to delete this row?</p>
						</div>
					</div>
				</div>
				<footer class="card-footer">
					<div class="row">
						<div class="col-md-12 text-right">
							<button id="dialogConfirm" class="btn btn-primary">Confirm</button>
							<button id="dialogCancel" class="btn btn-default">Cancel</button>
						</div>
					</div>
				</footer>
			</section>
		</div>


		<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="dialog_crear">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		       <div class="modal-header">
		       		<h4 class="modal-title">Clientes</h4>
		          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		            <span aria-hidden="true">&times;</span></button>
		        </div>
		        <div class="container-fluid">
		            <br>

		            <div id="modi_cliente"></div>

		       </div>
		      </div>
		  </div>
		</div>


<script>
$(document).ready(function() {
    $('#datatable-clientes').DataTable({
        responsive: true
    });
});
</script>	

		
<!-- Specific Page Vendor -->
<script src="<?=base_url()?>vendor/jquery-validation/jquery.validate.js"></script>
<script src="<?=base_url()?>vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
<script src="<?=base_url()?>vendor/pnotify/pnotify.custom.js"></script>

<!-- Examples -->
<script src="<?=base_url()?>js/examples/examples.wizard.js"></script>

