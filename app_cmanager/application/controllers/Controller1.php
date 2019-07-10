<?php
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller1 extends CI_Controller {

	function __construct(){ 
        parent::__construct(); 
        $this->load->model('Model_1'); 
        //Validar logueo               
        $CI =& get_instance();
        $usuario = $CI->session->userdata('usuario');
        //print_r($usuario);die();
        if(isset($usuario)=="") {
        	$CI->load->view('seguridad/v_login_redirect', array('url'=>site_url('seguridad/index')));
        }        
        //Fin validar Logueo
    }	

    public function index()	{
		//$this->load->view('incluidos/head');
		$this->load->view('v_principal');
		//$this->load->view('incluidos/footer');
	}


/*inicio clientes*/

function c_listar_clientes(){ 
    $cliente                    = $_SESSION['cliente'];
    $rol                        = $_SESSION['rol']; 
    $consulta_clientes          = $this->Model_1->m_listar_clientes($cliente,$rol);
    $consulta_clientes_vol      = $this->Model_1->m_listar_clientes_vol($cliente,$rol);
    $consulta_clientes_act      = $this->Model_1->m_listar_clientes_act($cliente,$rol);

    $data['clientes_vol']       = $consulta_clientes_vol;
    $data['clientes']           = $consulta_clientes;
    $data['vol_activ']          = $consulta_clientes_act;

    $this->load->view('v_lista_clientes',$data);
}

function c_listar_ip(){ 	
	$id_clientes = $this->input->post('id_clientes'); 
    $cliente                    = $_SESSION['cliente'];
    $rol                        = $_SESSION['rol']; 

    if (!isset($id_clientes)) {
    	$consulta_ip         		= $this->Model_1->m_listar_ip($cliente,$rol);
    } else {
    	$consulta_ip         		= $this->Model_1->m_listar_ip_2($cliente,$rol,$id_clientes);
    }
    
    $data['ip']          		= $consulta_ip;

    $this->load->view('v_lista_clientes_ip',$data);
}

function c_insert_clientes() {
    $activo = $this->input->post('activo');   

    if ($activo == "Y") {
            $validate = 'ios-switch on';
            $nom_validate = 'Activo';
        } else {
            $validate = 'ios-switch off';
            $nom_validate = 'Inactivo';
        }     

    $data['validate'] = $validate;
    $data['nom_validate'] = $nom_validate;
    $data['activo'] = $activo;

    $this->load->view('pop_crear_cliente',$data);  

}

  function c_insert_cliente_bd() {
        $cliente =            $this->input->post('cliente');
        $actividad =          $this->input->post('actividad');
        $licencias =          $this->input->post('licencias');

        if ($actividad == '-- Seleccione Actividad --'){
            $actividad = 'N';           
           } 

        if ($actividad == 'Activo'){
            $actividad = 'Y';           
           } elseif ($actividad == 'Inactivo') {
            $actividad = 'N'; 
           } 

        $data = array(
            "nombre" =>                     $cliente,
            "activo" =>                     $actividad,
            "nro_licencias_permitidas" =>   $licencias,
        );

        //print_r($data);die();

        if($this->Model_1->m_insertar_clientes_db($data)==true){
            echo "usercreated";
          } else{
            echo "errorcreated";
          }
    }

   function c_update_clientes(){ 
    $nombre = $this->input->post('nombre');
    $activo = $this->input->post('activo');
    $id_clientes = $this->input->post('id_clientes');
    $update_cliente = 'update_cliente';
    $licencias = $this->input->post('nro_licencias_permitidas');    

    if ($activo == "Y") {
            $validate = 'ios-switch on';
            $nom_validate = 'Activo';
        } else {
            $validate = 'ios-switch off';
            $nom_validate = 'Inactivo';
        } 

    //print_r($usuario.'-'.$nombres.'-'.$apellidos.'-'.$email.'-'.$activo.'-'.$rol.'-'.$id_usuario);die();
    $data['validate'] = $validate;
    $data['nom_validate'] = $nom_validate;
    $data['id_clientes'] = $id_clientes;    
    $data['nombre'] = $nombre;
    $data['activo'] = $activo;
    $data['update_cliente'] = $update_cliente;
    $data['licencias'] = $licencias;

    $this->load->view('pop_crear_cliente',$data);
  }

function c_update_ip(){
	$id_ip 			= $this->input->post('id_ip'); 
    $id_cliente 	= $this->input->post('id_cliente');
    $nombre 	    = $this->input->post('nombre');
    $ip 			= $this->input->post('IP');
    $val_ 			= $this->input->post('val_');

    $data['id_ip'] 			= $id_ip;
    $data['id_cliente'] 	= $id_cliente;
    $data['nombre'] 		= $nombre;
    $data['ip'] 			= $ip;  
    $data['val_'] 			= $val_;   

    $this->load->view('pop_admin_ip_cliente',$data);
  }

    function c_update_clientes_bd() {
        $nombre =            $this->input->post('clienteupdate');
        $select_activo =     $this->input->post('select_actividad_update');
        $activo =            $this->input->post('activo');
        $id_clientes =       $this->input->post('id_clientes');
        $licencias =         $this->input->post('licencias');

        if ($select_activo == '-- Seleccione Actividad --'){
            $select_activo = $activo;           
           } 

        if ($select_activo == 'Activo'){
            $select_activo = 'Y';           
           } elseif ($select_activo == 'Inactivo') {
            $select_activo = 'N'; 
           }  
           
        //print_r($rol);die();            
        $data = array(            
            "nombre" =>                     $nombre,
            "activo" =>                     $select_activo,
            "nro_licencias_permitidas" =>   $licencias,
        );
        //print_r($data);die();
        //print_r($id);die();

        if($this->Model_1->m_update_cliente($data,$id_clientes)==true){
            echo "update";
          } else{
            echo "errorupdate";
          }
            
    }




  function elimina_cliente() {
        $id_cliente =    $this->input->post('id_cliente');
        $nombre =       $this->input->post('nombre');

        $data['id_cliente'] =   $id_cliente;
        $data['nombre'] =      $nombre;

        $this->load->view('pop_eliminar_cliente',$data);    
  } 

  function c_delete_cliente() {
        $id_cliente = $this->input->post('id_cliente');  

        $val_clienteligado = $this->Model_1->m_clienteligado($id_cliente);

        foreach ($val_clienteligado as $key => $value) {
      	$val = $value->fre; 
    	}

        if ($val > 0) {
          echo "alert_delete";
        } else if ($val == 0) {

        if($this->Model_1->delete_cliente($id_cliente)==true){
          echo "User_delete";
        } else {
          echo "error_delete";
        }
      	}
      }



/*fin clientes*/

function c_listar_automatizaciones(){ 
    $cliente                    = $_SESSION['cliente'];
    $rol                        = $_SESSION['rol']; 
    $consulta_automatizaciones  = $this->Model_1->m_listar_automatizaciones($cliente,$rol);
    $consulta_auto_vol 		    = $this->Model_1->m_listar_auto_vol($cliente,$rol);
    
    $data['consulta_auto'] = $consulta_auto_vol;
    $data['automatizaciones'] = $consulta_automatizaciones;

    $this->load->view('v_lista_automatizaciones',$data);  

  }

  function c_pop_crear_usuarios(){ 
    $this->load->view('pop_crear_usuario');
  }

  function c_listar_usuarios(){ 
    $cliente                    = $_SESSION['cliente'];
    $rol                        = $_SESSION['rol']; 
   	$consulta_usuarios 	   		= $this->Model_1->m_listar_usuarios($cliente,$rol);
   	$consulta_usuarios_vol 		= $this->Model_1->m_listar_usuarios_vol($cliente,$rol);
    $consulta_usuarios_admin 	= $this->Model_1->m_listar_usuarios_admin($cliente,$rol);

   	$data['usuarios_vol'] 		= $consulta_usuarios_vol;
    $data['usuarios_admin']     = $consulta_usuarios_admin;
    $data['usuarios']     		= $consulta_usuarios;

    $this->load->view('v_lista_usuarios',$data);
    }


  function c_insert_user() {
        $nombres =      	$this->input->post('nombres');
        $apellidos =        $this->input->post('apellidos');
        $cc =    		    $this->input->post('cc');
        $fechaNac =     	$this->input->post('fechaNac');
        $usuario =        	$this->input->post('usuario');
        $password =         $this->input->post('password');
        $email =      		$this->input->post('email');
        $fechacreated =		date("Y-m-d");
        $cliente =          $_SESSION['id_cliente'];
        //print_r($nombres.'-'.$apellidos.'-'.$cc.'-'.$fechaNac.'-'.$usuario.'-'.$password.'-'.$confir_password.'-'.$email);

        /*$data_rol = $this->Model_1->lista_data_cargo($cargo); 
        foreach ($data_cargo as $key => $value) {
          $cargo = $value->idCargo;      
        }*/

        $data = array(
            "id_cliente" =>     $cliente,
            "usuario" =>    	$usuario,
            "clave" =>    		sha1($password),
            "nombres" =>  		$nombres, 
            "apellidos" =>  	$apellidos, 
            "email" =>      	$email, 
            "activo" =>     	"Y", 
            "cc" =>         	$cc, 
            "fecha_nac" =>  	$fechaNac, 
            "fecha_created" =>  $fechacreated, 
        );

        //print_r($data);die();

        if($this->Model_1->m_insertar_usser($data)==true){
            echo "usercreated";
          } else{
            echo "errorcreated";
          }
    }

  function c_update_usuarios(){ 
    $nombre = $this->input->post('cliente');
    $usuario = $this->input->post('usuario');
    $nombres = $this->input->post('nombres');
    $apellidos = $this->input->post('apellidos');
    $email = $this->input->post('email');
    $activo = $this->input->post('activo');
    $rol = $this->input->post('rol');
    $id_usuario = $this->input->post('id_usuario');
    $fecha_nac = $this->input->post('fecha_nac');
    $cc = $this->input->post('cc');


    if ($activo == "Y") {
            $validate = 'ios-switch on';
            $nom_validate = 'Activo';
        } else {
            $validate = 'ios-switch off';
            $nom_validate = 'Inactivo';
        } 

    //print_r($usuario.'-'.$nombres.'-'.$apellidos.'-'.$email.'-'.$activo.'-'.$rol.'-'.$id_usuario);die();

    $data['nombre'] = $nombre;    
    $data['usuario'] = $usuario;
    $data['nombres'] = $nombres;
    $data['apellidos'] = $apellidos;
    $data['email'] = $email;
    $data['activo'] = $activo;
    $data['rol'] = $rol;
    $data['id_usuario'] = $id_usuario;
    $data['fecha_nac'] = $fecha_nac;
    $data['cc'] = $cc;
    $data['validate'] = $validate;
    $data['nom_validate'] = $nom_validate;

    $this->load->view('pop_updateuser',$data);
  }

  function c_listar_roles(){
    $data['select_roles'] = $this->Model_1->m_listarselect_roles();
    $this->load->view('v_select_roles',$data);
  }

  function c_listar_select_clientes(){
    $data['select_clientes'] = $this->Model_1->m_listarselect_clientes();
    $this->load->view('v_select_clientes',$data);
  }

  function c_listar_select_grupo_es(){
    $cliente                    = $_SESSION['cliente'];
    $rol                        = $_SESSION['rol']; 
    $data['select_grupo_e'] = $this->Model_1->m_listarselect_grupo_es($cliente,$rol);
    $this->load->view('v_select_grupo_es',$data);
  }


  function c_update_usuarios_bd() {
        $id_usuario =         $this->input->post('id_usuario'); 
        $rol =                $this->input->post('rol');
        $usuario =            $this->input->post('usuario');
        $nombres =            $this->input->post('nombres');
        $apellidos =          $this->input->post('apellidos');
        $fecha_nac =          $this->input->post('fecha_nac');
        $email =              $this->input->post('email');
        $cedula =             $this->input->post('cedula');
        $activo =             $this->input->post('activo');
        $fechacreated =	      date("Y-m-d");
        $select_clientes =    $this->input->post('select_clientes');
        
        
        if ($rol == '-- Seleccione Rol --' || $rol == '' ) {
			$rol = 4;         	 
	       } else {
		       	$data_rol = $this->Model_1->lista_data_cargo($rol); 
		    	foreach ($data_rol as $key => $value) {
		      	$rol = $value->id_rol; 
		    	}
	       }	

        //print_r($rol);die();
        //print_r($_SESSION['id_cliente']);die();

        if ($select_clientes == '-- Seleccione Cliente --' ) {
            $select_clientes = $_SESSION['id_cliente'];           
           }          

	    if ($activo == '-- Seleccione Actividad --'){
			$activo = 'N';         	 
	       } 

	    if ($activo == 'Activo'){
			$activo = 'Y';         	 
	       } elseif ($activo == 'Inactivo') {
	       	$activo = 'N'; 
	       }  

        $data = array(
            "id_cliente" =>     $select_clientes,
        	"id_rol" =>        	$rol,
            "usuario" =>    	$usuario,
            "nombres" =>    	$nombres,
            "apellidos" =>  	$apellidos, 
            "email" =>      	$email,
            "activo" =>     	$activo,
            "cc" =>         	$cedula,   
            "fecha_nac" =>   	$fecha_nac,            
            "fecha_created" =>  $fechacreated,             
        );

        //print_r($data);
        //print_r($id_usuario);die();

        if($this->Model_1->m_update_usser($data,$id_usuario)==true){
            echo "user_update";
          } else{
            echo "error_update";
          }
    }

function c_insert_ip_cliente() {
        $ip_cliente =      	$this->input->post('ip_cliente');
        $ip =        		$this->input->post('ip');

        $data = array(
            "id_cliente" =>     $ip_cliente,
            "IP" =>    			$ip,
        );

        if($this->Model_1->m_insertar_ip_cliente($data)==true){
            echo "usercreated";
          } else{
            echo "errorcreated";
          }
    }

function c_update_ip_bd() {
        $id_ip =    $this->input->post('id_ip'); 
        $id_cliente =    $this->input->post('id_cliente'); 
        $nombre =        $this->input->post('nombre');
        $ip =            $this->input->post('ip');

        $data = array(
        	"id_cliente" =>     $id_cliente, 
        	"IP" =>        		$ip,           
        );

        if($this->Model_1->m_update_ip($data,$id_ip)==true){
            echo "user_update";
          } else{
            echo "error_update";
          }
    }

function c_delete_ip() {
        $id_ip = $this->input->post('id_ip');        
        if($this->Model_1->delete_ip($id_ip)==true){
          echo "User_delete";
        } else {
          echo "error_delete";
        }
      }  

function lista_elimina_user() {
        $id_usuario =    $this->input->post('id_usuario');
        $usuario =       $this->input->post('usuario');
        $rol =      	 $this->input->post('rol');

        $data['id_usuario'] =   $id_usuario;
        $data['usuario'] =      $usuario;
        $data['rol'] =      	$rol;

        $this->load->view('pop_eliminar_usuario',$data);    
  }  

function c_delete_user() {
        $id_usuario = $this->input->post('id_usuario');        
        if($this->Model_1->delete_users($id_usuario)==true){
          echo "User_delete";
        } else {
          echo "error_delete";
        }
      }

 function c_auto_listarestaciones(){ 
    $id = $this->input->post('id');

    $data_listarestaciones = $this->Model_1->m_listar_estaciones($id);

    //print_r($data_listarestaciones);die();

    $data['lista_estaciones'] = $data_listarestaciones;

    $this->load->view('pop_listar_estaciones',$data);
  }


  function lista_elimina_automatizacion() {
        $id =    	 $this->input->post('id');
        $nombre =    $this->input->post('nombre');

        $data['nombre'] =   $nombre;
        $data['id'] =      $id;

        $this->load->view('pop_eliminar_automatizacion',$data);    
  } 

  function c_recuperar_automatizacion() {
        $this->load->view('pop_recuperar_automatizacion');    
  } 


  function c_delete_automatizacion_bd() {
        $id = $this->input->post('id'); 

        $validate = $this->Model_1->m_validate($id);
    	foreach ($validate as $key => $value) {
      	$val = $value->fre; 
    	}

        if ($val > 0) {
        	echo "error";
        } else if ($val == 0) {

        $cons = $this->Model_1->m_cons($id);    
        
        foreach ($cons as $key => $value) {
        $id_automatizacion =    $value->id_automatizacion;
        $id_flujo =             $value->id_flujo;
        $id_cliente =           $value->id_cliente;
        $nombre =               $value->nombre;
        $ruta =                 $value->ruta;
        $version =              $value->version;
        $tipo =                 $value->tipo;
        $conjunto =             $value->conjunto;
        $Descripcion =          $value->Descripcion; 
        }

        $fecha_delete = date("Y-m-d");

        $data['id_automatizacion']      = $id;
        $data['id_flujo']               = $id_flujo;
        $data['fecha_delete']           = $fecha_delete;
        $data['id_cliente']             = $id_cliente;
        $data['nombre']                 = $nombre;
        $data['ruta']                   = $ruta;
        $data['version']                = $version;
        $data['tipo']                   = $tipo;
        $data['conjunto']               = $conjunto;
        $data['Descripcion']            = $Descripcion;

        if($this->Model_1->m_insertar_recuperacion($data,$id)==true){
            echo "create";
          } else{
            echo "error";
          }   

        $res = $this->Model_1->m_delete_automatizacion_bd($id);       
	        if($res==true){
	          echo "delete";
	        } else {
	          echo "error";
	        }
        }

      }

  function c_update_automatizaciones(){   	
  	$validate = $this->input->post('validate'); 	
    $id = $this->input->post('id');
    $idCliente = $this->input->post('idCliente');
    $nom_autom = $this->input->post('nom_autom');
    $ruta = $this->input->post('ruta');
    $version = $this->input->post('version');
    $tipo = $this->input->post('tipo');
    $conjunto = $this->input->post('conjunto');
    $descripcion = $this->input->post('Descripcion');
    $validate = $this->input->post('validate');
    $nom_cliente = $this->input->post('nom_cliente');
    //print_r($id.'-'.$idCliente.'-'.$nombre.'-'.$ruta.'-'.$version.'-'.$tipo.'-'.$conjunto.'-'.$descripcion);die();

    $data['id'] = $id;
    $data['idCliente'] = $idCliente;
    $data['nom_autom'] = $nom_autom;
    $data['ruta'] = $ruta;
    $data['version'] = $version;
    $data['tipo'] = $tipo;
    $data['conjunto'] = $conjunto;
    $data['descripcion'] = $descripcion;   
    $data['validate'] = $validate; 
    $data['nom_cliente'] = $nom_cliente;

    $this->load->view('pop_updateauto',$data);
  }  

  function c_update_automatizaciones_bd() {
        $id =   			$this->input->post('id'); 
        $client =           $this->input->post('client'); 
        $nombre =           $this->input->post('nombre');
        $ruta =      		$this->input->post('ruta');
        $version =      	$this->input->post('version');
        $tipo =    			$this->input->post('tipo');
        $conjunto =    		$this->input->post('conjunto');
        $descripcion =      $this->input->post('Descripcion');
        $cliente =          $this->input->post('cliente');
        
        if ($cliente == '-- Seleccione Cliente --') {
            $res_client = $this->Model_1->m_buscarcliente($client);
            foreach ($res_client as $key => $value) {
                $val = $value->id_clientes; 
            }
            #print_r($res_client);die();
            $res_cliente = $val;
            }    
        else {
            $res_cliente = $cliente;
        }    

        $data = array(
            "id_cliente" =>     $res_cliente,
        	"nombre" =>        	$nombre,
            "ruta" =>    		$ruta,
            "version" =>    	$version,
            "tipo" =>  			$tipo, 
            "conjunto" =>      	$conjunto,
            "Descripcion" =>    $descripcion,           
        );
        #print_r($data);die();

        if($this->Model_1->m_update_automatizacion($data,$id)==true){
            echo "update";
          } else{
            echo "error";
          }
    }  

  function c_create_automatizaciones_bd() {
        $id =   			$this->input->post('id'); 
        $nombre =           $this->input->post('nombre');
        $ruta =      		$this->input->post('ruta');
        $version =      	$this->input->post('version');
        $tipo =    			$this->input->post('tipo');
        $conjunto =    		$this->input->post('conjunto');
        $descripcion =      $this->input->post('Descripcion');
        //print_r($rol);die();	          
        $data = array(
        	"nombre" =>        	$nombre,
            "ruta" =>    		$ruta,
            "version" =>    	$version,
            "tipo" =>  			$tipo, 
            "conjunto" =>      	$conjunto,
            "Descripcion" =>    $descripcion,           
        );

        if($this->Model_1->m_crear_automatizacion($data,$id)==true){
            echo "create";
          } else{
            echo "error";
          }
    }    


    function c_lista_elimina_estacionligada() {
        $idAutoestacion =    $this->input->post('idAutoestacion');
        $data['idAutoestacion'] =   $idAutoestacion;
        //print_r($idAutoestacion);die();
        
        $res = $this->Model_1->m_delete_estacionligada_bd($idAutoestacion);   

        if($res==true){
          echo "delete";
        } else {
          echo "error";
        }
  }  


  	function c_relacionar_automatizacion(){   	
    $id = $this->input->post('id');
    $nombre = $this->input->post('nombre');
    //print_r($id.'-'.$idCliente.'-'.$nombre.'-'.$ruta.'-'.$version.'-'.$tipo.'-'.$conjunto.'-'.$descripcion);die();

    $data['id'] = $id;
    $data['nombre'] = $nombre;

    $this->load->view('pop_relacionar_automatizacion',$data);
  } 


   function c_listar_estaciones(){
    $cliente                    = $_SESSION['cliente'];
    $rol                        = $_SESSION['rol'];

    $data['select_estaciones'] = $this->Model_1->m_listarselect_grupoestacion($cliente,$rol);
    $this->load->view('v_select_estaciones',$data);
  }

  function c_relacionar_automatizaciones_bd() {
        $id =   			$this->input->post('id'); 
        $nombre =           $this->input->post('nombre');
        $grupos =      	    $this->input->post('grupos');
         
        $data = array(
            "idAutomatizaciones" =>		$id,  
            "idGrupos" =>			    $grupos,          
        );

        //print_r($data);
        //print_r($id);die();

        if($this->Model_1->m_relacionar_estaciones($data)==true){
            echo "update";
          } else{
            echo "error";
          }
    }


    function c_listar_estaciones_mod(){ 
        $cliente                    = $_SESSION['cliente'];
        $rol                        = $_SESSION['rol'];
	    $consulta_estaciones 		= $this->Model_1->m_listar_estaciones_bd($cliente,$rol);
        $consulta_grupos            = $this->Model_1->m_listar_grupos_bd($cliente,$rol);
	    $consulta_estaciones_vol	= $this->Model_1->m_listar_estaciones_vol($cliente,$rol);
        $consulta_grupos_vol        = $this->Model_1->m_listar_grupos_vol($cliente,$rol);
	    
        $data['consulta_grupos'] = $consulta_grupos_vol;
	    $data['consulta_estaciones'] = $consulta_estaciones_vol;	    
	    $data['estaciones'] = $consulta_estaciones;
        $data['grupos'] = $consulta_grupos;

	    $this->load->view('v_estaciones',$data);  

  }


  	function c_estaciones_crud(){   	
	  	$validate = $this->input->post('validate'); 	
        $new_grupo = $this->input->post('new_grupo');
	    //print_r($id.'-'.$idCliente.'-'.$nombre.'-'.$ruta.'-'.$version.'-'.$tipo.'-'.$conjunto.'-'.$descripcion);die();
  
	    $data['validate'] = $validate; 
        $data['new_grupo'] = $new_grupo; 

	    $this->load->view('pop_estacion',$data);
  } 



  	function c_create_estaciones_bd() {
        //$id =   			$this->input->post('id'); 
        $nombre =           $this->input->post('nombre');
        $estacion =      	$this->input->post('estacion');
        $dominio =      	$this->input->post('dominio');
        /*$licencias =    	$this->input->post('licencias');*/
        $id_cliente =      	$_SESSION['id_cliente']; 
        $rol =      	   	$_SESSION['rol'];

        //print_r($rol);die();	

        if ($rol == 'Admin') {
            $data = array(
        	"nombre" =>        	 		$nombre,
            "estacion" =>    			$estacion,
            "dominio" =>    			$dominio,
            /*"licenciasPermitidas" =>	$licencias,*/          
       		);
        } else {
          	$data = array(
          	"idCliente" =>        	 	$id_cliente,	
        	"nombre" =>        	 		$nombre,
            "estacion" =>    			$estacion,
            "dominio" =>    			$dominio,
            /*"licenciasPermitidas" =>	$licencias,*/           
       		);
        } 	

        if($this->Model_1->m_crear_estaciones($data)==true){
            echo "create";
          } else{
            echo "error";
          }
    } 

    function c_update_estaciones(){   	
    	$id =   $this->input->post('id');
	  	$validate = $this->input->post('validate'); 
	    $nombre = $this->input->post('nombre');
	    $estacion = $this->input->post('estacion');
	    $dominio = $this->input->post('dominio');
	    $licencias = $this->input->post('licenciasPermitidas');
	    $idCliente = $this->input->post('idCliente');
	    $cliente = $this->input->post('cliente');
        $grupo = $this->input->post('grupo');
        $id_grupo = $this->input->post('id_grupo');

	    //print_r($validate.'-'.$nombre.'-'.$estacion.'-'.$dominio.'-'.$licencias);
	    //print_r($licencias);die();

	    $data['nombre'] = $nombre;
	    $data['estacion'] = $estacion;
	    $data['dominio'] = $dominio;
	    $data['licencias'] = $licencias;   
	    $data['validate'] = $validate; 
	    $data['id'] = $id; 
	    $data['idCliente'] = $idCliente; 
	    $data['cliente'] = $cliente; 
        $data['grupo'] = $grupo; 
        $data['id_grupo'] = $id_grupo; 

	    $this->load->view('pop_estacion',$data);
  } 

  	function c_update_estaciones_bd() {
  		$id =   			$this->input->post('id'); 
        $validate = 		$this->input->post('validate'); 
	    $nombre = 			$this->input->post('nombre');
	    $estacion = 		$this->input->post('estacion');
	    $dominio = 			$this->input->post('dominio');
        $grupo =            $this->input->post('grupo');
        $select_grupo =     $this->input->post('select_grupo');
        $id_grupo =         $this->input->post('id_grupo');    
	    $cliente = 			$this->input->post('cliente');
	    $select_cliente =   $this->input->post('select_cliente');
        $idCliente =       	$this->input->post('idCliente');
        $id_cliente =       $_SESSION['id_cliente']; 
        $rol =           	$_SESSION['rol'];


            if ($rol != 'Admin') {
            	$data = array(
		        	"idCliente" =>     			$id_cliente,
                    "id_grupo" =>               $id_grupo,
		        	"nombre" =>        	 		$nombre,
		            "estacion" =>    			$estacion,
		            "dominio" =>    			$dominio,         
		        );
            } else {
            if ($select_cliente == '-- Seleccione Cliente --') {    
                if ($select_grupo == '-- Seleccione Grupo --') {$grupo = $id_grupo;} else {$grupo = $select_grupo;}        	
            	$data = array(
		        	"idCliente" =>     			$idCliente,
                    "id_grupo" =>               $grupo,
		        	"nombre" =>        	 		$nombre,
		            "estacion" =>    			$estacion,
		            "dominio" =>    			$dominio,          
		        );
            } else if ($select_cliente <> '-- Seleccione Cliente --') { 
                if ($select_grupo == '-- Seleccione Grupo --') {$grupo = $id_grupo;} else {$grupo = $select_grupo;}  
            	$data = array(
		        	"idCliente" =>     			$select_cliente,
                    "id_grupo" =>               $grupo,
		        	"nombre" =>        	 		$nombre,
		            "estacion" =>    			$estacion,
		            "dominio" =>    			$dominio,         
		        );
            }	
            }

        if($this->Model_1->m_update_estaciones($data,$id)==true){
            echo "update";
          } else{
            echo "error";
          }
    }   

    function c_lista_elimina_estacion() {
        $id =    		$this->input->post('id');
        $nombre =       $this->input->post('nombre');

        $data['id'] =   	   $id;
        $data['nombre'] =      $nombre;

        $this->load->view('pop_eliminar_estacion',$data);    
  } 



    function c_delete_estacion_bd() {
        $id = $this->input->post('id');  

        $res = $this->Model_1->m_validargrupodeestaciones($id);        

        foreach ($res as $key => $value) {
          $res = $value->fre;      
        }

        if ($res == 0) {
        
            if($this->Model_1->m_delete_estacion($id)==true){
              echo "delete";
            } else {
              echo "errordelete";
            }

        } else {
            echo "grupoconestaciones";
        }    
        
      }


    function c_agrupar_estaciones_pop(){ 
        $adjuntar =         $this->input->post('adjuntar'); 
        $data['adjuntar'] = $adjuntar; 
        $this->load->view('pop_agruparestacion',$data);
    } 

    function c_listar_estaciones_grupo(){
        $cliente                    = $_SESSION['cliente'];
        $rol                        = $_SESSION['rol']; 
        $data['select_estaciones'] = $this->Model_1->m_listarselect_estaciones($cliente,$rol);
        $this->load->view('v_select_estacionesgrupo',$data);
    }

    function c_select_auto_res(){
        $cliente                    = $_SESSION['cliente'];
        $rol                        = $_SESSION['rol']; 
        $data['select_auto_res'] = $this->Model_1->m_listarselect_auto_res($cliente,$rol);
        $this->load->view('v_select_auto_res',$data);
    }

    function c_listar_grupo(){
        $cliente                    = $_SESSION['cliente'];
        $rol                        = $_SESSION['rol']; 
        $data['select_grupo'] = $this->Model_1->m_listarselect_grupos($cliente,$rol);
        $this->load->view('v_select_grupos',$data);
    }

    function c_agrupar_estaciones_bd() {
        $grupo =               $this->input->post('grupo'); 
        $estaciones =          $this->input->post('estaciones');
        $id_cliente =      	   $_SESSION['id_cliente']; 
        $rol =      	   	   $_SESSION['rol'];

        if ($rol == 'Admin') {
	        $data = array(
	            "id_grupo" =>         $grupo,        
	        );
        } else {
	        $data = array(
	        	"idCliente" =>        $id_cliente, 
	            "id_grupo" =>         $grupo,        
	        );
	    }    

        if($this->Model_1->m_update_autoestacion($estaciones,$data)==true){
            echo "update";
          } else{
            echo "error";
          }
    } 

    function c_recuperar_automatizacion_bd() {
        $auto_res =               $this->input->post('auto_res'); 

        $auto_elimin = $this->Model_1->m_listar_auto_eliminadas($auto_res);
 
        foreach ($auto_elimin as $key => $value) {
            $id                     = $value->id_automatizacion;
            $data_2['id']           = $value->id_automatizacion;
            $data_2['id_cliente']   = $value->id_cliente;
            $data_2['nombre']       = $value->nombre;
            $data_2['ruta']         = $value->ruta;
            $data_2['version']      = $value->version;
            $data_2['tipo']         = $value->tipo;
            $data_2['conjunto']     = $value->conjunto;
            $data_2['Descripcion']  = $value->Descripcion;

            $_res = $this->Model_1->m_insertar_automat_boradas($data_2);

            if ($_res==true) {
            $this->Model_1->m_delete_automeliminadas_bd($id);
            }         
        }
            if ($_res==true) {
               echo "ok";
            } else {
               echo "error"; 
            }         
    }

    function c_create_grupos_bd() {
        $grupo =           $this->input->post('grupo');
        $id_cliente =      $_SESSION['id_cliente']; 
        $rol =      	   $_SESSION['rol'];
        //print_r($grupo);die();   

        if ($rol == 'Admin') {
	        $data = array(
	            "nombre" =>                 $grupo,        
	        );
	    } else {
	        $data = array(
	            "id_cliente" =>             $id_cliente,  
	            "nombre" =>                 $grupo,        
	        );
	    }    
        //print_r($data);die();

        if($this->Model_1->m_crear_grupo($data)==true){
            echo "create";
          } else{
            echo "error";
          }
    } 


    function c_auto_listarestacionesgrupo(){ 
        $id_grupo = $this->input->post('id_grupo_');
        $data_listarestacionesgrupo = $this->Model_1->m_listar_estacionesgrupo($id_grupo);

        //print_r($data_listarestacionesgrupo);die();

        $data['lista_estacionesgrupo'] = $data_listarestacionesgrupo;
        $this->load->view('pop_listarestacionesgrupo',$data);
  }


    function c_lista_elimina_estaciongrupo() {
        $id =    $this->input->post('id');       
        $data = array(
            "id_grupo" =>         0,  
            "id" =>             $id,        
        );

        //print_r($data);die();

        $res = $this->Model_1->m_update_quitar_estaciongrupo($data,$id);   
        

        if($res==true){
          echo "delete";
        } else {
          echo "error";
        }
    }  


    function c_lista_elimina_grupo() {
        $id_grupo =           $this->input->post('id_grupo_');
        $grupo =              $this->input->post('grupo');

        $data['id_grupo'] =    $id_grupo;
        $data['grupo'] =       $grupo;

        $this->load->view('pop_elimina_grupo',$data);    
    } 

    function c_delete_grupo_bd() {
        $id_grupo = $this->input->post('id_grupo'); 

        $res = $this->Model_1->m_validarestacionesdegrupo($id_grupo);        

        foreach ($res as $key => $value) {
          $res = $value->fre;      
        }

        if ($res == 0) {
        
            if($this->Model_1->m_delete_estaciongrupo($id_grupo)==true){
              echo "delete";
            } else {
              echo "errordelete";
            }

        } else {
            echo "grupoconestaciones";
        }   
      }


      function c_update_grupo(){       
        $id_grupo =   $this->input->post('id_grupo_');
        $grupo = $this->input->post('grupo'); 
        $cliente = $this->input->post('cliente'); 
        $id_cliente = $this->input->post('id_cliente');

        //print_r($validate.'-'.$nombre.'-'.$estacion.'-'.$dominio.'-'.$licencias);

        $data['id_grupo'] = $id_grupo;
        $data['grupo'] = $grupo;
        $data['cliente'] = $cliente;
        $data['id_cliente'] = $id_cliente;

        $this->load->view('pop_grupo',$data);
       } 


        function c_update_grupo_bd() {
            $grupo =                $this->input->post('grupo'); 
            $id_grupo =             $this->input->post('id_grupo');
            $cliente =              $this->input->post('cliente');
            $select_cliente =       $this->input->post('select_cliente');
            $id_cliente_ =       	$this->input->post('id_cliente');
            $id_cliente =           $_SESSION['id_cliente']; 
            $rol =           		$_SESSION['rol']; 

            if ($rol != 'Admin') {
            	$data = array(
	                "id_cliente" =>     $id_cliente,
	                "nombre" =>         $grupo,          
            	);
            } else {
            if ($select_cliente == '-- Seleccione Cliente --') {            	
            	$data = array(
	                "id_cliente" =>     $id_cliente_,
	                "nombre" =>         $grupo,          
            	);
            } else if ($select_cliente <> '-- Seleccione Cliente --') { 
            	$data = array(
	                "id_cliente" =>     $select_cliente,
	                "nombre" =>         $grupo,          
            	);
            }	
            }

            if($this->Model_1->m_update_grupo($data,$id_grupo)==true){
                echo "update";
              } else{
                echo "errorupdate";
              }
        } 


}	