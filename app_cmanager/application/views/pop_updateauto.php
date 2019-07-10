
<script type="text/javascript">
  $(document).ready(function() {
    select_cliente_auto() 
  });

  function select_cliente_auto() { 
        $.ajax({
            url: '<?=site_url('controller1/c_listar_select_clientes')?>',
            type: "post",
            //beforeSend: show_Loading(),
            dataType: "html",
            success: function(data){
                $('select#select_cliente_auto').html(data);
            //hide_Loading();      
            }
        });
    }

  function mostrarArchivo_qr(){
    var archivo_qr=$('input#inputrutacarga').val();
    $('input#ruta').val(archivo_qr);
  } 


</script>

<div class="col-md-12">
    <div class="box box-primary">


        	<?php
              if (!isset($validate)) { ?>                
                <center><h3 id="subtitulo" class="box-title">Modificar Automatización</h3></center> 
                <br>
                <section class="form-group-vertical">
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Nombre: <span class="required">*</span></label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-pencil"></i></span>
					</span>
					<input class="form-control" type="text" placeholder="nombre" id="nombre" value="<?php echo $nom_autom ?>">
				</div>

				<?php
				$rol =  $_SESSION['rol']; 
				if ($rol == 'Admin') { ?>	
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Cliente: <span class="required">*</span></label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-pencil"></i></span>
					</span>
					<input disabled class="form-control" type="text" placeholder="Cliente" id="cliente" value="<?php echo $nom_cliente; ?>">
					<select data-plugin-selectTwo class="form-control populate" id="select_cliente_auto">
					</select>
				</div>
				<?php }	?>	

				<div class="form-group-vertical">
                    <label class="input-group input-group-icon">
                      <label class="col-lg-2 control-label text-lg-right pt-2">Ruta: <span class="required">*</span></label>
                      <span class="mb-1 mt-1 mr-1 btn btn-default">
	                      Examinar… <input style="display: none;" multiple="" type="file" onchange="mostrarArchivo_qr()" id="inputrutacarga" name="inputrutacarga">
	                  </span>
	                  <input class="form-control" type="text" placeholder="ruta" id="ruta" value="<?php echo $ruta ?>">  
                    </label>                          
                </div>
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Version: <span class="required">*</span></label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-pencil"></i></span>
					</span>
					<input class="form-control" type="text" placeholder="version" id="version" value="<?php echo $version ?>">
				</div>
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Tipo: <span class="required">*</span></label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-pencil"></i></span>
					</span>
					<input class="form-control" type="text" placeholder="tipo" id="tipo" value="<?php echo $tipo ?>">
				</div>
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Conjunto: <span class="required">*</span></label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-pencil"></i></span>
					</span>
					<input class="form-control" type="text" placeholder="conjunto" id="conjunto" value="<?php echo $conjunto ?>">
				</div>
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Descripcion: <span class="required">*</span></label>
					<textarea class="form-control" type="text" placeholder="Descripcion" id="Descripcion"><?php echo $descripcion ?></textarea>
				</div>
				<br>
				<div class="modal-footer">
				<button type="button" class="mb-1 mt-1 mr-1 btn btn-default" data-dismiss="modal">Close</button>
                <button id="button" href="#" class="btn btn-danger btn-ok" data-dismiss="modal" onclick="update_automatizacion_bd('<?php echo $id;?>');" >Actualizar Automatización</button>  

              	</div>
				</section>

              <?php } else { ?>
                <center><h3 id="subtitulo" class="box-title">Ingresar Nueva Automatización</h3></center>   
                <br>
                <section class="form-group-vertical">
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Nombre: <span class="required">*</span></label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-plus-circle"></i></span>
					</span>
					<input class="form-control" type="text" placeholder="nombre" id="nombre">
				</div>
				<div class="form-group-vertical">
                    <label class="input-group input-group-icon">
                      <label class="col-lg-2 control-label text-lg-right pt-2">Ruta: <span class="required">*</span></label>
                      <span class="mb-1 mt-1 mr-1 btn btn-default">
	                      Examinar… <input style="display: none;" multiple="" type="file" onchange="mostrarArchivo_qr()" id="inputrutacarga" name="inputrutacarga">
	                  </span>
	                  <input class="form-control" type="text" placeholder="ruta" id="ruta">  
                    </label>                          
                </div>
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Version: <span class="required">*</span></label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-plus-circle"></i></span>
					</span>
					<input class="form-control" type="text" placeholder="version" id="version">
				</div>
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Tipo: <span class="required">*</span></label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-plus-circle"></i></span>
					</span>
					<input class="form-control" type="text" placeholder="tipo" id="tipo">
				</div>
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Conjunto: <span class="required">*</span></label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-plus-circle"></i></span>
					</span>
					<input class="form-control" type="text" placeholder="conjunto" id="conjunto">
				</div>
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Descripcion: <span class="required">*</span></label>
					<textarea class="form-control" type="text" placeholder="Descripcion" id="Descripcion"></textarea>
				</div>
				<br>
				<div class="modal-footer">
				<button type="button" class="mb-1 mt-1 mr-1 btn btn-default" data-dismiss="modal">Close</button>
                <button id="button" class="btn btn-primary btn-ok" onclick="crear_automatizacion_bd('<?php echo $id;?>');" >Crear Automatización</button>  

              	</div>
				</section>       
              <?php }  
              ?> 

			

	</div>
</div>


