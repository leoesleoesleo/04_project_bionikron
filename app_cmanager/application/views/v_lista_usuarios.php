
<div class="col-lg-6 col-xl-3">	
	<section class="card card-featured-left card-featured-primary mb-4">
		<div class="card-body">
			<div class="widget-summary widget-summary-sm">
				<div class="widget-summary-col widget-summary-col-icon">
					<div class="summary-icon bg-primary">
						<i class="fa fa fa-group"></i>
					</div>
				</div>
				<div class="widget-summary-col">
					<div class="summary">
						<h4 class="card-title">Usuarios</h4>
						<div class="info">
							<?php foreach ($usuarios_vol as $key => $value):?>
							<strong class="amount"><?php echo number_format($value['usuarios_vol'], 0, '', '.');?></strong>
							<?php endforeach; ?>
							<span class="text-primary">(Usuarios Activos)</span>
						</div>
					</div>
					<?php if($_SESSION['rol'] == 'Admin'): ?>	
					<div class="summary">
						<?php foreach ($usuarios_admin as $key => $value):?>
						<strong class="amount"><?php echo number_format($value['usuarios_admin'], 0, '', '.');?></strong>
						<?php endforeach; ?>
						<span class="text-primary">(Usuarios Admin)</span>
					</div>
					<?php endif;?>
				</div>
			</div>
		</div>
		<div class="card-footer card-footer-btn-group">
			<?php if($_SESSION['rol'] != 'Usuario'): ?>
			<a href="#" data-toggle="modal" data-target="#dialog_update" onclick="pop_usuarios();" ><i class="fa fa-user-plus"></i> Crear</a>
			<?php endif;?>
		</div>


	</section>
</div>


	<div class="col-lg-12 col-xl-9">
	<!-- start: page -->
		<section class="card">
			<header class="card-header">						
				<h2 style="color:#62A3A9 !important;" class="card-title">Listado de Usuarios</h2>
			</header>
			<div class="card-body">


				<table class="table table-bordered table-striped mb-0" id="datatable-editables">
				<thead>
					<tr>
						<th>Empresa</th>
						<th>Usuario</th>
						<th>Nombres</th>
						<th>Apellidos</th>
						<th>Email</th>
						<th>Activo</th>
						<th>Rol</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($usuarios as $fila){ ?> 	
					<tr>
						<td><?= $fila->cliente;?></td>
						<td><?= $fila->usuario;?></td>
						<td><?= $fila->nombres;?></td>
						<td><?= $fila->apellidos;?></td>
						<td><?= $fila->email;?></td>
						<td><?= $fila->activo;?></td>
						<td><?= $fila->rol;?></td>
						<td class="actions">
							<?php if($_SESSION['rol'] != 'Usuario'): ?>
							<a style="color:#A89600;" onclick="update_user('<?= $fila->cliente;?>','<?= $fila->usuario;?>','<?= $fila->nombres;?>','<?= $fila->apellidos;?>','<?= $fila->email;?>','<?= $fila->activo;?>','<?= $fila->rol;?>','<?= $fila->id_usuario;?>','<?= $fila->fecha_nac;?>','<?= $fila->cc;?>');" href="#" class="on-default edit-row" data-toggle="modal" data-target="#dialog_update" ><i class="fa fa-pencil"></i></a>
							<a style="color:#A80000;" onclick="eliminar_usuarios('<?= $fila->id_usuario;?>','<?= $fila->usuario;?>','<?= $fila->rol;?>')" href="#" class="on-default remove-row" title="Eliminar Usuario" data-toggle="modal" data-target="#dialog_update"><i class="fa fa-trash-o"></i></a>
							<?php endif;?>
						</td>
					</tr>
					<?php } ?>   
				</tbody>
			</table>
			</div>

		</section>
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


		<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="dialog_update">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		       <div class="modal-header">
		       		<h4 class="modal-title">usuarios</h4>
		          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		            <span aria-hidden="true">&times;</span></button>
		        </div>
		        <div class="container-fluid">
		            <br>

		            <div id="update_user"></div>

		       </div>
		      </div>
		  </div>
		</div>


<script>
$(document).ready(function() {
    $('#datatable-editables').DataTable({
        responsive: true
    });
});
</script>	

		
