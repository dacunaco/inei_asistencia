<?php

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Perfil_model extends Eloquent {

    protected $table = 'perfil';
    protected $primaryKey = 'idperfil';
    public $timestamps = false;

    public function usuarios(){
		return $this->hasMany('Usuario_model', 'idperfil');
	}

}
