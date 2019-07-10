<script type="text/javascript">
	
$(document).ready(function() {
    select_clientes(); 
    select_grupo(); 
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

function select_grupo() { 
        $.ajax({
            url: '<?=site_url('controller1/c_listar_select_grupo_es')?>',
            type: "post",
            //beforeSend: show_Loading(),
            dataType: "html",
            success: function(data){
                $('select#select_grupo').html(data);
            //hide_Loading();      
            }
        });
    }     

</script>

<div class="col-md-12">
    <div class="box box-primary">


        	<?php

        	  if (isset($new_grupo)) { ?>
        	  	
        	  	<center><h3 id="subtitulo" class="box-title">Ingresar Nuevo Grupo</h3></center> 
                <br>
                <section class="form-group-vertical">
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Grupo: <span class="required">*</span></label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-plus-circle"></i></span>
					</span>
					<input class="form-control" type="text" placeholder="Nuevo Grupo" id="grupo">
				</div>
				<br>
				<div class="modal-footer">
				<button type="button" class="mb-1 mt-1 mr-1 btn btn-default" data-dismiss="modal">Close</button>
                <button id="button" href="#" class="btn btn-danger btn-ok" data-dismiss="modal" onclick="crear_grupo_bd();" >
                Crear Grupo</button>

              	</div>
				</section> 

        	  <?php } else if (!isset($validate)) { ?>  

                <center><h3 id="subtitulo" class="box-title">Ingresar Nueva Estación</h3></center> 
                <br>
                <section class="form-group-vertical">
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Nombre: <span class="required">*</span></label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-plus-circle"></i></span>
					</span>
					<input class="form-control" type="text" placeholder="Nombre" id="nombre">
				</div>
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Estación: <span class="required">*</span></label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-plus-circle"></i></span>
					</span>
					<input class="form-control" type="text" placeholder="Estación" id="estacion">
				</div>
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Dominio: <span class="required">*</span></label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-plus-circle"></i></span>
					</span>
					<input class="form-control" type="text" placeholder="Dominio" id="dominio">
				</div>
				<br>
				<div class="modal-footer">
				<button type="button" class="mb-1 mt-1 mr-1 btn btn-default" data-dismiss="modal">Close</button>
                <button id="button" href="#" class="btn btn-danger btn-ok" data-dismiss="modal" onclick="crear_estacion_bd();" >
                Crear Estación</button>

              	</div>
				</section> 

              <?php } else { ?>
                <center><h3 id="subtitulo" class="box-title">Modificar Estacion</h3></center>   
                <br>
                <section class="form-group-vertical">
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Nombre: <span class="required">*</span></label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa fa-pencil"></i></span>
					</span>
					<input class="form-control" type="text" placeholder="nombre" id="nombre" value="<?php echo $nombre ?>">
				</div>
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Estación: <span class="required">*</span></label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa fa-pencil"></i></span>
					</span>
					<input class="form-control" type="text" placeholder="Estación" id="estacion" value="<?php echo $estacion ?>">
				</div>
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Dominio: <span class="required">*</span></label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa fa-pencil"></i></span>
					</span>
					<input class="form-control" type="text" placeholder="Dominio" id="dominio" value="<?php echo $dominio ?>">
				</div>
				<!--<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Licencias: <span class="required">*</span></label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa fa-pencil"></i></span>
					</span>
					<input class="form-control" type="text" placeholder="Licencias Permitidas" id="licencias" value="<?php echo $licencias ?>">
				</div>-->
	
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Grupo: <span class="required">*</span></label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-pencil"></i></span>
					</span>
					<input disabled class="form-control" type="text" placeholder="Sin Grupo" id="grupo" value="<?php echo $grupo; ?>">
					<select data-plugin-selectTwo class="form-control populate" id="select_grupo">
					</select>
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
                <button id="button" href="#" class="btn btn-danger btn-ok" data-dismiss="modal" onclick="update_estaciones_bd('<?php echo $id ?>','<?php echo $idCliente; ?>','<?php echo $id_grupo; ?>');" >
                Modificar Estación</button>

              	</div>
				</section>       
              <?php }  
              ?> 

			

	</div>
</div>


