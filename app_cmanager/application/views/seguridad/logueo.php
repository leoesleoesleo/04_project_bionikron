
<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?=base_url()?>vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?=base_url()?>vendor/animate/animate.css">

		<link rel="stylesheet" href="<?=base_url()?>vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?=base_url()?>vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?=base_url()?>vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?=base_url()?>css/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?=base_url()?>css/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?=base_url()?>css/custom.css">

		<!-- Head Libs -->
		<script src="<?=base_url()?>vendor/modernizr/modernizr.js"></script>

	

<!-- <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
jQuery library -->
<script type="text/javascript" src="<?=base_url()?>/plugins/jQuery/jquery-3.1.1.min.js"></script>

</head>

<script type="text/javascript">
    $(document).ready(function(){       

        $('input#pwd').keypress(function(e) {
            if(e.keyCode==13){
                logueo();
            }
        });  	 	   	   	
        $('input#usuario').focus(); 
    });	
    
    function logueo_(){

    	var usuario=$('input#usuario').val();
    	var pws=$('input#pwd').val();
    	var params={'usuario':usuario,'pws':pws};

    	if ($('input#usuario').val()=="" || $('input#pwd').val()==""){
            $.notify("¡ERROR! Ingrese usuario y contraseña.", "error");
            alert("¡ERROR! Ingrese usuario y contraseña.");
	    	return;
    	}
    	
        $.ajax({
            url: '<?=site_url('seguridad/login')?>',
            data: params,
            type: "post",
            //beforeSend: function(objeto){dialogoEsperaMostrar();}, 
            //beforeSend: showLoading(),      
            dataType: "text",
            success: function(datos){
                //hidetext()
                //hidetext2()
                //showtext()	            	
                if (datos=='noExiste'){
                      $.notify("¡ERROR!','El usuario no registra en la aplicación.", "error");
                     //hideLoading();            	 
    	    		return;
                }
                if (datos=='desactivado'){
                    $.notify("¡ERROR!','El usuario se encuentra desactivado.", "error");
                    //hideLoading();
    				return;
                }             
                if (datos=='usuarioErroneo'){
                    $.notify("¡ERROR!','No es posible la comunicación con la bd.", "error");
                    //hideLoading();
    				return;
                }                 
                if (datos=='PwdErroneo'){
                    $.notify("¡ERROR!','Nombre de usuario o contraseña invalido, verifique la información de ingreso, valide que su usuario no se encuentre bloqueado.", "error");
                    //hideLoading();                	
    				return;
                }    
                if (datos=='OK'){
					window.location.href = "<?=site_url('Controller1')?>";                	
                }
              //hidetext()  
             //hideLoading();   
            }
        });
    } 

</script>



	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo float-left">
					<img src="<?=base_url()?>img/logo_ini.png" height="54" alt="Porto Admin" />
				</a>

				<div class="panel card-sign">
					<div class="card-title-sign mt-3 text-right">
						<h2 class="title text-uppercase font-weight-bold m-0"><i class="fa fa-user mr-1"></i> Sign In</h2>
					</div>
					<div class="card-body">
						<form method="post">
							<div class="form-group mb-3">			
								<label>Username</label>
								<div class="input-group input-group-icon">
									<input class="form-control form-control-lg" placeholder="Usuario" name="login" type="email" id="usuario" autofocus />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-3">
								<div class="clearfix">
									<label class="float-left">Password</label>
								</div>
								<div class="input-group input-group-icon">
									<input class="form-control form-control-lg"  placeholder="Contraseña" name="clave" type="password" id="pwd" value="" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-4 text-right">
									<input id="logueo" class="btn btn-primary mt-2" type="submit" name="enviar" value="Sign In" onclick="logueo_()">
								</div>
							</div>

						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-3 mb-3">&copy; Copyright 2018. All Rights Reserved.</p>
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="<?=base_url()?>vendor/jquery/jquery.js"></script>
		<script src="<?=base_url()?>vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?=base_url()?>vendor/popper/umd/popper.min.js"></script>
		<script src="<?=base_url()?>vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?=base_url()?>vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?=base_url()?>vendor/common/common.js"></script>
		<script src="<?=base_url()?>vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?=base_url()?>vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="<?=base_url()?>vendor/jquery-placeholder/jquery-placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?=base_url()?>js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?=base_url()?>js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?=base_url()?>js/theme.init.js"></script>

		<!-- notify -->
		<script src="<?=base_url()?>vendor/notify/notify.js"></script>

	</body>
</html>