<?php

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Asistencia_model extends Eloquent {

    protected $table = 'asistencia';
    protected $primaryKey = 'idasistencia';
    public $timestamps = false;

}
