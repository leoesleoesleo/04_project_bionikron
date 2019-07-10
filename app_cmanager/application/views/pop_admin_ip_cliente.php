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
            success: function(clientes){
                $('select#ip_cliente').html(clientes);
            //hide_Loading();      
            }
        });
    }  

</script>


<?php if ($val_ == 'val_update') { ?>
<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header">  
        	<center><h3 id="subtitulo" class="box-title">Actualizar IP</h3></center>
			<section class="form-group-vertical">
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Cliente: </label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-user-secret"></i></span>
					</span>
					<input disabled class="form-control" type="text" placeholder="Cliente" id="nombre" value="<?php echo $nombre ?>">
				</div>
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Ip: </label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-chrome"></i></span>
					</span>
					<input class="form-control" type="text" placeholder="Ip" id="ip" value="<?php echo $ip ?>">
				</div>
				<div class="modal-footer">
				<button type="button" class="mb-1 mt-1 mr-1 btn btn-default" data-dismiss="modal">Close</button>
                <button id="button" href="#" class="btn btn-danger btn-ok" data-dismiss="modal" class="btn btn-primary btn-ok" onclick="update_ip_bd('<?php echo $id_ip;?>','<?php echo $id_cliente;?>');" >Actualizar ip cliente</button> 
              	</div>
			</section>
		</div>
	</div>
</div>
<?php }
?>

<?php if ($val_ == 'val_delete') { ?>
<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header">  
        	<center><h3 id="subtitulo" class="box-title">Está seguro de eliminar esta IP ?</h3></center>
			<section class="form-group-vertical">
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Cliente: </label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-user-secret"></i></span>
					</span>
					<input disabled class="form-control" type="text" placeholder="Cliente" id="nombre" value="<?php echo $nombre ?>">
				</div>
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Ip: </label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-chrome"></i></span>
					</span>
					<input disabled class="form-control" type="text" placeholder="Ip" id="ip" value="<?php echo $ip ?>">
				</div>
				<div class="modal-footer">
				<button type="button" class="mb-1 mt-1 mr-1 btn btn-default" data-dismiss="modal">Close</button>
                <button id="button" href="#" class="btn btn-danger btn-ok" data-dismiss="modal" class="btn btn-primary btn-ok" onclick="delete_ip_bd('<?php echo $id_ip;?>');" >Si; eliminar ip cliente</button> 
              	</div>
			</section>
		</div>
	</div>
</div>
<?php }
?>

<?php if ($val_ == 'val_new') { ?>
<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header">  
        	<center><h3 id="subtitulo" class="box-title">Crear nueva IP</h3></center>
			<section class="form-group-vertical">
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Cliente: </label>
					<select class="form-control" id="ip_cliente"></select>
				</div>
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Ip: </label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-chrome"></i></span>
					</span>
					<input class="form-control" type="text" placeholder="Ip" id="ip">
				</div>
				<div class="modal-footer">
				<button type="button" class="mb-1 mt-1 mr-1 btn btn-default" data-dismiss="modal">Close</button>
                <button id="button" href="#" class="btn btn-danger btn-ok" data-dismiss="modal" class="btn btn-primary btn-ok" onclick="crear_ip_bd();" >Crear nueva ip cliente</button> 
              	</div>
			</section>
		</div>
	</div>
</div>
<?php }
?>
<br/>
<br/>		
		<!-- Specific Page Vendor -->
		<script src="<?=base_url()?>vendor/ios7-switch/ios7-switch.js"></script>	
		
		<!-- Theme Initialization Files -->
		<script src="<?=base_url()?>js/theme.init.js"></script>

					