
<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header">  

        	<?php 
        	if (isset($update_cliente)) { ?>
        	
        	<div style="float:right !important;" class="form-group row">
				<label class="col-lg-3 control-label text-lg-right pt-2 col-lg-3">Cliente: <?php echo $nom_validate; ?></label>
				<div class="col-lg-9">

					<div  style="float:right !important;" class="<?php echo $validate; ?>"><div class="on-background background-fill"></div><div class="state-background background-fill"></div><div class="handle"></div></div>

				</div>
			</div>
			<i style="float:left;font-size:50px;" class="fa fa-edit"></i> 

			<section class="form-group-vertical">
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Cliente: </label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-user"></i></span>
					</span>
					<input class="form-control" type="text" placeholder="Cliente" id="clienteupdate" value="<?php echo $nombre; ?>">
				</div>

				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">nro Licencias: </label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-gg"></i></span>
					</span>
					<input class="form-control" type="text" placeholder="Cliente" id="licenciasupdate" value="<?php echo $licencias; ?>">
				</div>

				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Actividad: </label>
					<select class="form-control" type="text" id="select_actividad_update">
						<option>-- Seleccione Actividad --</option>
                        <option>Activo</option>
                        <option>Inactivo</option> 
					</select>
				</div>

				<div class="modal-footer">
				<button type="button" class="mb-1 mt-1 mr-1 btn btn-default" data-dismiss="modal">Close</button>
                <button id="button" href="#" class="btn btn-danger btn-ok" data-dismiss="modal" class="btn btn-primary btn-ok" onclick="update_cliente_bd('<?php echo $id_clientes; ?>','<?php echo $activo; ?>','<?php echo $licencias; ?>');" >Actualizar Cliente</button>  

              	</div>
			</section>

        	<?php } else { ?>
        	<i style="float:left;font-size:50px;" class="fa fa-user-plus"></i> 
			<section class="form-group-vertical">
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Cliente: </label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-user"></i></span>
					</span>
					<input class="form-control" type="text" placeholder="Cliente" id="cliente" value="">
				</div>

				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">nro Licencias: </label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-gg"></i></span>
					</span>
					<input class="form-control" type="text" placeholder="nro licencias" id="licencias" value="">
				</div>

				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Actividad: </label>
					<select class="form-control" type="text" id="select_actividad">
						<option>-- Seleccione Actividad --</option>
                        <option>Activo</option>
                        <option>Inactivo</option> 
					</select>
				</div>

				<div class="modal-footer">
				<button type="button" class="mb-1 mt-1 mr-1 btn btn-default" data-dismiss="modal">Close</button>
                <button id="button" href="#" class="btn btn-danger btn-ok" data-dismiss="modal" class="btn btn-primary btn-ok" onclick="insert_cliente('<?php echo $activo; ?>');" >Crear Cliente</button>    

              	</div>
			</section>

			<?php } ?>
        	

		</div>
	</div>
</div>
<br/>
<br/>

		
		<!-- Specific Page Vendor -->
		<script src="<?=base_url()?>vendor/ios7-switch/ios7-switch.js"></script>	
		
		<!-- Theme Initialization Files -->
		<script src="<?=base_url()?>js/theme.init.js"></script>

					