<div class="col-md-12">
  <div class="box box-primary">
     <div class="box-body">	
		<table class="table table-bordered table-striped mb-0" id="datatable-auto">
			<thead>
				<tr>
					<th>Nombre Automatización</th>
					<th>Grupos</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($lista_estaciones as $fila){ ?> 	
				<tr>
					<td><?= $fila->nom_auto;?></td>
					<td><?= $fila->nom_grupo;?></td>
					<td><a title="Eliminar Estación" data-dismiss="modal" href="#" onclick="eliminar_estaciones('<?= $fila->idAutoestacion;?>')"><i style="color: #D11600;" class="fa fa fa-minus-circle"></i></a></td>
				</tr>
				<?php } ?>   
			</tbody>
		</table>
	</div>
  </div>
</div>  	
<br>	


<script>
$(document).ready(function() {
    $('#datatable-auto').DataTable({
        responsive: true
    });
});
</script>	

<script src="<?=base_url()?>js/examples/examples.datatables.editable.js"></script>