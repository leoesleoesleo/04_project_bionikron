<?php

   class Model_1 extends CI_Model {

      public function __construct(){
      parent::__construct();
      $this->load->database();
      }
  

  /*inicio clientes*/

   function m_listar_clientes($cliente,$rol){
      if ($rol == 'Admin') {
      $query = "select *
                from conf_clientes";
      } else {
      $query = "select *
                from conf_clientes
                where nombre = '$cliente'";
      }          
      $consulta=$this->db->query($query);    
      return $consulta->result();
    }

    function m_listar_clientes_vol($cliente,$rol){
      if ($rol == 'Admin') {
      $query = "select count(1) as vol
                from conf_clientes";
      } else { 
      $query = "select count(1) as vol
                from conf_clientes
                where nombre = '$cliente'";  
      }         
      $consulta=$this->db->query($query);    
      return $consulta->result_array();
    } 

    function m_listar_clientes_act($cliente,$rol){
      if ($rol == 'Admin') {
      $query = "select count(1) as vol
                from conf_clientes
                where activo = 'Y'";
      } else { 
      $query = "select count(1) as vol
                from conf_clientes
                where activo = 'Y'
                and nombre = '$cliente'";
      }           
      $consulta=$this->db->query($query);    
      return $consulta->result_array();
    }

    function m_listar_ip($cliente,$rol){
      if ($rol == 'Admin') {
      $query = "select *
				from ip_clientes a
				join conf_clientes b on a.id_cliente = b.id_clientes";
      } else {
      $query = "select *
                from ip_clientes a
				join conf_clientes b on a.id_cliente = b.id_clientes
                where nombre = '$cliente'";
      }          
      $consulta=$this->db->query($query);    
      return $consulta->result();
    }

    function m_listar_ip_2($cliente,$rol,$id_clientes){
      if ($rol == 'Admin') {
      $query = "select *
				from ip_clientes a
				join conf_clientes b on a.id_cliente = b.id_clientes
				where id_cliente = '$id_clientes'";
      } else {
      $query = "select *
                from ip_clientes a
				join conf_clientes b on a.id_cliente = b.id_clientes
                where nombre = '$cliente'";
      }          
      $consulta=$this->db->query($query);    
      return $consulta->result();
    }

    function m_insertar_clientes_db($data){ 
     $this->db->insert('conf_clientes',$data); 
     if ($this->db->affected_rows() > 0) {
      return true;
      } else {
      return false;
      }
    }

    function delete_cliente($id_cliente){ 
     $this->db->where('id_clientes',$id_cliente); 
     $this->db->delete('conf_clientes');
     return true;
    }

    function m_update_cliente($data,$id_clientes){
      $this->db->where('id_clientes', $id_clientes);
      $this->db->update('conf_clientes', $data); 
     if ($this->db->affected_rows() > 0) {
      return true;
      } else {
      return false;
      }
    }

    function m_clienteligado($id_cliente){
      $query = "select (sum(fre_usuario)+sum(fre_estacion)+sum(fre_grupos)+sum(fre_auto)) as fre
        				from (select count(1) as fre_usuario
        				from conf_clientes a
        				join conf_usuarios b on a.id_clientes = b.id_cliente
        				where a.id_clientes = $id_cliente) a,
        				(select count(1) as fre_estacion
        				from conf_clientes a
        				join estaciones c on a.id_clientes = c.idCliente
        				where a.id_clientes = $id_cliente) b,
        				(select count(1) as fre_grupos
        				from conf_clientes a
        				join grupos d on a.id_clientes = d.id_cliente
        				where a.id_clientes = $id_cliente) c,
        				(select count(1) as fre_auto
        				from conf_clientes a
        				join automatizaciones e on a.id_clientes = e.id_cliente
        				where a.id_clientes = $id_cliente) d";
      $consulta=$this->db->query($query);    
      return $consulta->result();
    } 

  /*fin clientes*/

   function m_listar_usuarios($cliente,$rol){
      if ($rol == 'Admin') {
      $query = "select a.*,b.rol,c.nombre as cliente
                from conf_usuarios a
                left join conf_roles b on a.id_rol = b.id_rol
                left join conf_clientes c on a.id_cliente = c.id_clientes";
      } else {
      $query = "select a.*,b.rol,c.nombre as cliente
                from conf_usuarios a
                left join conf_roles b on a.id_rol = b.id_rol
                left join conf_clientes c on a.id_cliente = c.id_clientes
                where c.nombre = '$cliente'";
      }          
      $consulta=$this->db->query($query);    
      return $consulta->result();
    } 

    function m_listar_usuarios_vol($cliente,$rol){
      if ($rol == 'Admin') {
      $query = "select count(1) as usuarios_vol 
          			from conf_usuarios
          			where activo = 'Y'";
      } else {  
      $query = "select count(1) as usuarios_vol 
                from conf_usuarios a
                join conf_clientes b on a.id_cliente = b.id_clientes
                where b.nombre = '$cliente'";
      }         
      $consulta=$this->db->query($query);    
      return $consulta->result_array();
    } 

    function m_listar_usuarios_admin(){
      $query = "select count(1) as usuarios_admin
        				from (select a.usuario,a.nombres,a.apellidos,a.cc,a.email,a.activo,b.rol
        						from conf_usuarios a
        						join conf_roles b on a.id_rol = b.id_rol
        						and b.rol = 'Admin') a";
      $consulta=$this->db->query($query);    
      return $consulta->result_array();
    } 

    function m_listar_automatizaciones($cliente,$rol){
      if ($rol == 'Admin') {
      $query = "select a.id,
                       a.id_cliente,
                       a.nombre nom_autom,
                       a.ruta,
                       a.version,
                       a.tipo,
                       a.conjunto,
                       a.Descripcion,
                       b.nombre nom_cliente,
                       b.id_clientes,
                       b.activo,
                       b.nro_licencias_permitidas
                from automatizaciones a
                join conf_clientes b on a.id_cliente = b.id_clientes";
      } else {
      $query = "select a.id,
                       a.id_cliente,
                       a.nombre nom_autom,
                       a.ruta,
                       a.version,
                       a.tipo,
                       a.conjunto,
                       a.Descripcion,
                       b.nombre nom_cliente,
                       b.id_clientes,
                       b.activo,
                       b.nro_licencias_permitidas
                from automatizaciones a
                join conf_clientes b on a.id_cliente = b.id_clientes
                where b.nombre = '$cliente'";
      }  
      $consulta=$this->db->query($query);    
      return $consulta->result();
    } 

    function m_insertar_usser($data){ 
     $this->db->insert('conf_usuarios',$data); 
     if ($this->db->affected_rows() > 0) {
      return true;
      } else {
      return false;
      }
    }

    function m_listarselect_roles(){
      $query = "select *
				from conf_roles";        
      $consulta=$this->db->query($query);    
      return $consulta->result_array();
    }

    function m_listarselect_clientes(){
      $query = "select id_clientes,nombre
        from conf_clientes";        
      $consulta=$this->db->query($query);    
      return $consulta->result_array();
    }

    function m_listarselect_grupo_es($cliente,$rol){
      if ($rol == 'Admin') {
      $query = "select id_grupo,nombre
                from grupos";    
      } else {   
      $query = "select a.id_grupo,a.nombre
                from grupos a
                join conf_clientes b on a.id_cliente = b.id_clientes
                where b.nombre = '$cliente'";  
      }                    
      $consulta=$this->db->query($query);    
      return $consulta->result_array();
    }

     /*function lista_data_cargo($rol){
      $this->db->select('id_rol');      
      $this->db->where('rol', $rol); 
      $query = $this->db->get('v_roles'); 
      return $query->result();
    }*/

    function lista_data_cargo($rol){
      $query = "select id_rol from (
                        select a.id_usuario AS id_usuario,
                             a.id_cliente AS id_cliente,
                             a.id_rol AS id_rol,
                             a.usuario AS usuario,
                             a.clave AS clave,
                             a.nombres AS nombres,
                             a.apellidos AS apellidos,
                             a.email AS email,
                             a.activo AS activo,
                             a.cc AS cc,a.fecha_nac AS fecha_nac,
                             a.fecha_created AS fecha_created,
                             b.rol AS rol,
                             c.nombre AS cliente 
                        from conf_usuarios a 
                        join conf_roles b on a.id_rol = b.id_rol
                        join conf_clientes c on a.id_cliente = c.id_clientes) a
              where a.id_rol = $rol";        
      $consulta=$this->db->query($query);    
      return $consulta->result();
    }


    function m_update_usser($data,$id_usuario){
      $this->db->where('id_usuario', $id_usuario);
      $this->db->update('conf_usuarios', $data); 
     if ($this->db->affected_rows() > 0) {
      return true;
      } else {
      return false;
      }
    }

    function m_insertar_ip_cliente($data){ 
     $this->db->insert('ip_clientes',$data); 
     if ($this->db->affected_rows() > 0) {
      return true;
      } else {
      return false;
      }
    }

    function m_update_ip($data,$id_ip){
      $this->db->where('id_ip', $id_ip);
      $this->db->update('ip_clientes', $data); 
     if ($this->db->affected_rows() > 0) {
      return true;
      } else {
      return false;
      }
    }

    function delete_ip($id_ip){ 
     $this->db->where('id_ip',$id_ip); 
     $this->db->delete('ip_clientes');
     return true;
    }

    function delete_users($id_usuario){ 
     $this->db->where('id_usuario',$id_usuario); 
     $this->db->delete('conf_usuarios');
     return true;
    }

    function m_listar_estaciones($id){
      $query = "select b.idAutoestacion,c.id_grupo,a.nombre as nom_auto,c.nombre as nom_grupo
                from automatizaciones a
                join autoestacion b on a.id = b.idAutomatizaciones
                join grupos c on b.idGrupos = c.id_grupo
				        where a.id = $id";        
      $consulta=$this->db->query($query);    
      return $consulta->result();
    }

    function m_listar_auto_vol($cliente,$rol){
      if ($rol == 'Admin') {
      $query = "select count(1) as fre
                from automatizaciones";
      } else {
      $query = "select count(1) as fre
                from automatizaciones a
                join conf_clientes b on a.id_cliente = b.id_clientes
                where b.nombre = '$cliente'";
      }          
      $consulta=$this->db->query($query);    
      return $consulta->result_array();
    } 

    function m_delete_automatizacion_bd($id){ 
     $this->db->where('id',$id); 
     $this->db->delete('automatizaciones');     

     $db_error = $this->db->error();

      if (!empty($db_error)) {
      	return true;
      } else {
      	return false;
      }

    }

    function m_delete_automeliminadas_bd($id){ 
     $this->db->where('id_automatizacion',$id); 
     $this->db->delete('automatizaciones_eliminadas');     
    }

    function m_update_automatizacion($data,$id){
      $this->db->where('id', $id);
      $this->db->update('automatizaciones', $data); 
      if ($this->db->affected_rows() > 0) {
      return true;
      } else {
      return false;
      }
    }

    function m_buscarcliente($client){
      $query = "select id_clientes
                from conf_clientes
                where nombre = '$client'";        
      $consulta=$this->db->query($query);    
      return $consulta->result();
    }

    function m_validate($id){
      $query = "select count(1) as fre
        from automatizaciones a
        join autoestacion b on a.id = b.idAutomatizaciones
        join grupos c on b.idGrupos = c.id_grupo
				where a.id = $id";        
      $consulta=$this->db->query($query);    
      return $consulta->result();
    }

    function m_insertar_recuperacion($data,$id){ 
     $this->db->insert('automatizaciones_eliminadas',$data); 
     if ($this->db->affected_rows() > 0) {
      return true;
      } else {
      return false;
      }
    }

    function m_cons($id){
      $query = "select a.id id_automatizacion,b.id id_flujo,a.id_cliente,a.nombre,a.ruta,a.version,a.tipo,a.conjunto,a.Descripcion
                from automatizaciones a
                left join flujos b on a.id = b.idAutomatizacion
                where a.id = $id";        
      $consulta=$this->db->query($query);    
      return $consulta->result();
    }

    function m_crear_automatizacion($data,$id){ 
     $this->db->insert('automatizaciones',$data); 
     if ($this->db->affected_rows() > 0) {
      return true;
      } else {
      return false;
      }
    }

    function m_delete_estacionligada_bd($idAutoestacion){ 
     $this->db->where('idAutoestacion',$idAutoestacion); 
     $this->db->delete('autoestacion');     

     $db_error = $this->db->error();

      if (!empty($db_error)) {
      	return true;
      } else {
      	return false;
      }
    }

    function m_listarselect_estaciones($cliente,$rol){
      if ($rol == 'Admin') {
      $query = "select id,estacion
                from estaciones
                where id_grupo is null or id_grupo = 0";  
      } else {  
      $query = "select a.id,a.estacion
                from estaciones a
                join conf_clientes b on a.idCliente = b.id_clientes
                where (a.id_grupo is null or a.id_grupo = 0)
                and b.nombre = '$cliente'";    
      }      
      $consulta=$this->db->query($query);    
      return $consulta->result_array();
    }

     function m_listarselect_auto_res($cliente,$rol){
      if ($rol == 'Admin') {
      $query = "select id_automatizacion,nombre
                from automatizaciones_eliminadas";  
      } else {  
      $query = "select a.id_automatizacion,a.nombre
                from automatizaciones_eliminadas a
                join conf_clientes b on a.id_cliente = b.id_clientes
                where b.nombre = '$cliente'";    
      }     
      $consulta=$this->db->query($query);    
      return $consulta->result_array();
    }


    function m_listarselect_grupoestacion($cliente,$rol){
      if ($rol == 'Admin') {
      $query = "select id_grupo,nombre
                from grupos";   
      } else {
      $query = "select a.id_grupo,a.nombre
                from grupos a
                join conf_clientes b
                join conf_roles c
                where b.nombre = '$cliente'
                and c.rol = '$rol'";      
      }           
      $consulta=$this->db->query($query);    
      return $consulta->result_array();
    }


    function m_relacionar_estaciones($data){ 
     $this->db->insert('autoestacion',$data); 
     if ($this->db->affected_rows() > 0) {
      return true;
      } else {
      return false;
      }
    }

    /*Inicio Estaciones*/

    function m_listar_estaciones_bd($cliente,$rol){
      if ($rol == 'Admin') {
      $query = "select a.*,b.nombre as grupo,c.nombre as cliente
                from estaciones a
                left join grupos b on a.id_grupo = b.id_grupo
                left join conf_clientes c on a.idCliente = c.id_clientes";
      } else {
      $query = "select a.*,b.nombre as grupo,c.nombre as cliente
                from estaciones a
                left join grupos b on a.id_grupo = b.id_grupo
                left join conf_clientes c on a.idCliente = c.id_clientes
                where c.nombre = '$cliente'";
      }          
      $consulta=$this->db->query($query);    
      return $consulta->result();
    } 

    function m_listar_grupos_bd($cliente,$rol){
      if ($rol == 'Admin') {
      $query = "select a.id_grupo_,a.id_cliente,a.cliente,if(a.grupo is null,'Sin Grupo',a.grupo) as grupo,count(estacion) as fre
                from (select b.*,a.id_cliente,a.nombre as grupo, a.id_grupo as id_grupo_, c.nombre as cliente
                from grupos a
                left join estaciones b on a.id_grupo = b.id_grupo
                left join conf_clientes c on a.id_cliente = c.id_clientes) a
                group by a.id_grupo_,a.id_cliente,a.cliente,a.grupo";
      } else { 
      $query = "select a.id_grupo_,a.id_cliente,a.cliente,if(a.grupo is null,'Sin Grupo',a.grupo) as grupo,count(estacion) as fre
                from (select b.*,a.id_cliente,a.nombre as grupo, a.id_grupo as id_grupo_, c.nombre as cliente
                from grupos a
                left join estaciones b on a.id_grupo = b.id_grupo
                left join conf_clientes c on a.id_cliente = c.id_clientes) a
                where a.cliente = '$cliente'
                group by a.id_grupo_,a.id_cliente,a.cliente,a.grupo";  
      }                             
      $consulta=$this->db->query($query);    
      return $consulta->result();
    } 

    function m_listar_estaciones_vol($cliente,$rol){
      if ($rol == 'Admin') {
      $query = "select count(1) as fre
				        from estaciones";
      } else {  
      $query = "select count(1) as fre
                from estaciones a
                join conf_clientes b on a.idCliente = b.id_clientes
                where b.nombre = '$cliente'";  
      } 
      $consulta=$this->db->query($query);    
      return $consulta->result_array();
    } 

    function m_listar_grupos_vol($cliente,$rol){
      if ($rol == 'Admin') {
      $query = "select count(1) as fre
                from grupos";
      } else { 
      $query = "select count(1) as fre
                from grupos a
                join conf_clientes b on a.id_cliente = b.id_clientes
                where b.nombre = '$cliente'";  
      }        
      $consulta=$this->db->query($query);    
      return $consulta->result_array();
    }

    function m_crear_estaciones($data){ 
     $this->db->insert('estaciones',$data); 
     if ($this->db->affected_rows() > 0) {
      return true;
      } else {
      return false;
      }
    }

    function m_update_estaciones($data,$id){
      $this->db->where('id', $id);
      $this->db->update('estaciones', $data); 
      if ($this->db->affected_rows() > 0) {
      return true;
      } else {
      return false;
      }
    }

    function m_delete_estacion($id){ 
     $this->db->where('id',$id); 
     $this->db->delete('estaciones');
     return true;
    }

     function m_listarselect_grupos($cliente,$rol){
      if ($rol == 'Admin') {
      $query = "select id_grupo,nombre
                from grupos";  
      } else {  
      $query = "select a.id_grupo,a.nombre
                from grupos a
                join conf_clientes b on a.id_cliente = b.id_clientes
                where b.nombre = '$cliente'";    
      }          
      $consulta=$this->db->query($query);    
      return $consulta->result_array();
    }

    function m_update_autoestacion($estaciones,$data){
      $this->db->where_in('id', $estaciones);
      $this->db->update('estaciones', $data); 
      if ($this->db->affected_rows() > 0) {
      return true;
      } else {
      return false;
      }
    }

    function m_insert_autoestacion($estaciones,$data){
     $this->db->insert('estaciones',$data); 
     if ($this->db->affected_rows() > 0) {
      return true;
      } else {
      return false;
      }
    }

    function m_crear_grupo($data){ 
     $this->db->insert('grupos',$data); 
     if ($this->db->affected_rows() > 0) {
      return true;
      } else {
      return false;
      }
    }

    function m_listar_estacionesgrupo($id_grupo){
      $query = "select a.id,b.nombre as grupo,a.estacion as estacion
                from estaciones a
                join grupos b on a.id_grupo = b.id_grupo
                where a.id_grupo = $id_grupo";        
      $consulta=$this->db->query($query);    
      return $consulta->result();
    }

    function m_listar_auto_eliminadas($auto_res){
      $this->db->where_in('id_automatizacion',$auto_res);
      $query = $this->db->get('automatizaciones_eliminadas');
      return $query->result();
    }

    function m_update_quitar_estaciongrupo($data,$id){
      $this->db->where('id', $id);
      $this->db->update('estaciones', $data); 
     if ($this->db->affected_rows() > 0) {
      return true;
      } else {
      return false;
      }
    }

    function m_validarestacionesdegrupo($id_grupo){
      $query = "select count(1) as fre
                from estaciones
                where id_grupo = $id_grupo";        
      $consulta=$this->db->query($query);    
      return $consulta->result();
    }


    function m_delete_estaciongrupo($id_grupo){ 
     $this->db->where('id_grupo',$id_grupo); 
     $this->db->delete('grupos');
     return true;
    }

    function m_validargrupodeestaciones($id){
      $query = "select sum(id_grupo) as fre
                from estaciones
                where id = $id";        
      $consulta=$this->db->query($query);    
      return $consulta->result();
    }

    function m_update_grupo($data,$id_grupo){
      $this->db->where('id_grupo', $id_grupo);
      $this->db->update('grupos', $data); 
      if ($this->db->affected_rows() > 0) {
      return true;
      } else {
      return false;
      }
    }

     function m_insertar_automat_boradas($data_2){ 
     $this->db->insert('automatizaciones',$data_2); 
     if ($this->db->affected_rows() > 0) {
      return true;
      } else {
      return false;
      }
    }

    /*Fin Estaciones*/

    function m_validar_usuario($usuario,$password){
      $query = "select count(1) existe
                from conf_usuarios
                where usuario = '$usuario'
                and clave = '$password'";        
      $consulta=$this->db->query($query);    
      return $consulta->result();
    }

    function m_validardatos_usuario($usuario,$password){
      $query = "select *
                from conf_usuarios
                where usuario = '$usuario'
                and clave = '$password'";        
      $consulta=$this->db->query($query);    
      return $consulta->result();
    }


    function m_update_usser_clave($data,$id_usuario){
      $this->db->where('id_usuario', $id_usuario);
      $this->db->update('conf_usuarios', $data); 
       if ($this->db->affected_rows() > 0) {
        return true;
        } else {
        return false;
        }
    }


     }

?>