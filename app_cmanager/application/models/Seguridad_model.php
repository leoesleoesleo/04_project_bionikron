<?php
class Seguridad_model extends CI_Model {
    
    public function __construct(){
	    // Call the CI_Model constructor
	    parent::__construct();
    }

    /*function validarUsuario($user){
        $this->db->where('usuario',$user);
        $consulta=$this->db->get('v_roles');
        //print_r($consulta);die;
        return $consulta->row(); 
    }*/

    function validarUsuario($user){
      $query = "select a.id_usuario AS id_usuario,
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
                join conf_clientes c on a.id_cliente = c.id_clientes
                where a.usuario = '$user'";        
      $consulta=$this->db->query($query);    
      return $consulta->row();
    }

    function validarconstrasena($password){
        $this->db->where('clave',$password);
        $consulta=$this->db->get('conf_usuarios');
        //print_r($consulta);die;
        return $consulta->row(); 
    }

    function m_permisos_roles($usuario){
      $query = "";
      $consulta=$this->db->query($query);         
      return $consulta->result_array();
    }

}    