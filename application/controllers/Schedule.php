<?php defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class Schedule extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function registrar(){
		$request_body = file_get_contents('php://input');
        $data = json_decode($request_body);

        $resp = array();

        $personal = DB::select('select * from personal where dni = '.$data->dni);

        if(count($personal) > 0){
        	$resp = array('code' => 1, 'data' => $personal);        	
        }else{
        	$resp = array('code' => 0);
        }

        echo json_encode($resp);
	}
}