<script type="text/javascript">
	
$(document).ready(function(){
  $('#buscador').keyup(function(){
     var nombres = $('.nombres');
     var buscando = $(this).val();
     var item='';
     for( var i = 0; i < nombres.length; i++ ){
         item = $(nombres[i]).html().toLowerCase();
          for(var x = 0; x < item.length; x++ ){
              if( buscando.length == 0 || item.indexOf( buscando ) > -1 ){
                  $(nombres[i]).parents('.item').show(); 
              }else{
                   $(nombres[i]).parents('.item').hide();
              }
          }
     }
  });
});


</script>

<div class="col-lg-6 col-xl-6">	
	<section class="card card-featured-left card-featured-primary mb-4">
		<div class="card-body">
			<div class="widget-summary widget-summary-md">
				<div class="widget-summary-col widget-summary-col-icon">
					<div class="summary-icon bg-primary">
						<i class="fa fa-cubes"></i>
					</div>
				</div>
				<div class="widget-summary-col">
					<div class="summary">
						<h4 class="card-title">Automatizaciones</h4>

						<p class="buscador">
							<div class="input-group input-search">		
								<input type="text" class="form-control" id="buscador" placeholder="Buscar...">
								<span class="input-group-btn">
									<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
								</span>
							</div>
						</p>

						<div class="info">
							<?php foreach ($consulta_auto as $key => $value):?>
							<strong class="amount"><?php echo number_format($value['fre'], 0, '', '.');?></strong>
							<?php endforeach; ?>
							<span class="text-primary">(Automatizaciones Creadas)</span>
							<a title="Recuperar Automatizaciones" onclick="recuperar_automatizacion()" href="#" data-toggle="modal" data-target="#dialog_estaciones"><i style="float:right;font-size:28px;padding-right:38px;color:#0088cc;" class="fa fa-cogs"></i></a>
						</div>


					</div>
					<div style="float:left !important;" class="summary-footer">
						<!--<?php foreach ($usuarios_admin as $key => $value):?>
						<strong class="amount"><?php echo number_format($value['usuarios_admin'], 0, '', '.');?></strong>
						<?php endforeach; ?>
						<span class="text-primary">(Usuarios Admin)</span>-->
					</div>
				</div>
			</div>
		</div>
		
		<div class="card-footer card-footer-btn-group">
			<!--<a href="#" data-toggle="modal" data-target="#dialog_estaciones" onclick="crear_automatizacion();"><i class="fa fa-plus-circle"></i> Crear</a>
			<a href="#"><i class="fa fa fa-eye"></i> Ver Detalle</a>-->
		</div>
		
	</section>
</div>



<div class="col-lg-6 col-xl-6">
	
</div>

<span class="separator"></span>


<?php foreach ($automatizaciones as $fila){ ?> 	
	<div class="col-lg-2 col-xl-2">
    <div class="item">
        <label style="display:none;" class="nombres"><?= $fila->nom_autom;?></label>
		<section class="card mt-2">
			<header class="card-header bg-primary">
				<div class="card-header-icon">
					<i class="fa fa-cube"></i>
				</div>
				<center>
					<div class="card-footer card-footer-btn-group">
						<?php if($_SESSION['rol'] != 'Usuario'): ?>
						<a style="color:#AB9900;" title="Relacionar Automatización con Grupos de Estaciones" href="#" data-toggle="modal" data-target="#dialog_estaciones" onclick="relacionar_automatizacion('<?= $fila->id;?>','<?= $fila->nom_autom;?>');"><i class="fa fa-chain-broken"></i></a>
						<a style="color:green;" title="Editar metadatos Automatización" href="#" data-toggle="modal" data-target="#dialog_estaciones" onclick="update_automatizacion('<?= $fila->id;?>','<?= $fila->id_cliente;?>','<?= $fila->nom_autom;?>','<?= $fila->ruta;?>','<?= $fila->version;?>','<?= $fila->tipo;?>','<?= $fila->conjunto;?>','<?= $fila->Descripcion;?>','<?= $fila->nom_cliente;?>');"><i class="fa fa-edit"></i></a>
						<a style="color:#D2312D;" title="Eliminar Automatización" href="#" data-toggle="modal" data-target="#dialog_estaciones" onclick="eliminar_automatizaciones('<?= $fila->id;?>','<?= $fila->nom_autom;?>');"><i class="fa fa-minus-circle"></i></a>
						<a style="color:#0088cc;" title="Ver y Editar Estaciones relacionadas " href="#" data-toggle="modal" data-target="#dialog_estaciones" onclick="auto_listarestaciones('<?= $fila->id;?>');"><i class="fa fa fa-eye"></i></a>
						<?php endif;?>
					</div>
			    </center>
			</header>
			<div class="item">
				<div class="card-body text-center">				
					<h5 class="font-weight-semibold mt-3 text-center">Nombre: <?= $fila->nom_autom;?></h5>
					<p class="text-center" style="font-size: 11px !important;"><?= $fila->Descripcion;?></p>
					<h6 class="font-weight-semibold mt-3 text-center">Conjunto: <?= $fila->conjunto;?></h6>
					<h6 class="font-weight-semibold mt-3 text-center">Versión: <?= $fila->version;?></h6>
				</div>	
			</div>	
		</section>
    </div>
</div>  
<?php } ?> 



<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="dialog_estaciones">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       <div class="modal-header">
       		<h4 class="modal-title">Editando Automatizaciones</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="container-fluid">
            <br>

            <div id="estaciones"></div>

       </div>
      </div>
  </div>
</div>	


	


    

  

