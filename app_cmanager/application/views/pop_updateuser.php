
<script type="text/javascript">


$(document).ready(function() {
    select_roles() 
    <?php if($_SESSION['rol'] == 'Admin'): ?>
    select_clientes()
    <?php endif;?> 
});


function select_roles() { 
        $.ajax({
            url: '<?=site_url('controller1/c_listar_roles')?>',
            type: "post",
            //beforeSend: show_Loading(),
            dataType: "html",
            success: function(roles){
                $('select#roles').html(roles);
            //hide_Loading();      
            }
        });
    }

function select_clientes() { 
        $.ajax({
            url: '<?=site_url('controller1/c_listar_select_clientes')?>',
            type: "post",
            //beforeSend: show_Loading(),
            dataType: "html",
            success: function(clientes){
                $('select#clientes').html(clientes);
            //hide_Loading();      
            }
        });
    }

</script>




<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header">  

        	<div style="float:right !important;" class="form-group row">
				<label class="col-lg-3 control-label text-lg-right pt-2 col-lg-3">Usuario: <?php echo $nom_validate; ?></label>
				<div class="col-lg-9">

					<div  style="float:right !important;" class="<?php echo $validate; ?>"><div class="on-background background-fill"></div><div class="state-background background-fill"></div><div class="handle"></div></div>

				</div>
			</div>

			<i style="float:left;font-size:50px;" class="fa fa-edit"></i> 
			<label class="col-lg-3 control-label text-lg-right pt-2 col-lg-3"><strong>Rol: <?php echo $rol;?></strong></label>
			<label class="col-lg-3 control-label text-lg-right pt-2 col-lg-3"><strong>Empresa: <?php echo $nombre;?></strong></label>

			<section class="form-group-vertical">
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Usuario: </label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-user"></i></span>
					</span>
					<input class="form-control" type="text" placeholder="Usuario" id="usuario" value="<?php echo $usuario ?>">
				</div>
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Nombres: </label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-user"></i></span>
					</span>
					<input class="form-control" type="text" placeholder="Nombres" id="nombres" value="<?php echo $nombres ?>">
				</div>
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Apellidos: </label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-user"></i></span>
					</span>
					<input class="form-control" type="text" placeholder="Apellidos" id="apellidos" value="<?php echo $apellidos ?>">
				</div>
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Cedula: </label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-user"></i></span>
					</span>
					<input class="form-control" type="text" placeholder="Cedula" id="cedula" value="<?php echo $cc ?>">
				</div>
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Fecha Nacimiento: </label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-user"></i></span>
					</span>
					<input class="form-control" type="date" placeholder="fecha_nac" id="fecha_nac" value="<?php echo $fecha_nac ?>">
				</div>
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Email: </label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-envelope-o"></i></span>
					</span>
					<input class="form-control" type="text" placeholder="Email" id="email" value="<?php echo $email ?>">
				</div>
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Actividad: </label>
					<select class="form-control" type="text" id="select_actividad">
						<option>-- Seleccione Actividad --</option>
                        <option>Activo</option>
                        <option>Inactivo</option> 
					</select>
				</div>
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Asignar Rol: </label>
					<select id="roles" class="form-control" type="text"></select>
				</div>
				<?php if($_SESSION['rol'] == 'Admin'): ?>
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Asignar Cliente </label>
					<select id="clientes" class="form-control" type="text"></select>
				</div>
				<?php endif;?>
				<div class="modal-footer">
				<button type="button" class="mb-1 mt-1 mr-1 btn btn-default" data-dismiss="modal">Close</button>
                <button id="button" href="#" class="btn btn-danger btn-ok" data-dismiss="modal" class="btn btn-primary btn-ok" onclick="update_user_bd('<?php echo $nombre;?>','<?php echo $rol;?>','<?php echo $activo;?>','<?php echo $id_usuario;?>');" >Actualizar Usuario</button> 
              	</div>

			</section>

		</div>
	</div>
</div>
<br/>
<br/>

		
		<!-- Specific Page Vendor -->
		<script src="<?=base_url()?>vendor/ios7-switch/ios7-switch.js"></script>	
		
		<!-- Theme Initialization Files -->
		<script src="<?=base_url()?>js/theme.init.js"></script>

					