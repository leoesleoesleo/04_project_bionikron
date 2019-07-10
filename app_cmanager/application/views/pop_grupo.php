<script type="text/javascript">
	
$(document).ready(function() {
    select_clientes(); 
});

function select_clientes() { 
        $.ajax({
            url: '<?=site_url('controller1/c_listar_select_clientes')?>',
            type: "post",
            //beforeSend: show_Loading(),
            dataType: "html",
            success: function(data){
                $('select#select_cliente').html(data);
            //hide_Loading();      
            }
        });
    } 

</script>

<div class="col-md-12">
 	<div class="box box-primary">


<center><h3 id="subtitulo" class="box-title">Modificar Grupo</h3></center> 
<br>
		<section class="form-group-vertical">
		<div class="input-group input-group-icon">
			<label class="col-lg-2 control-label text-lg-right pt-2">Grupo: <span class="required">*</span></label>
			<span class="input-group-addon">
				<span class="icon"><i class="fa fa-pencil"></i></span>
			</span>
			<input class="form-control" type="text" placeholder="Grupo" id="grupo" value="<?php echo $grupo; ?>">
		</div>
		<?php
		$rol =  $_SESSION['rol']; 
		if ($rol == 'Admin') { ?>		
			<div class="input-group input-group-icon">
				<label class="col-lg-2 control-label text-lg-right pt-2">Empresa: <span class="required">*</span></label>
				<span class="input-group-addon">
					<span class="icon"><i class="fa fa-pencil"></i></span>
				</span>
				<input disabled class="form-control" type="text" placeholder="Sin Cliente" id="cliente" value="<?php echo $cliente; ?>">
				<select data-plugin-selectTwo class="form-control populate" id="select_cliente">
				</select>
			</div>
		<?php }	?>
		

		<br>
		<div class="modal-footer">
		<button type="button" class="mb-1 mt-1 mr-1 btn btn-default" data-dismiss="modal">Close</button>
		<button id="button" href="#" class="btn btn-danger btn-ok" data-dismiss="modal" onclick="modificar_grupo('<?php echo $id_grupo; ?>','<?php echo $cliente; ?>','<?php echo $id_cliente; ?>');" >Modificar Grupo</button> 

		</div>
		</section>

	</div>
</div>				