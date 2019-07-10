<section class="card">
	<header class="card-header">						
		<h5 style="color:#62A3A9 !important;" class="card-title">Ip´s Públicas Clientes</h5>
	</header>
	<div class="card-body">
		<!--<div class="row">
			<div class="col-sm-6">
				<div class="mb-3">	
					<a style="color:#fff;" class="btn btn-primary" data-toggle="modal" data-target="#dialog_estaciones" onclick="crear_grupo('new_grupo')" >Add Grupo <i style="color:#fff;" class="fa fa-plus-circle"></i></a>
				</div>
			</div>
		</div>-->

		<table class="table table-bordered table-striped mb-0" id="datatable-ip" border cellpadding=2  cellspacing=0 style="font-size:11px;">
		<thead>
			<tr>
				<th>Cliente</th>
				<th>IP</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($ip as $fila){ ?> 	
			<tr>
				<td><?= $fila->nombre;?></td>
				<td><?= $fila->IP;?></td>
				<td class="actions">
					<?php if($_SESSION['rol'] != 'Usuario'): ?>
					<a style="color:#A89600;" onclick="update_ip('<?= $fila->id_ip;?>','<?= $fila->id_cliente;?>','<?= $fila->nombre;?>','<?= $fila->IP;?>','val_update');" href="#" class="on-default edit-row" data-toggle="modal" data-target="#dialog_crear" title="Modificar IP" ><i class="fa fa-pencil"></i></a>
					<a style="color:#A80000;" onclick="delete_ip('<?= $fila->id_ip;?>','<?= $fila->id_cliente;?>','<?= $fila->nombre;?>','<?= $fila->IP;?>','val_delete');" href="#" class="on-default remove-row" title="Eliminar IP" data-toggle="modal" data-target="#dialog_crear"><i class="fa fa-trash-o"></i></a>
					<?php endif;?>
				</td>
			</tr>
			<?php } ?>   
		</tbody>
	</table>
	</div>

</section>

<script>
$(document).ready(function() {
    $('#datatable-ip').DataTable({
        responsive: true
    });
});
</script>		