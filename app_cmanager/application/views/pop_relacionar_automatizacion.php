<script type="text/javascript">


$(document).ready(function() {
    select_grupos_() 
});


function select_grupos_() { 
        $.ajax({
            url: '<?=site_url('controller1/c_listar_estaciones')?>',
            type: "post",
            //beforeSend: show_Loading(),
            dataType: "html",
            success: function(roles){
                $('select#grupos').html(roles);
            //hide_Loading();      
            }
        });
    }

/*function select_actividad() {
      var select_actividad = $('select#select_actividad').val();
      //alert(select_actividad);
      $.ajax({
                url: '<?=site_url('controller1/c_actividad')?>', 
                data: {'select_actividad':select_actividad},
                type: "post",
                //beforeSend: show_Loading(),
                dataType: "text", 
                success: function(dato){
                  $('select.col-lg-9').html(dato); 
                //hide_Loading();  
                }
         });
}    */ 

</script>


<div class="col-md-12">
    <div class="box box-primary">

            
                <center><h3 id="subtitulo" class="box-title">Relacionar Automatización con Grupos de Estaciones</h3></center> 
                <br>

                <section class="form-group-vertical">
				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Automatización: <span class="required">*</span></label>
					<span class="input-group-addon">
						<span class="icon"><i class="fa fa-cube"></i></span>
					</span>
					<input disabled class="form-control" type="text" placeholder="nombre" id="nombre" value="<?php echo $nombre ?>">
				</div>

				<div class="input-group input-group-icon">
					<label class="col-lg-2 control-label text-lg-right pt-2">Grupo Estación: <span class="required">*</span></label>
					<span class="input-group-addon">
						<span class="icon"></span> <!--<i class="fa fa-chain-broken"></i>-->
					</span>
					<select id="grupos" class="form-control" type="text"></select>
				</div>

				<br>
				<div class="modal-footer">
				<button type="button" class="mb-1 mt-1 mr-1 btn btn-default" data-dismiss="modal">Close</button>
                <button id="button" href="#" class="btn btn-danger btn-ok" data-dismiss="modal" onclick="relacionarauto_bd('<?php echo $id;?>');" >
                Relacionar Automatización</button> 

              	</div>
				</section>
		

	</div>
</div>