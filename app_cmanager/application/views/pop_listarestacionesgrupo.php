
<div class="col-md-12">
  <div class="box box-primary">
     <div class="box-body">	
		<table class="table table-bordered table-striped mb-0" id="datatable-auto">
			<thead>
				<tr>
					<th>Grupo</th>
					<th>Estaciones</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($lista_estacionesgrupo as $fila){ ?> 	
				<tr>
					<td><?= $fila->grupo;?></td>
					<td><?= $fila->estacion;?></td>
					<td><a title="Eliminar Estación" href="#" data-dismiss="modal" onclick="eliminar_estacionesgrupo('<?= $fila->id;?>')"><i style="color: #D11600;" class="fa fa fa-minus-circle"></i></a></td>
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