
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
    select_auto_res(); 
});

function select_auto_res() { 
        $.ajax({
            url: '<?=site_url('controller1/c_select_auto_res')?>',
            type: "post",
            //beforeSend: show_Loading(),
            dataType: "html",
            success: function(data){
                $('select#auto_res').html(data);
            //hide_Loading();      
            }
        });
    } 

</script>
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <center><h3 id="subtitulo" class="box-title">Recuperar Automatizaciones Borradas !</h3></center>
            </div>
            <div class="box-body">  

            	<br>
	            <div class="col-lg-12">
					<div class="form-group row">
					<label class="col-lg-3 control-label text-lg-right pt-2">Automatizaciones 
						<span class="icon"><i class="fa fa-cubes"></i></span> 
					</label>
						<div class="col-lg-8">
							<select multiple data-plugin-selectTwo class="form-control populate" id="auto_res">
							</select>
						</div>
					</div>
				</div>
				<br>
				<br>
				</div>   
            
              <div class="modal-footer">
                <button type="button" class="mb-1 mt-1 mr-1 btn btn-default" data-dismiss="modal" >Close</button>
                <button id="button" href="#" class="btn btn-danger btn-ok" data-dismiss="modal" onclick="recuperar_automatizacion_bd()" >
                Restaurar Automatizaciones</button>
              </div>

          </div>          
         </div>         
         <br/>
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

        