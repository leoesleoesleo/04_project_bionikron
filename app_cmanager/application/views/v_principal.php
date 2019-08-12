
<!doctype html>
<html class="fixed sidebar-left-collapsed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">
		<title>Admin Bionikron</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=base_url()?>img/icono.png" type="image/x-icon" />
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

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?=base_url()?>vendor/jquery-ui/jquery-ui.css" />
		<link rel="stylesheet" href="<?=base_url()?>vendor/jquery-ui/jquery-ui.theme.css" />
		<link rel="stylesheet" href="<?=base_url()?>vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="<?=base_url()?>vendor/morris/morris.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?=base_url()?>vendor/select2/css/select2.css" />
		<link rel="stylesheet" href="<?=base_url()?>vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
		<link rel="stylesheet" href="<?=base_url()?>vendor/datatables/media/css/dataTables.bootstrap4.css" />
		<link rel="stylesheet" href="<?=base_url()?>vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?=base_url()?>css/theme.css" />
		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?=base_url()?>css/skins/default.css" />
		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?=base_url()?>css/custom.css">
		<!-- Head Libs -->
		<script src="<?=base_url()?>vendor/modernizr/modernizr.js"></script>
		
   
	</head>


<script type="text/javascript">

$(document).ready(function (){
    hide_Loading();
  });

function hide_Loading() {
    $("#loading").hide('slow', function(){
  });
  }

  function show_Loading() {
  $("#loading").show('fast', function(){
    });
  }  

function recargar_pagina() {
  location.reload();  
}
	
function alert_verde() {
		$.notify("Access granted", "success");
}
function alert_amarilla() {		
	$.notify("Warning: Self-destruct in 3.. 2..", "warn");
}
function alert_roja() {
	$.notify("BOOM!", "error");
}
function alert_azul() {
	$.notify("Do not press this button", "info");
}

function hide_Loading_table() {
	$("#table_ip").show('fast', function(){
	});
}

/*inicio clientes*/

function listar_clientes() {    
    $.ajax({
        url: '<?=site_url('controller1/c_listar_clientes')?>',
        //data: {'Usuarios':Usuarios},
        type: "post",
        beforeSend: show_Loading(),
        dataType: "html",
        success: function(data){
            $('div#contenido').html(data); 
            $('span#var_i').html("Clientes"); 
        hide_Loading();               
        }
    });
}

function listar_ip(id_clientes) { 
    $.ajax({
        url: '<?=site_url('controller1/c_listar_ip')?>',
        data: {'id_clientes':id_clientes},
        type: "post",
        beforeSend: show_Loading(),
        dataType: "html",
        success: function(dato_pop){
            $('div#table_ip').html(dato_pop);
        //overlayclickclose_tran();
        hide_Loading(); 
        hide_Loading_table(); 
        } 
    }); 
}

function pop_cliente() {    
    $.ajax({
        url: '<?=site_url('controller1/c_insert_clientes')?>',
        //data: {'Usuarios':Usuarios},
        type: "post",
        beforeSend: show_Loading(),
        dataType: "html",
        success: function(data){
            $('div#modi_cliente').html(data); 
        hide_Loading();                
        }
    });
}

function pop_nueva_ip() {    
    $.ajax({
        url: '<?=site_url('controller1/c_insert_clientes')?>',
        //data: {'Usuarios':Usuarios},
        type: "post",
        beforeSend: show_Loading(),
        dataType: "html",
        success: function(data){
            $('div#modi_cliente').html(data); 
        hide_Loading();                
        }
    });
}

function insert_cliente(activo) {  
  var cliente   = $('input#cliente').val();
  var actividad = $('select#select_actividad').val();
  var licencias = $('input#licencias').val();


  if (cliente == ''){
    $.notify("El campo Cliente es obligatorio", "warn");
    return;
  }

  if (licencias == ''){
    $.notify("El campo licencias es obligatorio", "warn");
    return;
  }

  if (actividad == '-- Seleccione Actividad --'){
    $.notify("El campo Actividad es obligatorio", "warn");
    return;
  }
  
  $.ajax({
            url: '<?=site_url('controller1/c_insert_cliente_bd')?>',
            data: {'cliente':cliente,'actividad':actividad,'licencias':licencias},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "text", 
            success: function(datos_insert){ 

          if (datos_insert=='usercreated'){
                  alert('Proceso OK');
                  listar_clientes();
                  $.notify("Cliente Creado Correctamente", "success");   
                  hide_Loading();                           
          return;
            }
            if (datos_insert=='errorcreated'){
                 $.notify("Error al crear el cliente!", "error");
                 hide_Loading();             
          return;
            }
            
            }
     });
}  

function update_cliente(id_clientes,nombre,activo,nro_licencias_permitidas) { 
        $.ajax({
            url: '<?=site_url('controller1/c_update_clientes')?>',
            data: {'id_clientes':id_clientes,'nombre':nombre,'activo':activo,'nro_licencias_permitidas':nro_licencias_permitidas},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
                $('div#modi_cliente').html(dato_pop);
            //overlayclickclose_tran();
            hide_Loading(); 
            } 
        }); 
}

function pop_crear_ip(val_new) {	 
   	var val_ =  val_new;
        $.ajax({
            url: '<?=site_url('controller1/c_update_ip')?>',
            data: {'val_':val_},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
                $('div#modi_cliente').html(dato_pop);
            //overlayclickclose_tran();
            hide_Loading(); 
            } 
        }); 
}


function crear_ip_bd() {  
  var ip_cliente = $('select#ip_cliente').val();
  var ip = $('input#ip').val();
  
  if (ip == ''){
    $.notify("El campo Ip es obligatorio", "warn");
    return;
  }

  if (ip_cliente == '-- Seleccione Cliente --'){
    $.notify("El campo Cliente es obligatorio", "warn");
    return;
  }

  $.ajax({
            url: '<?=site_url('controller1/c_insert_ip_cliente')?>',
            data: {'ip_cliente':ip_cliente,'ip':ip},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "text", 
            success: function(datos_insert){ 

        	if (datos_insert=='usercreated'){
                  alert('Proceso OK');
                  $.notify("Ip creada correctamente", "success");
                  listar_ip();   
                  hide_Loading();         	 
	    		return;
            }
            if (datos_insert=='errorcreated'){
                 alert("Error al crear la Ip!", "error");
                 hideLoading();  
                 hide_Loading();           	 
	    		return;
            }
            
            }
     });
}

function delete_ip(id_ip,id_cliente,nombre,IP,val_delete) {	 
   	var val_ =  val_delete;
        $.ajax({
            url: '<?=site_url('controller1/c_update_ip')?>',
            data: {'id_ip':id_ip,'id_cliente':id_cliente,'nombre':nombre,'IP':IP,'val_':val_},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
                $('div#modi_cliente').html(dato_pop);
            //overlayclickclose_tran();
            hide_Loading(); 
            } 
        }); 
}

function update_ip(id_ip,id_cliente,nombre,IP,val_update) {	 
   	var val_ =  val_update;
        $.ajax({
            url: '<?=site_url('controller1/c_update_ip')?>',
            data: {'id_ip':id_ip,'id_cliente':id_cliente,'nombre':nombre,'IP':IP,'val_':val_},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
                $('div#modi_cliente').html(dato_pop);
            //overlayclickclose_tran();
            hide_Loading(); 
            } 
        }); 
}

function update_cliente_bd(id_clientes,activo,licencias) { 
  var select_actividad_update   = $('select#select_actividad_update').val();
  var clienteupdate             = $('input#clienteupdate').val();
  var licencias                 = $('input#licenciasupdate').val();
  
        $.ajax({
            url: '<?=site_url('controller1/c_update_clientes_bd')?>',
            data: {'id_clientes':id_clientes,'clienteupdate':clienteupdate,'select_actividad_update':select_actividad_update,'activo':activo,'licencias':licencias},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
                if (dato_pop=='update'){
                    alert('Proceso ok');
                    listar_clientes();
                    $.notify("Cliente actualizado correctamente", "success");
                    hide_Loading();               
            return;
              }
              if (dato_pop=='errorupdate'){
                   $.notify("Error al actualizar el cliente!", "error");
                   hide_Loading();             
            return;
              }
            //listar_roles()    
            hide_Loading(); 
            } 
        }); 
  } 

function eliminar_cliente(id_cliente,nombre) {  
        $.ajax({
            url: '<?=site_url('controller1/elimina_cliente')?>',
            data: {'id_cliente':id_cliente,'nombre':nombre},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
                $('div#modi_cliente').html(dato_pop);
            hide_Loading(); 
            } 
        }); 
  }

function eliminar_clientes_bd(id_cliente) {  
        $.ajax({
            url: '<?=site_url('controller1/c_delete_cliente')?>',
            data: {'id_cliente':id_cliente},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
            if (dato_pop=='User_delete'){
                alert('Proceso ok');
                listar_clientes();
                $.notify("Cliente eliminado correctamente", "success");
                hide_Loading();              
        		return;
          	}
            if (dato_pop=='error_delete'){
                $.notify("Error al eliminar el cliente!", "error");
                hide_Loading();              
            	return;
            }
            if (dato_pop=='alert_delete'){
                $.notify("El cliente aún tiene ligado usuarios, estaciones ó Automatizaciones!", "warn");
                hide_Loading();              
            	return;
            }
            //listar_roles()    
            hide_Loading(); 
            } 
        }); 
  } 




/*fin clientes*/


/*inicio Usuarios */

function pop_usuarios() {    
    $.ajax({
        url: '<?=site_url('controller1/c_pop_crear_usuarios')?>',
        //data: {'Usuarios':Usuarios},
        type: "post",
        beforeSend: show_Loading(),
        dataType: "html",
        success: function(data){
            $('div#update_user').html(data); 
        hide_Loading();                
        }
    });
}

function listar_usuarios() {    
    $.ajax({
        url: '<?=site_url('controller1/c_listar_usuarios')?>',
        //data: {'Usuarios':Usuarios},
        type: "post",
        beforeSend: show_Loading(),
        dataType: "html",
        success: function(data){
            $('div#contenido').html(data); 
            $('span#var_i').html("Usuarios"); 
        hide_Loading();                
        }
    });
}


function insert_user() {  
  var nombres = $('input#w4-username').val();
  var apellidos = $('input#w4-password').val();
  var cc = $('input#w4-first-name').val();
  var fechaNac = $('input#w4-last-name').val();
  var usuario = $('input#w4-cc').val();
  var password = $('input#password').val();
  var confir_password = $('input#conf_password').val();
  var email = $('input#w4-email').val();
  

  if (password != confir_password){
    $.notify("Los Password no son iguales!", "error");
    return;
  }

  $.ajax({
            url: '<?=site_url('controller1/c_insert_user')?>',
            data: {'nombres':nombres,'apellidos':apellidos,'cc':cc,'fechaNac':fechaNac,'usuario':usuario,'password':password,'email':email},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "text", 
            success: function(datos_insert){ 

        	if (datos_insert=='usercreated'){
                  alert('Proceso OK');
                  //swal("Genial!", "Has clicado el botón!", "success")
                  $.notify("Usuario creado correctamente", "success");
                  listar_usuarios();   
                  hide_Loading();         	 
	    		return;
            }
            if (datos_insert=='errorcreated'){
                  //$.notify("Error al crear el usuario!", "error");
                 alert("Error al crear el usuario!", "error");
                 hideLoading();  
                 hide_Loading();           	 
	    		return;
            }
            
            }
     });
}   


function update_user(cliente,usuario,nombres,apellidos,email,activo,rol,id_usuario,fecha_nac,cc) {  
        $.ajax({
            url: '<?=site_url('controller1/c_update_usuarios')?>',
            data: {'cliente':cliente,'usuario':usuario,'nombres':nombres,'apellidos':apellidos,'email':email,'activo':activo,'rol':rol,'id_usuario':id_usuario,'fecha_nac':fecha_nac,'cc':cc},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
                $('div#update_user').html(dato_pop);
            //overlayclickclose_tran();
            hide_Loading(); 
            } 
        }); 
}

function update_user_bd(nombre,rol,activo,id_usuario) {  	
		var usuario = $('input#usuario').val();
		var nombres = $('input#nombres').val();
		var apellidos = $('input#apellidos').val();
		var email = $('input#email').val();
		var cedula = $('input#cedula').val();
		var fecha_nac = $('input#fecha_nac').val();

		var select_actividad = $('select#select_actividad').val();
		var select_roles = $('select#roles').val();
    	var select_clientes = $('select#clientes').val();

		if (usuario==''){
    	$.notify("El campo usuario es Obligatorio", "warn");
    	return;
  		}

  		if (nombres==''){
    	$.notify("El campo nombres es Obligatorio", "warn");
    	return;
  		}

  		if (apellidos==''){
    	$.notify("El campo apellidos es Obligatorio", "warn");
    	return;
  		}

  		if (email==''){
    	$.notify("El campo email es Obligatorio", "warn");
    	return;
  		}

  		if (fecha_nac==''){
    	$.notify("El campo fecha nacimiento es Obligatorio", "warn");
    	return;
  		}

  		if (cedula==''){
    	$.notify("El campo cedula es Obligatorio", "warn");
    	return;
  		}
		  if (select_actividad == '-- Seleccione Actividad --'){
				var activo = activo;         	 
	    } else if (select_actividad != '-- Seleccione Actividad --'){
	       		var activo = select_actividad;  
	    }

      if (select_roles == '-- Seleccione Rol --'){
			var rol = rol;         	 
      } else if (select_roles != '-- Seleccione Rol --'){
       		var rol = select_roles;  
      }   


        $.ajax({
            url: '<?=site_url('controller1/c_update_usuarios_bd')?>',
            data: {'usuario':usuario,'nombres':nombres,'apellidos':apellidos,'email':email,'activo':activo,'rol':rol,'id_usuario':id_usuario,'fecha_nac':fecha_nac,'cedula':cedula,'select_clientes':select_clientes},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
	            if (dato_pop=='user_update'){
                    alert('Poceso OK');
	                  $.notify("Usuario Actualizado Correctamente", "success");
	                  listar_usuarios();   
	                  hide_Loading();         	 
		    		return;
	            }
	            if (dato_pop=='error_update'){
	                 $.notify("Error al Actualizar el usuario!", "error");
	                 hide_Loading();            	 
		    		return;
	            }
	            //listar_usuarios();
            } 
        }); 
}

function update_ip_bd(id_ip,id_cliente) {
	var nombre = $('input#nombre').val();
	var ip = $('input#ip').val(); 

	if (nombre==''){
    	$.notify("El campo cliente es Obligatorio", "warn");
    	return;
  		}

  	if (ip==''){
    	$.notify("El campo ip es Obligatorio", "warn");
    	return;
  		}
  			 	
		    $.ajax({
            url: '<?=site_url('controller1/c_update_ip_bd')?>',
            data: {'id_ip':id_ip,'id_cliente':id_cliente,'nombre':nombre,'ip':ip},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
	            if (dato_pop=='user_update'){
                    alert('Poceso OK');
	                  $.notify("Ip Actualizada Correctamente", "success");
	                  listar_ip();   
	                  hide_Loading();         	 
		    		return;
	            }
	            if (dato_pop=='error_update'){
	                 $.notify("Error al Actualizar la Ip!", "error");
	                 hide_Loading();            	 
		    		return;
	            }
            } 
        }); 
}

  function delete_ip_bd(id_ip) {  
        $.ajax({
            url: '<?=site_url('controller1/c_delete_ip')?>',
            data: {'id_ip':id_ip},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
                if (dato_pop=='User_delete'){
                    alert('Poceso OK');
	                $.notify("Ip Eliminada Correctamente", "success");
	                listar_ip(); 
	                hide_Loading();         	 
		    		return;
	            }
	            if (dato_pop=='error_delete'){
	                $.notify("Error al eliminar la ip!", "error");
	                hide_Loading();            	 
		    		return;
	            }
            //listar_roles()    
            hide_Loading(); 
            } 
        }); 
  } 

 function eliminar_usuarios(id_usuario,usuario,rol) {  
        $.ajax({
            url: '<?=site_url('controller1/lista_elimina_user')?>',
            data: {'id_usuario':id_usuario,'usuario':usuario,'rol':rol},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
                $('div#update_user').html(dato_pop);
            hide_Loading(); 
            } 
        }); 
  }

 function eliminar_usuarios_bd(id_usuario,usuario) {  
        $.ajax({
            url: '<?=site_url('controller1/c_delete_user')?>',
            data: {'id_usuario':id_usuario,'usuario':usuario},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
                if (dato_pop=='User_delete'){
                    alert('Poceso OK');
	                $.notify("Usuario Eliminado Correctamente", "success");
	                listar_usuarios();  
	                hide_Loading();         	 
		    		return;
	            }
	            if (dato_pop=='error_delete'){
	                $.notify("Error al eliminar el usuario!", "error");
	                hide_Loading();            	 
		    		return;
	            }
            //listar_roles()    
            hide_Loading(); 
            } 
        }); 
  } 

/*Fin Usuarios */

/*Inicio Automatizaciones */

function listar_automatizaciones() {    
    $.ajax({
        url: '<?=site_url('controller1/c_listar_automatizaciones')?>',
        //data: {'Automatizaciones':Automatizaciones},
        type: "post",
        beforeSend: show_Loading(),
        dataType: "html",
        success: function(data){
            $('div#contenido').html(data); 
            $('span#var_i').html("Automatizaciones");  
        hide_Loading();                
        }
    });
}

function auto_listarestaciones(id) {  
        $.ajax({
            url: '<?=site_url('controller1/c_auto_listarestaciones')?>',
            data: {'id':id},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
                $('div#estaciones').html(dato_pop);
            //overlayclickclose_tran();
            hide_Loading(); 
            } 
        }); 
}

function eliminar_automatizaciones(id,nombre) {  
        $.ajax({
            url: '<?=site_url('controller1/lista_elimina_automatizacion')?>',
            data: {'id':id,'nombre':nombre},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
          		$('div#estaciones').html(dato_pop);
            hide_Loading(); 
            } 
        }); 
  }

function recuperar_automatizacion() {  
        $.ajax({
            url: '<?=site_url('controller1/c_recuperar_automatizacion')?>',
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
              $('div#estaciones').html(dato_pop);
            hide_Loading(); 
            } 
        }); 
  }  

function eliminar_automatizacion_bd(id) { 
        $.ajax({
            url: '<?=site_url('controller1/c_delete_automatizacion_bd')?>',
            data: {'id':id},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
                if (dato_pop=='createdelete'){
                    alert('Proceso OK');
	                $.notify("Automatización Eliminado Correctamente", "success");
	                listar_automatizaciones();   
	                hide_Loading();      	 
		    		return;
	            }
	            if (dato_pop=='error'){
	                 $.notify("Error al eliminar la Automatización! Verifique que no tenga estaciones relacionadas", "error");
	                 hide_Loading();             	 
		    		return;
	            }
            //listar_roles()    
            //hide_Loading(); 
            } 
        }); 
  }   

  function update_automatizacion(id,idCliente,nom_autom,ruta,version,tipo,conjunto,Descripcion,nom_cliente) {  
        $.ajax({
            url: '<?=site_url('controller1/c_update_automatizaciones')?>',
            data: {'id':id,'idCliente':idCliente,'nom_autom':nom_autom,'ruta':ruta,'version':version,'tipo':tipo,'conjunto':conjunto,'Descripcion':Descripcion,'nom_cliente':nom_cliente},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
                $('div#estaciones').html(dato_pop);
            //overlayclickclose_tran();
            hide_Loading(); 
            } 
        }); 
  }

  function crear_automatizacion() { 
  		var validate = 'validate';
        $.ajax({
            url: '<?=site_url('controller1/c_update_automatizaciones')?>',
            data: {'validate':validate},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
                $('div#estaciones').html(dato_pop);
            //overlayclickclose_tran();
            hide_Loading(); 
            } 
        }); 
  }

  function update_automatizacion_bd(id) {  	
		var nombre = $('input#nombre').val();
    var client = $('input#cliente').val();
    var cliente = $('select#select_cliente_auto').val();
		var ruta = $('input#ruta').val();
		var version = $('input#version').val();
		var tipo = $('input#tipo').val();
		var conjunto = $('input#conjunto').val();
		var Descripcion = $('textarea#Descripcion').val();


		if (nombre==''){
    	$.notify("El campo nombres es Obligatorio", "warn");
    	return;
  		}

  		if (ruta==''){
    	$.notify("El campo ruta es Obligatorio", "warn");
    	return;
  		}

  		if (version==''){
    	$.notify("El campo version es Obligatorio", "warn");
    	return;
  		}

  		if (tipo==''){
    	$.notify("El campo tipo es Obligatorio", "warn");
    	return;
  		}

  		if (conjunto==''){
    	$.notify("El campo conjunto es Obligatorio", "warn");
    	return;
  		}

  		if (Descripcion==''){
    	$.notify("El campo Descripcion es Obligatorio", "warn");
    	return;
  		}

           //alert(client); 
           //alert(rol); 

        $.ajax({
            url: '<?=site_url('controller1/c_update_automatizaciones_bd')?>',
            data: {'client':client,'id':id,'nombre':nombre,'ruta':ruta,'version':version,'tipo':tipo,'conjunto':conjunto,'Descripcion':Descripcion,'cliente':cliente},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
	            if (dato_pop=='update'){
                    alert('Proceso OK');
	                $.notify("Automatización Actualizada Correctamente", "success");
	                listar_automatizaciones();  
	                hide_Loading();           	 
		    		return;
	            }
	            if (dato_pop=='error'){
	                $.notify("Error al Actualizar el usuario!", "error");
	                hide_Loading();            	 
		    		return;
	            }
	            //listar_usuarios();
            } 
        }); 
}

	function crear_automatizacion_bd(id) {  	
		var nombre = $('input#nombre').val();
		var ruta = $('input#ruta').val();
		var version = $('input#version').val();
		var tipo = $('input#tipo').val();
		var conjunto = $('input#conjunto').val();
		var Descripcion = $('textarea#Descripcion').val();

		if (nombre==''){
    	$.notify("El campo nombres es Obligatorio", "warn");
    	return;
  		}

  		if (ruta==''){
    	$.notify("El campo ruta es Obligatorio", "warn");
    	return;
  		}

  		if (version==''){
    	$.notify("El campo version es Obligatorio", "warn");
    	return;
  		}

  		if (tipo==''){
    	$.notify("El campo tipo es Obligatorio", "warn");
    	return;
  		}

  		if (conjunto==''){
    	$.notify("El campo conjunto es Obligatorio", "warn");
    	return;
  		}

  		if (Descripcion==''){
    	$.notify("El campo Descripcion es Obligatorio", "warn");
    	return;
  		}

           //alert(activo); 
           //alert(rol); 

        $.ajax({
            url: '<?=site_url('controller1/c_create_automatizaciones_bd')?>',
            data: {'id':id,'nombre':nombre,'ruta':ruta,'version':version,'tipo':tipo,'conjunto':conjunto,'Descripcion':Descripcion},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
	            if (dato_pop=='create'){
	                $.notify("Automatización Creada Correctamente", "success");
	                hide_Loading();            	 
		    		return;
	            }
	            if (dato_pop=='error'){
	                $.notify("Error al Crear la automatización!", "error");
	                hide_Loading();            	 
		    		return;
	            }
	            //listar_usuarios();
            } 
        }); 
}

  function eliminar_estaciones(idAutoestacion) {  
        $.ajax({
            url: '<?=site_url('controller1/c_lista_elimina_estacionligada')?>',
            data: {'idAutoestacion':idAutoestacion},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
                if (dato_pop=='delete'){
	                 $.notify("Grupo Retirado Correctamente", "success");
	                 hide_Loading();            	 
		    		return;
	            }
	            if (dato_pop=='error'){
	                $.notify("Error al retirar el grupo!", "error");
	                hide_Loading();            	 
		    		return;
	            }
            //listar_roles()    
            //hide_Loading(); 
            } 
        }); 
  }  

  function relacionar_automatizacion(id,nombre) {
        $.ajax({
            url: '<?=site_url('controller1/c_relacionar_automatizacion')?>',
            data: {'id':id,'nombre':nombre},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
                $('div#estaciones').html(dato_pop);
            //overlayclickclose_tran();
            hide_Loading(); 
            } 
        }); 
  } 


  function relacionarauto_bd(id) {  	
		var nombre = $('input#nombre').val();
		var grupos = $('select#grupos').val();

  		if (grupos=='' || grupos=='-- Seleccione Estacion --'){
    	$.notify("El campo Estaciones es Obligatorio", "warn");
    	return;
  		}

        $.ajax({
            url: '<?=site_url('controller1/c_relacionar_automatizaciones_bd')?>',
            data: {'id':id,'nombre':nombre,'grupos':grupos},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
	            if (dato_pop=='update'){
                    alert('Proceso OK');
	                $.notify("Automatización relacionada Correctamente", "success");
                    listar_automatizaciones(); 	 
                    hide_Loading(); 
		    		return;
	            }
	            if (dato_pop=='error'){
	                $.notify("Error al relacionar la automatizacion!", "error");           	 
		    		hide_Loading(); 
		    		return;
	            }
	            //listar_usuarios();
            } 
        }); 
}

/*Fin Automatizaciones */

/*Inicio Estaciones */

		function listar_estaciones() {    
		    $.ajax({
		        url: '<?=site_url('controller1/c_listar_estaciones_mod')?>',
		        //data: {'Automatizaciones':Automatizaciones},
		        type: "post",
		        beforeSend: show_Loading(),
		        dataType: "html",
		        success: function(data){
		            $('div#contenido').html(data); 
                $('span#var_i').html("Estaciones"); 
		        hide_Loading();                
		        }
		    });
		}


		function crear_estacion() { 
	        $.ajax({
	            url: '<?=site_url('controller1/c_estaciones_crud')?>',
	            //data: {'validate':validate},
	            type: "post",
	            beforeSend: show_Loading(),
	            dataType: "html",
	            success: function(dato_pop){
	                $('div#pop_estaciones').html(dato_pop);
	            //overlayclickclose_tran();
	            hide_Loading(); 
	            } 
	        }); 
  		}

  		function modificar_estacion() { 
	  		var validate = 'validate';
	        $.ajax({
	            url: '<?=site_url('controller1/c_update_automatizaciones')?>',
	            data: {'validate':validate},
	            type: "post",
	            beforeSend: show_Loading(),
	            dataType: "html",
	            success: function(dato_pop){
	                $('div#pop_estaciones').html(dato_pop);
	            //overlayclickclose_tran();
	            hide_Loading(); 
	            } 
	        }); 
  		}

  	function crear_estacion_bd() {  	
		var nombre = $('input#nombre').val();
		var estacion = $('input#estacion').val();
		var dominio = $('input#dominio').val();
		/*var licencias = $('input#licencias').val();*/

		if (nombre==''){
    	$.notify("El campo nombre es Obligatorio", "warn");
    	return;
  		}

  		if (estacion==''){
    	$.notify("El campo estacion es Obligatorio", "warn");
    	return;
  		}

  		if (dominio==''){
    	$.notify("El campo dominio es Obligatorio", "warn");
    	return;
  		}

  		/*if (licencias==''){
    	$.notify("El campo licencias es Obligatorio", "warn");
    	return;
  		}*/

           //alert(activo); 
           //alert(rol); 

        $.ajax({
            url: '<?=site_url('controller1/c_create_estaciones_bd')?>',
            data: {'nombre':nombre,'estacion':estacion,'dominio':dominio},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
	            if (dato_pop=='create'){
                    alert('Proceso OK');
	                $.notify("Automatización Creada Correctamente", "success");
                    listar_estaciones();
	                hide_Loading();           	 
		    		return;
	            }
	            if (dato_pop=='error'){
	                 $.notify("Error al Crear la automatización!", "error");
	                 hide_Loading();             	 
		    		return;
	            }
	            //listar_usuarios();
            } 
        }); 
}


		function update_estacion(id,nombre,estacion,dominio,licenciasPermitidas,idCliente,cliente,grupo,id_grupo) {  
			var validate = 'validate';
		        $.ajax({
		            url: '<?=site_url('controller1/c_update_estaciones')?>',
		            data: {'id':id,'nombre':nombre,'estacion':estacion,'dominio':dominio,'licenciasPermitidas':licenciasPermitidas,'validate':validate,'idCliente':idCliente,'cliente':cliente,'grupo':grupo,'id_grupo':id_grupo},
		            type: "post",
		            beforeSend: show_Loading(),
		            dataType: "html",
		            success: function(dato_pop){
		                $('div#pop_estaciones').html(dato_pop);
		            hide_Loading(); 
		            } 
		        }); 
		}

		function update_estaciones_bd(id,idCliente,id_grupo) {  	
				var nombre = $('input#nombre').val();
				var estacion = $('input#estacion').val();
				var dominio = $('input#dominio').val();
				var cliente = $('input#cliente').val();
        var select_cliente = $('select#select_cliente').val();
        var grupo = $('input#grupo').val();
        var select_grupo = $('select#select_grupo').val();				

				if (grupo=='' && select_grupo=='-- Seleccione Grupo --'){
          $.notify("El Campo grupo es obligatorio", "warn");
          return;
        }

        if (cliente=='' && select_cliente=='-- Seleccione Cliente --'){
				  $.notify("El Campo cliente es obligatorio", "warn");
				  return;
				}

				if (nombre==''){
		    	$.notify("El campo nombres es Obligatorio", "warn");
		    	return;
		  		}

		  		if (estacion==''){
		    	$.notify("El campo estacion es Obligatorio", "warn");
		    	return;
		  		}

		  		if (dominio==''){
		    	$.notify("El campo dominio es Obligatorio", "warn");
		    	return;
		  		}

		           //alert(activo); 
		           //alert(rol); 

		        $.ajax({
		            url: '<?=site_url('controller1/c_update_estaciones_bd')?>',
		            data: {'id':id,'nombre':nombre,'estacion':estacion,'dominio':dominio,'grupo':grupo,'select_grupo':select_grupo,'cliente':cliente,'select_cliente':select_cliente,'idCliente':idCliente,'id_grupo':id_grupo},
		            type: "post",
		            beforeSend: show_Loading(),
		            dataType: "html",
		            success: function(dato_pop){
			           if (dato_pop=='update'){
                        	alert('Proceso OK');
			              	$.notify("Estación Actualizada Correctamente", "success");
                        	listar_estaciones();
			                hide_Loading();             	 
				    		return;
			            }
			            if (dato_pop=='error'){
			                 $.notify("Error al Actualizar la Estación!", "error");
			                 hideLoading();            	 
				    		return;
			            }
			            //listar_usuarios();
		            } 
		        }); 
		}

		function eliminar_estacion(id,nombre) {  
		        $.ajax({
		            url: '<?=site_url('controller1/c_lista_elimina_estacion')?>',
		            data: {'id':id,'nombre':nombre},
		            type: "post",
		            beforeSend: show_Loading(),
		            dataType: "html",
		            success: function(dato_pop){
		                $('div#pop_estaciones').html(dato_pop);
		            hide_Loading(); 
		            } 
		        }); 
		}

		function eliminar_estacion_bd(id) {  
		        $.ajax({
		            url: '<?=site_url('controller1/c_delete_estacion_bd')?>',
		            data: {'id':id},
		            type: "post",
		            beforeSend: show_Loading(),
		            dataType: "html",
		            success: function(dato_pop){
		            if (dato_pop=='delete'){
                   	 alert('Proceso OK');
		                 $.notify("Estación Eliminada Correctamente", "success");
	                	 listar_estaciones();
		                 hide_Loading();            	 
			    		 return;
			            }
			         if (dato_pop=='errordelete'){
			             $.notify("Error al eliminar la estación!", "error");
			             hide_Loading();            	 
				    	 return;
			            }
               if (dato_pop=='grupoconestaciones'){
                   $.notify("La estación no se puede eliminar porque aún tiene asignado el grupo!", "warn");
                   hide_Loading();            
               return;
                  }
		            //listar_roles()    
		            hide_Loading(); 
		            } 
		        }); 
  }


  function agrupar_estacion(adjuntar) { 
    $.ajax({
        url: '<?=site_url('controller1/c_agrupar_estaciones_pop')?>',
        data: {'adjuntar':adjuntar},
        type: "post",
        beforeSend: show_Loading(),
        dataType: "html",
        success: function(dato_pop){
            $('div#pop_estaciones').html(dato_pop);
        //overlayclickclose_tran();
        hide_Loading(); 
        } 
    }); 
}


 function agrupar_estaciones_bd() {    
    var grupo = $('select#grupos').val();
    var estaciones = $('select#estaciones').val();

    if (grupo=='-- Seleccione Grupo --'){
      $.notify("El campo Grupo es Obligatorio", "warn");
      return;
      }

      if (estaciones==''){
      $.notify("El campo Estaciones es Obligatorio", "warn");
      return;
      }

        $.ajax({
            url: '<?=site_url('controller1/c_agrupar_estaciones_bd')?>',
            data: {'grupo':grupo,'estaciones':estaciones},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
              if (dato_pop=='update'){
                   alert('Proceso OK');
                   $.notify("Grupo Actualizado Correctamente", "success");
                   listar_estaciones();
                   hide_Loading();              
            return;
              }
              if (dato_pop=='error'){
                  $.notify("Error al Actualizar el Grupo!", "error");
                  hide_Loading();             
            return;
              }
              //listar_usuarios();
            } 
        }); 
}

function recuperar_automatizacion_bd() {    
    var auto_res = $('select#auto_res').val();
    
    if (auto_res==''){
      $.notify("El campo Automatización es Obligatorio", "warn");
      return;
      }
        $.ajax({
            url: '<?=site_url('controller1/c_recuperar_automatizacion_bd')?>',
            data: {'auto_res':auto_res},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
              if (dato_pop=='ok'){
                   alert('Proceso OK');
                   $.notify("Automatizaciones recuperadas con exito ", "success");
                   listar_automatizaciones();
                   hide_Loading();              
            return;
              }
              if (dato_pop=='error'){
                  $.notify("Error al recuperar la automatización!", "error");
                  hide_Loading();             
            return;
              }
              //listar_usuarios();
            } 
        }); 
}

function crear_grupo(new_grupo) { 
          $.ajax({
              url: '<?=site_url('controller1/c_estaciones_crud')?>',
              data: {'new_grupo':new_grupo},
              type: "post",
              beforeSend: show_Loading(),
              dataType: "html",
              success: function(dato_pop){
                  $('div#pop_estaciones').html(dato_pop);
              //overlayclickclose_tran();
              hide_Loading(); 
              } 
          }); 
      }

function crear_grupo_bd() {    
    var grupo = $('input#grupo').val();

    if (grupo==''){
      $.notify("El campo grupo es Obligatorio", "warn");
      return;
      }

        $.ajax({
            url: '<?=site_url('controller1/c_create_grupos_bd')?>',
            data: {'grupo':grupo},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
              if (dato_pop=='create'){
                    alert('Proceso OK');
                    $.notify("Grupo Creado Correctamente", "success");
                    listar_estaciones();
                    hide_Loading();              
            return;
              }
              if (dato_pop=='error'){
                    $.notify("Error al Crear el Grupo!", "error");
                    hide_Loading();              
            return;
              }
              //listar_usuarios();
            } 
        }); 
}

function auto_listarestaciones_grupo(id_grupo_) {  
        $.ajax({
            url: '<?=site_url('controller1/c_auto_listarestacionesgrupo')?>',
            data: {'id_grupo_':id_grupo_},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
                $('div#pop_estaciones').html(dato_pop);
            //overlayclickclose_tran();
            hide_Loading(); 
            } 
        }); 
}

function eliminar_estacionesgrupo(id) {  
        $.ajax({
            url: '<?=site_url('controller1/c_lista_elimina_estaciongrupo')?>',
            data: {'id':id},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
                if (dato_pop=='delete'){
            	alert('Proceso OK');
                $.notify("Estación eliminada Correctamente", "success");
                listar_estaciones();
                hide_Loading();              
        		return;
              	}
                if (dato_pop=='error'){
                alert('Proceso OK');
                $.notify("Error al eliminar la estación!", "error");
                hide_Loading();              
                return;
                }
            //listar_roles()    
            hide_Loading(); 
            } 
        }); 
  } 

function eliminar_grupo(id_grupo_,grupo) {  
          $.ajax({
              url: '<?=site_url('controller1/c_lista_elimina_grupo')?>',
              data: {'id_grupo_':id_grupo_,'grupo':grupo},
              type: "post",
              beforeSend: show_Loading(),
              dataType: "html",
              success: function(dato_pop){
                  $('div#pop_estaciones').html(dato_pop);
              hide_Loading(); 
              } 
          }); 
  }  


  function eliminar_grupo_bd(id_grupo) {  
            $.ajax({
                url: '<?=site_url('controller1/c_delete_grupo_bd')?>',
                data: {'id_grupo':id_grupo},
                type: "post",
                beforeSend: show_Loading(),
                dataType: "html",
                success: function(dato_pop){
                if (dato_pop=='delete'){
                    alert('Proceso OK');
                    $.notify("Grupo Eliminado Correctamente", "success");
                    listar_estaciones();   
                    hide_Loading();       
                return;
                  }
                if (dato_pop=='errordelete'){
                       $.notify("Error al eliminar el grupo!", "error");
                       hide_Loading();              
                return;
                  }
                if (dato_pop=='grupoconestaciones'){
                       $.notify("Error, el grupo aún tiene estaciones asignadas! primero debe eliminarlas", "warn");
                       hide_Loading();              
                return;
                  }
                //listar_roles()    
                hide_Loading(); 
                } 
            }); 
  }

  function update_grupo(id_grupo_,grupo,cliente,id_cliente) {  
            $.ajax({
                url: '<?=site_url('controller1/c_update_grupo')?>',
                data: {'id_grupo_':id_grupo_,'grupo':grupo,'cliente':cliente,'id_cliente':id_cliente},
                type: "post",
                beforeSend: show_Loading(),
                dataType: "html",
                success: function(dato_pop){
                    $('div#pop_estaciones').html(dato_pop);
                //overlayclickclose_tran();
                hide_Loading(); 
                } 
            }); 
    }

  function modificar_grupo(id_grupo,cliente,id_cliente) { 
      var grupo = 			$('input#grupo').val();
      var select_cliente =  $('select#select_cliente').val();

      if (cliente=='' && select_cliente=='-- Seleccione Cliente --'){
	    $.notify("El Campo cliente es obligatorio", "warn");
	    return;
	  }

        $.ajax({
            url: '<?=site_url('controller1/c_update_grupo_bd')?>',
            data: {'grupo':grupo,'id_grupo':id_grupo,'cliente':cliente,'select_cliente':select_cliente,'id_cliente':id_cliente},
            type: "post",
            beforeSend: show_Loading(),
            dataType: "html",
            success: function(dato_pop){
            if (dato_pop=='update'){
                alert('Proceso OK');
                $.notify("Grupo actualizado correctamente", "success");
                listar_estaciones();
                hide_Loading();            
            return;
              }
            if (dato_pop=='errorupdate'){
                $.notify("Error al actualizar el grupo!", "error");
                hide_Loading();             
            return;
              }
            //listar_roles()    
            hide_Loading(); 
            }  
        }); 
    }

/*Fin Estaciones */


  function pop_cambiarclave() {   
      $.ajax({
          url: '<?=site_url('controller1/c_pop_cambiar_clave')?>',
          //data: {'Usuarios':Usuarios},
          type: "post",
          beforeSend: show_Loading(),
          dataType: "html",
          success: function(data){
              $('div#cambiarClave').html(data); 
          hide_Loading();                
          }
      });
  }


  function enviarcambiarclave() {  
    var password =            $('input#password').val();
    var n_password =          $('input#n_password').val();
    var conf_password =       $('input#conf_password').val(); 
    
    if (n_password == conf_password) {
      if (password != n_password) {

      $.ajax({
          url: '<?=site_url('controller1/c_enviarcambiarclave')?>',
          data: {'conf_password':conf_password,'password':password},
          type: "post",
          beforeSend: show_Loading(),
          dataType: "html",
          success: function(dato_pop){
              if (dato_pop=='noexiste'){
                $.notify("Error! Clave no existe!", "error");
                hide_Loading();             
                return;                
              }
              if (dato_pop=='error_update'){
                $.notify("Error al atualizar la Clave!", "error");
                hide_Loading();             
                return;               
              }
              if (dato_pop=='clave_update'){
                $.notify("Clave actualizada correctamente!", "success");
                hide_Loading();             
                return;               
              }
          hide_Loading();  
          }   
      });
      }
      else {
        alert("La clave nueva debe ser diferente a la actual !") 
      }
    }
    else {
      alert("La confirmación de clave debe ser iguales !")
    }
  } 

</script>


	<body>
		<section class="body">
			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="#" class="logo" onclick="recargar_pagina();">
						<img src="<?=base_url()?>img/logo.png" width="75" height="35" alt="Porto Admin" />            
					</a>
          <div id="loading" class="card-body" data-loading-overlay data-loading-overlay-options='{ "startShowing": true }' style="display:none;min-height:30px;"></div>
					<div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					<!--<form action="pages-search-results.html" class="search nav-form">
						<div class="input-group input-search">
							<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</form>
			
					<span class="separator"></span>-->
			
					<!--<ul class="notifications">
						<li>
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								<i class="fa fa-bell"></i>
								<span class="badge">3</span>
							</a>
			
							<div class="dropdown-menu notification-menu">
								<div class="notification-title">
									<span class="float-right badge badge-default">3</span>
									Tickets
								</div>
			
								<div class="content">
									<ul>
										<li>
											<a href="#" class="clearfix">
												<div class="image">
													<i class="fa fa-tag"></i>
												</div>
												<span class="title">Server is Down!</span>
												<span class="message">Tipo 1</span>
											</a>
										</li>
										<li>
											<a href="#" class="clearfix">
												<div class="image">
													<i class="fa fa-tag"></i>
												</div>
												<span class="title">User Locked</span>
												<span class="message">Tipo 2</span>
											</a>
										</li>
										<li>
											<a href="#" class="clearfix">
												<div class="image">
													<i class="fa fa-tag"></i>
												</div>
												<span class="title">Connection Restaured</span>
												<span class="message">Tipo 3/span>
											</a>
										</li>
									</ul>
			
									<hr />
			
									<div class="text-right">
										<a href="#" class="view-more">View All</a>
									</div>
								</div>
							</div>
						</li>
					</ul>	-->			
					&nbsp;
					<!--<ul class="notifications">
						<li>
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								<i class="fa fa fa-group"></i>
								<span class="badge">3</span>
							</a>
			
							<div class="dropdown-menu notification-menu">
								<div class="notification-title">
									<span class="float-right badge badge-default">3</span>
									Usuarios Nuevos
								</div>
			
								<div class="content">
									<ul>
										<li>
											<a href="#" class="clearfix">
												<div class="image">
													<i class="fa fa-user"></i>
												</div>
												<span class="title">Server is Down!</span>
												<span class="message">Tipo 1</span>
											</a>
										</li>
										<li>
											<a href="#" class="clearfix">
												<div class="image">
													<i class="fa fa-user"></i>
												</div>
												<span class="title">User Locked</span>
												<span class="message">Tipo 2</span>
											</a>
										</li>
										<li>
											<a href="#" class="clearfix">
												<div class="image">
													<i class="fa fa-user"></i>
												</div>
												<span class="title">Connection Restaured</span>
												<span class="message">Tipo 3/span>
											</a>
										</li>
									</ul>
			
									<hr />
			
									<div class="text-right">
										<a href="#" class="view-more">View All</a>
									</div>
								</div>
							</div>
						</li>
					</ul>-->

					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="<?=base_url()?>img/usuario.jpg" alt="Joseph Doe" class="rounded-circle" data-lock-picture="<?=base_url()?>img/!logged-user.jpg" />
							</figure>
							<div class="profile-info">
								<span class="name"><?php echo $_SESSION['nombres'];?></span>
								<span class="role"><?php echo $_SESSION['rol'];?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled mb-2">
								<li class="divider"></li>
								<!--<li>
									<a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> My Profile</a>
								</li>-->
								<li>
									<a role="menuitem" href="#" data-toggle="modal" data-target="#dialog_update" onclick="pop_cambiarclave();"><i class="fa fa-lock"></i> Cambiar Clave</a>
								</li>
								<li>
									<a href="<?=site_url('seguridad/logout')?>" role="menuitem" tabindex="-1" href="pages-signin.html"><i class="fa fa-power-off"></i> Salir</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
				    <div class="sidebar-header">
				        <div class="sidebar-title">
				            Módulos
				        </div>
				        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
				            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
				        </div>
				    </div>
				
				    <div class="nano">
				        <div class="nano-content">
				            <nav id="menu" class="nav-main" role="navigation">
				            
				                <ul class="nav nav-main">
				                    <li class="nav-active">
				                        <a class="nav-link" href="#" id="miboton" onclick="recargar_pagina();">
				                            <i class="fa fa-home" aria-hidden="true"></i>
				                            <span id="miboton" >Inicio</span>
				                        </a>                        
				                    </li>
                            <li class="nav-parent nav-expanded nav-active">
                                <a class="nav-link" href="#" onclick="listar_clientes()">
                                    <i class="fa fa-user-secret" aria-hidden="true"></i>
                                    <span>Clientes</span>
                                </a>
                                <!--<ul class="nav nav-children">
                                    <li>
                                        <a class="nav-link" onclick="listar_clientes()">Administrar</a>
                                    </li>
                                </ul>-->
                            </li>
				                    <li class="nav-parent nav-expanded nav-active">
				                        <a class="nav-link" href="#" onclick="listar_usuarios()">
				                            <i class="fa fa-group" aria-hidden="true"></i>
				                            <span>Usuarios</span>
				                        </a>
				                        <!--<ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" onclick="listar_usuarios()">Administrar</a>
				                            </li>
				                        </ul>-->
				                    </li>
				                    <li class="nav-parent nav-expanded nav-active">
				                        <a class="nav-link" href="#" onclick="listar_automatizaciones()">
				                            <i class="fa fa-cubes" aria-hidden="true"></i>
				                            <span>Automatizaciones</span>
				                        </a>
				                        <!--<ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" onclick="">Recuperar Automatizaciones</a>
				                            </li>
				                        </ul>-->
				                    </li>
				                    <li class="nav-parent nav-expanded nav-active">
				                        <a class="nav-link" href="#" onclick="listar_estaciones()">
				                            <i class="fa fa-laptop" aria-hidden="true"></i>
				                            <span>Estaciones</span>
				                        </a>
				                        <!--<ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" onclick="listar_estaciones()">Administrar</a>
				                            </li>
				                        </ul>-->
				                    </li>
				                    <!--<li class="nav-parent nav-expanded nav-active">
				                        <a class="nav-link" href="#">
				                            <i class="fa fa-dashboard" aria-hidden="true"></i>
				                            <span>Reportes</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" >Por usuario</a>
				                                <a class="nav-link" >Por automatizaciones</a>
				                            </li>
				                        </ul>
				                    </li>-->
				                    <!--<li class="nav-parent nav-expanded nav-active">
				                        <a class="nav-link" href="#">
				                            <i class="fa fa-gears " aria-hidden="true"></i>
				                            <span>Cuenta</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" >Usuario</a>
				                                <a class="nav-link" >Licencia</a>
				                                <a class="nav-link" >Renovar</a>
				                            </li>
				                        </ul>
				                    </li>-->
				                    <!--<li class="nav-parent nav-expanded nav-active">
				                        <a class="nav-link" href="#">
				                            <i class="fa fa-info-circle" aria-hidden="true"></i>
				                            <span>Soporte</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" >Generar Ticket</a>
				                                <a class="nav-link" >Seguimiento</a>
				                            </li>
				                        </ul>
				                    </li>-->
				                </ul>
				            </nav>
							
							<!--
				            <hr class="separator" />
				
				            <div class="sidebar-widget widget-tasks">
				                <div class="widget-header">
				                    <h6>contenidos</h6>
				                    <div class="widget-toggle">+</div>
				                </div>
				                <div class="widget-content">
				                    <ul class="list-unstyled m-0">
				                        <li><a href="#"></a></li>
				                        <li><a href="#"></a></li>
				                        <li><a href="#"></a></li>
				                    </ul>
				                </div>
				            </div>
						
				            <hr class="separator" />
				        	-->
				
				            <!--<div class="sidebar-widget widget-stats">
				                <div class="widget-header">
				                    <h6>Contenido 2</h6>
				                    <div class="widget-toggle">+</div>
				                </div>
				                <div class="widget-content">
				                    <ul>
				                        <li>
				                            <span class="stats-title">Stat 1</span>
				                            <span class="stats-complete">85%</span>
				                            <div class="progress">
				                                <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
				                                    <span class="sr-only">85% Complete</span>
				                                </div>
				                            </div>
				                        </li>
				                        <li>
				                            <span class="stats-title">Stat 2</span>
				                            <span class="stats-complete">70%</span>
				                            <div class="progress">
				                                <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
				                                    <span class="sr-only">70% Complete</span>
				                                </div>
				                            </div>
				                        </li>
				                        <li>
				                            <span class="stats-title">Stat 3</span>
				                            <span class="stats-complete">2%</span>
				                            <div class="progress">
				                                <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
				                                    <span class="sr-only">2% Complete</span>
				                                </div>
				                            </div>
				                        </li>
				                    </ul>
				                </div>
				            </div>-->
				        </div>
					
				        <script>
				            // Maintain Scroll Position
				            if (typeof localStorage !== 'undefined') {
				                if (localStorage.getItem('sidebar-left-position') !== null) {
				                    var initialPosition = localStorage.getItem('sidebar-left-position'),
				                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');
				                    
				                    sidebarLeft.scrollTop = initialPosition;
				                }
				            }
				        </script>
				        
				
				    </div>
				
				</aside>
				<!-- end: sidebar -->
				<section role="main" class="content-body">					
          <header class="page-header">
            <div class="right-wrapper text-left">
              <ol class="breadcrumbs">               
                <li style="padding-left:20px;"><i class="fa fa-home"></i>&nbsp;<span><a href="#" onclick="recargar_pagina();"> Inicio</a></span></li>
                <li><i class="fa fa-cubes"></i>&nbsp;<span id="var_i"></span></li>
              </ol>
            </div>
          </header>

					<div class="row" id="contenido">							

						<div class="col-lg-12 col-xl-12">
							<div class="row">
								<div class="col-md-12">
					
									<section class="card-group mb-3 mb-4">
										<div class="widget-twitter-profile">
											<div class="top-image">
												<img src="img/widget-twitter-profile.jpg" alt="">
											</div>
											<div class="profile-info">
												<div class="profile-picture">
													<img src="<?=base_url()?>img/usuario.jpg" alt="">
												</div>
												<div class="profile-account">
													<h3 class="name font-weight-semibold"><?php echo $_SESSION['nombres'];?></h3>
													<a href="#" class="account"><?php echo $_SESSION['usuario'];?></a>-
													<a href="#" class="account"><?php echo $_SESSION['rol'];?></a><br>
                        							<span class="role"><?php echo $_SESSION['cliente'];?></span>
												</div>
												<!--<ul class="profile-stats">
													<li>
														<h5 class="stat text-uppercase">Usuarios Activos</h5>
														<h4 class="count">60</h4>
													</li>
													<li>
														<h5 class="stat text-uppercase">Inactivos</h5>
														<h4 class="count">139</h4>
													</li>
												</ul>-->
											</div>
											<div class="profile-quote">
												<blockquote>
													<p>
														Bienvenido al administrador de Bionikron en donde podrás parametrizar y relacionar tus automatizaciones con tus estaciones.
													</p>
												</blockquote>
												<!--<div class="quote-footer"></div>-->
											</div>
										</div>
									</section>

								</div>
							</div>
						</div>

						<!-- -->
	
<div class="col-lg-12">	
<div class="row">					
      <div class="col-lg-6 col-xl-3"> 
        <section class="card card-featured-left card-featured-primary mb-4">
          <div class="card-body">
            <div class="widget-summary widget-summary-sm">
              <div class="widget-summary-col widget-summary-col-icon">
                <a href="#" onclick="listar_clientes();">
	                <div class="summary-icon bg-primary">
	                  <i class="fa fa-user-secret"></i>
	                </div>
                </a>
              </div>
              <div class="widget-summary-col">
                <div class="summary">
                  <h4 class="title"><a href="#" onclick="listar_clientes();">Clientes</a></h4>
                  <!--<div class="info">
                    <strong class="amount">1281</strong>
                    <span class="text-primary">(14 unread)</span>
                  </div>-->
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
				
 
		<div class="col-lg-6 col-xl-3">	
			<section class="card card-featured-left card-featured-primary mb-4">
				<div class="card-body">
					<div class="widget-summary widget-summary-sm">
						<div class="widget-summary-col widget-summary-col-icon">
						<a href="#" onclick="listar_usuarios();">	
							<div class="summary-icon bg-primary">
								<i class="fa fa fa-group"></i>
							</div>
						</a>
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title"><a href="#" onclick="listar_usuarios();">Usuarios</a></h4>
							</div>
						</div>
					</div>
				</div>
				<!--<div class="card-footer card-footer-btn-group">
					<a href="#"><i class="fa fa-user-plus"></i> Crear</a>
					<a href="#"><i class="fa fa-pencil-square-o"></i> Modificar</a>
					<a href="#"><i class="fa fa-eye"></i> Todas</a>
				</div>-->
			</section>
		</div>

		<div class="col-lg-6 col-xl-3">	
			<section class="card card-featured-left card-featured-primary mb-4">
				<div class="card-body">
					<div class="widget-summary widget-summary-sm">
						<div class="widget-summary-col widget-summary-col-icon">
						<a href="#" onclick="listar_automatizaciones();">		
							<div class="summary-icon bg-primary">
								<i class="fa fa fa-cubes"></i>
							</div>
						</a>	
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title"><a href="#" onclick="listar_automatizaciones();">Automatizaciones</a></h4>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

	<div class="col-lg-6 col-xl-3">	
		<section class="card card-featured-left card-featured-primary mb-4">
			<div class="card-body">
				<div class="widget-summary widget-summary-sm">
					<div class="widget-summary-col widget-summary-col-icon">
					<a href="#" onclick="listar_estaciones();">	
						<div class="summary-icon bg-primary">
							<i class="fa fa-laptop"></i>
						</div>
					</a>	
					</div>
					<div class="widget-summary-col">
						<div class="summary">
							<h4 class="title"><a href="#" onclick="listar_estaciones();">Estaciones</a></h4>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
</div>	
</div>	
<!-- end: page -->
</section>


	
			<!--	
			<aside id="sidebar-right" class="sidebar-right">
				<div class="nano">
					<div class="nano-content">
						<a href="#" class="mobile-close d-md-none">
							Collapse <i class="fa fa-chevron-right"></i>
						</a>
			
						<div class="sidebar-right-wrapper">
			
							<div class="sidebar-widget widget-calendar">
								<h6>Upcoming Tasks</h6>
								<div data-plugin-datepicker data-plugin-skin="dark"></div>
			
								<ul>
									<li>
										<time datetime="2017-04-19T00:00+00:00">04/19/2017</time>
										<span>Company Meeting</span>
									</li>
								</ul>
							</div>
			
							<div class="sidebar-widget widget-friends">
								
							</div>
			
						</div>
					</div>
				</div>
			</aside>
		-->

     <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="dialog_update">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
              <h4 class="modal-title">Cambiar Clave</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="container-fluid">
                <br>

                <div id="cambiarClave"></div>

           </div>
          </div>
      </div>
    </div>


		</section>

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
		
		<!-- Specific Page Vendor -->
		<script src="<?=base_url()?>vendor/jquery-ui/jquery-ui.js"></script>
		<script src="<?=base_url()?>vendor/jqueryui-touch-punch/jqueryui-touch-punch.js"></script>
		<script src="<?=base_url()?>vendor/jquery-appear/jquery-appear.js"></script>
		<script src="<?=base_url()?>vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="<?=base_url()?>vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
		<script src="<?=base_url()?>vendor/flot/jquery.flot.js"></script>
		<script src="<?=base_url()?>vendor/flot.tooltip/flot.tooltip.js"></script>
		<script src="<?=base_url()?>vendor/flot/jquery.flot.pie.js"></script>
		<script src="<?=base_url()?>vendor/flot/jquery.flot.categories.js"></script>
		<script src="<?=base_url()?>vendor/flot/jquery.flot.resize.js"></script>
		<script src="<?=base_url()?>vendor/jquery-sparkline/jquery-sparkline.js"></script>
		<script src="<?=base_url()?>vendor/raphael/raphael.js"></script>
		<script src="<?=base_url()?>vendor/morris/morris.js"></script>
		<script src="<?=base_url()?>vendor/gauge/gauge.js"></script>
		<script src="<?=base_url()?>vendor/snap.svg/snap.svg.js"></script>
		<script src="<?=base_url()?>vendor/liquid-meter/liquid.meter.js"></script>
		<script src="<?=base_url()?>vendor/jqvmap/jquery.vmap.js"></script>
		<script src="<?=base_url()?>vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
		<script src="<?=base_url()?>vendor/jqvmap/maps/jquery.vmap.world.js"></script>
		<script src="<?=base_url()?>vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
		<script src="<?=base_url()?>vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
		<script src="<?=base_url()?>vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
		<script src="<?=base_url()?>vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
		<script src="<?=base_url()?>vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
		<script src="<?=base_url()?>vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>
		<script src="<?=base_url()?>vendor/bootstrap-timepicker/bootstrap-timepicker.js"></script>

		<!-- Specific Page Vendor -->
		<script src="<?=base_url()?>vendor/select2/js/select2.js"></script>
		<script src="<?=base_url()?>vendor/datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="<?=base_url()?>vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>

		<!-- Specific Page Vendor -->
		<script src="<?=base_url()?>vendor/select2/js/select2.js"></script>
		<script src="<?=base_url()?>vendor/datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="<?=base_url()?>vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>
		<script src="<?=base_url()?>vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js"></script>
		<script src="<?=base_url()?>vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js"></script>
		<script src="<?=base_url()?>vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js"></script>
		<script src="<?=base_url()?>vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js"></script>
		<script src="<?=base_url()?>vendor/datatables/extras/TableTools/JSZip-2.5.0//jszip.min.js"></script>
		<script src="<?=base_url()?>vendor/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js"></script>
		<script src="<?=base_url()?>vendor/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js"></script>
		

		
		<!-- Theme Base, Components and Settings -->
		<script src="<?=base_url()?>js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?=base_url()?>js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?=base_url()?>js/theme.init.js"></script>

		<!-- wizard -->
		<script src="<?=base_url()?>js/examples/examples.wizard.js"></script>


		<!-- Examples -->
		<script src="<?=base_url()?>js/examples/examples.dashboard.js"></script>
		<!-- notify -->
		<script src="<?=base_url()?>vendor/notify/notify.js"></script>

		<script src="<?=base_url()?>js/examples/examples.advanced.form.js"></script>

		<script src="<?=base_url()?>js/examples/examples.datatables.editable.js"></script>

	</body>
</html>