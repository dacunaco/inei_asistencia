<?php defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data = array(
			'usuario'	=> 	$this->session->userdata['user_name'].' '.$this->session->userdata['user_ape_pat'].' '.$this->session->userdata['user_ape_mat'].' - '.$this->session->userdata['user_id'],
            'correo'    =>  $this->session->userdata['user_correo']
		);

		$this->load->view('template', $data);
	}
}