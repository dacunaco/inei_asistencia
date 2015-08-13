<?php

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Cargo_model extends Eloquent {

    protected $table = 'cargo';
    protected $primaryKey = 'idcargo';
    public $timestamps = false;

}
