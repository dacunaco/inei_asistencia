<?php

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Personal_model extends Eloquent {

    protected $table = 'personal';
    protected $primaryKey = 'idpersonal';
    public $timestamps = false;

    public function usuario() {
        return $this->hasOne('Usuario_model', 'idusuario');
    }

}
