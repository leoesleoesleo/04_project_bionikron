
<link rel="stylesheet" href="<?=base_url()?>vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
<link rel="stylesheet" href="<?=base_url()?>vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
<link rel="stylesheet" href="<?=base_url()?>vendor/dropzone/basic.css" />
<link rel="stylesheet" href="<?=base_url()?>vendor/dropzone/dropzone.css" />
<link rel="stylesheet" href="<?=base_url()?>vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />
<link rel="stylesheet" href="<?=base_url()?>vendor/summernote/summernote-bs4.css" />
<link rel="stylesheet" href="<?=base_url()?>vendor/codemirror/lib/codemirror.css" />
<link rel="stylesheet" href="<?=base_url()?>vendor/codemirror/theme/monokai.css" />

<script type="text/javascript">
	
$(document).ready(function() {
    select_grupos(); 
    select_estaciones(); 
});

function select_estaciones() { 
        $.ajax({
            url: '<?=site_url('controller1/c_listar_estaciones_grupo')?>',
            type: "post",
            //beforeSend: show_Loading(),
            dataType: "html",
            success: function(data){
                $('select#estaciones').html(data);
            //hide_Loading();      
            }
        });
    } 

function select_grupos() { 
        $.ajax({
            url: '<?=site_url('controller1/c_listar_grupo')?>',
            type: "post",
            //beforeSend: show_Loading(),
            dataType: "html",
            success: function(data){
                $('select#grupos').html(data);
            //hide_Loading();      
            }
        });
    }   

</script>

		<center><h3 id="subtitulo" class="box-title">Agrupar Estaciones</h3></center> 
						
		<div class="card-body">
			<form class="form-horizontal form-bordered" action="#">
				<div class="form-group row">
					<label class="col-lg-3 control-label text-lg-right pt-2">Grupo <span class="icon"><i class="fa fa-th"></i></span></label>
					<div class="col-lg-8">						

						<select data-plugin-selectTwo class="form-control populate" id="grupos">
						</select>
			
						
			
					</div>
				</div>

				<div class="form-group row">
					<label class="col-lg-3 control-label text-lg-right pt-2">Estaciones <span class="icon"><i class="fa fa-laptop"></i></span></label>
					<div class="col-lg-8">
						<select multiple data-plugin-selectTwo class="form-control populate" id="estaciones">
						</select>
					</div>
				</div>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
					
			</form>
		</div>

		<div class="modal-footer">
			<button type="button" class="mb-1 mt-1 mr-1 btn btn-default" data-dismiss="modal">Close</button>
			<button id="button" href="#" class="btn btn-danger btn-ok" data-dismiss="modal" class="btn btn-primary btn-ok" onclick="agrupar_estaciones_bd();" >Agrupar</button>        
      	</div>
	

		<script src="<?=base_url()?>vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
		<script src="<?=base_url()?>vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
		<script src="<?=base_url()?>vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
		<script src="<?=base_url()?>vendor/fuelux/js/spinner.js"></script>
		<script src="<?=base_url()?>vendor/dropzone/dropzone.js"></script>
		<script src="<?=base_url()?>vendor/bootstrap-markdown/js/markdown.js"></script>
		<script src="<?=base_url()?>vendor/bootstrap-markdown/js/to-markdown.js"></script>
		<script src="<?=base_url()?>vendor/bootstrap-markdown/js/bootstrap-markdown.js"></script>
		<script src="<?=base_url()?>vendor/codemirror/lib/codemirror.js"></script>
		<script src="<?=base_url()?>vendor/codemirror/addon/selection/active-line.js"></script>
		<script src="<?=base_url()?>vendor/codemirror/addon/edit/matchbrackets.js"></script>
		<script src="<?=base_url()?>vendor/codemirror/mode/javascript/javascript.js"></script>
		<script src="<?=base_url()?>vendor/codemirror/mode/xml/xml.js"></script>
		<script src="<?=base_url()?>vendor/codemirror/mode/htmlmixed/htmlmixed.js"></script>
		<script src="<?=base_url()?>vendor/codemirror/mode/css/css.js"></script>
		<script src="<?=base_url()?>vendor/summernote/summernote-bs4.js"></script>
		<script src="<?=base_url()?>vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
		<script src="<?=base_url()?>vendor/ios7-switch/ios7-switch.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?=base_url()?>js/theme.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?=base_url()?>js/theme.init.js"></script>

		<!-- Examples -->
		<script src="<?=base_url()?>js/examples/examples.advanced.form.js"></script>

	</body>
</html>