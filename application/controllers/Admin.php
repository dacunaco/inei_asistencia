<?php defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data = array(
			'usuario'	=> 	$this->session->userdata['user_name'].' '.$this->session->userdata['user_ape_pat'].' '.$this->session->userdata['user_ape_mat'],
			'menu' => isset($this->session->userdata['user_name']) ? $this->menu() : false 
		);

		$this->load->view('template', $data);
	}

	private function menu(){
    	$padres = DB::select('select asignacion_menu.idmenu, menu.menu, menu.url_menu, menu.imagen_menu from asignacion_menu, menu where asignacion_menu.idmenu = menu.idmenu and asignacion_menu.idempleado = '.$this->session->userdata['user_id'].' and menu.idpadre is null;');

    	$parents = array();
    	$childrens = array();
    	$i = 0;
    	foreach ($padres as $value) {
    		$parents[$i]['url'] = $value['url_menu'];
    		$parents[$i]['label'] = $value['menu'];
    		$parents[$i]['icon'] = $value['imagen_menu'];

    		$hijos = DB::select('select asignacion_menu.idmenu, menu.menu, menu.url_menu from asignacion_menu, menu where asignacion_menu.idmenu = menu.idmenu and asignacion_menu.idempleado = '.$this->session->userdata['user_id'].' and menu.idpadre = '.$value['idmenu'].';');

    		$j = 0;
    		if(count($hijos) > 0){
                $childrens = array();
    			foreach ($hijos as $value) {
    				$urls = explode("/", $value['url_menu']);
    				$url = $urls[0];
    				$surl = $urls[1];

    				$childrens[$j]['url'] = $url;
    				$childrens[$j]['surl'] = $surl;
    				$childrens[$j]['label'] = $value['menu'];

    				$j++;
    			}

    			$parents[$i]['submenu'] = $childrens;
    		}

    		$i++;
    	}

    	return $parents;
    }
}