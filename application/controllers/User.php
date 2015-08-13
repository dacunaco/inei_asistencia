<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model(array('Personal_model', 'Usuario_model', 'Perfil_model', 'Cargo_model'));
    }

	public function index(){
		$this->load->view('login');
	}

	public function login() {
        $usuario = Usuario_model::with('personal')
                                    ->where('user', '=', $this->input->post('username'))
                                    ->where('estado', '=', 1)
                                    ->get();
        $resp = array();
        if (count($usuario) > 0) {
            if($this->compare_crypt($this->input->post('password'), $usuario[0]->password)){
            	$this->session->set_userdata(array(
                    'user_name'     =>  $usuario[0]->personal->nombre,
                    'user_ape_pat'  =>  $usuario[0]->personal->apellido_paterno,
                    'user_ape_mat'  =>  $usuario[0]->personal->apellido_materno
                ));
	            $resp = array("rep" => 1, "msg" => "Datos correctos, redireccionando...");
            }else{
            	$resp = array("rep" => 0, "msg" => "Usuario o Contraseña incorrectos...");
            }
        } else {
            $resp = array("rep" => 2, "msg" => "Usuario o Contraseña incorrectos...");
        }
        
        echo json_encode($resp);
    }

    public function logout() {
        $this->session->unset_userdata('user_name');
        $this->session->sess_destroy();
        redirect('usuario');
    }

    public function compare_crypt($pwd, $salt){
    	if(crypt($pwd, $salt) == $salt) {  
			return true; 
		}else{
			return false;
		}
    }

    private function crypt_blowfish_salt($digito = 7){
        $set_salt = './1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';  
        $salt = sprintf('$2a$%02d$', $digito);  

        for($i = 0; $i < 22; $i++){  
            $salt .= $set_salt[mt_rand(0, 63)];  
        } 

        echo crypt($this->input->get('password'), $salt); 
    }
}