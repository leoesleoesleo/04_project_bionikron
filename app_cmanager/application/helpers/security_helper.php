<?php
    /**
     * checkLogin() verifica que el usuario tenga una sesión activa.
     * @author 
     * @version 1.0
     * @copyright 2010
     */
    if ( ! function_exists('checkLogin')) {
        function checkLogin() {
            $CI =& get_instance();
            if(!$CI->session->userdata('usuario')) {
                $CI->load->view('v_login_redirect', array('url'=>site_url('security/index')));
            }
        }
    }

    /**
     * hasRole() verifica si el usuario logueado tiene un role determinado
     * @author 
     * @version 1.0
     * @copyright 2010
     */
    if ( ! function_exists('hasRole')) {
        function hasRole($roleArray) { 
            $autorizado = FALSE;
            $CI =& get_instance();
            $roles = $CI->session->userdata('role');            
            //print_r($roleArray);die;

            if($roles) {
                foreach($roleArray as $role) {
                    //print_r($roles);die();
                    if(in_array($role, $roles)) {
                        $autorizado = TRUE;
                    }
                }
            }
            return $autorizado;
        }
    }

?>
