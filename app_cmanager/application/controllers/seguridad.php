<?php
header('Access-Control-Allow-Origin: *');
class Seguridad extends CI_Controller {

    public function __construct(){  
        parent::__construct();    
    }

    public function index(){
        //var_dump(base_url());die();
        if ($this->session->userdata("login")) {
            redirect(base_url()."index.php/Controller1");
        } else {
           //$this->load->view('incluidos/head');     
           $this->load->view('seguridad/logueo');  
        }
         
    }

    // Valida que el usuario exista en la bd y se encuentre activo.
    public function login(){
        $user = trim($this->input->post('usuario'));
        $password = $this->input->post('pws');
        
        //validar usuario
        $this->load->model('Seguridad_model');
        $userInfo = $this->Seguridad_model->validarUsuario($user);

        if (isset($userInfo)){
            if ($userInfo->activo=='Y'){                 
                //validar constraseña
                //$this->load->model('Seguridad_model');
                $claveInfo = $this->Seguridad_model->validarconstrasena(sha1($password));   

                if (isset($claveInfo)) {
                    if ($claveInfo){
                        $array['nombres']           =   $userInfo->nombres;
                        $array['apellidos']         =   $userInfo->apellidos;
                        $array['usuario']           =   $userInfo->usuario;
                        $array['rol']               =   $userInfo->rol;
                        $array['cliente']           =   $userInfo->cliente;
                        $array['id_cliente']        =   $userInfo->id_cliente;
                        $array['login']             =   true;

                        $this->session->set_userdata($array);   
                        echo 'OK';
                    }else{
                        echo "usuarioErroneo";
                    }
                }else{
                    echo "PwdErroneo";
                }
            }else{
                echo 'desactivado';
            }           
        }else{
            echo 'noExiste';
        }
    }

    // Destruye la sesion del usuario y retorna a la pagina de logueo
    public function logout() {
        $this->session->sess_destroy();
        $this->index();
    }

}    