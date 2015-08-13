<?php

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Usuario_model extends Eloquent {

    protected $table = 'usuario';
    protected $primaryKey = 'idusuario';
    public $timestamps = false;

    public function personal(){
		return $this->belongsTo('Personal_model', 'idpersonal');
	}

	public function Perfil(){
		return $this->belongsTo('Personal_model');
	}
}
