<?php defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class Schedule extends CI_Controller {
        public function __construct(){
		parent::__construct();
                $this->load->model(array('Asistencia_model'));
	}

	public function registrar(){
		$request_body = file_get_contents('php://input');
                $data = json_decode($request_body);
                $ingreso = date('Y-m-d H:i:s');
                $estado = "";
                $horario = array();

                $resp = array();

                $personal = DB::select("select personal.idpersonal, concat(personal.apellido_paterno, ' ', personal.apellido_materno, ' ', personal.nombres) as personal, personal.dni, cargo.idcargo, cargo.cargo, cargo.abreviatura, proyecto.idproyecto, proyecto.nombre_proyecto, proyecto.abreviatura from personal, cargo_personal, cargo, planilla, proyecto where personal.idpersonal = cargo_personal.idpersonal and cargo_personal.idcargo = cargo.idcargo and personal.idpersonal = planilla.idpersonal and planilla.idproyecto = proyecto.idproyecto and personal.dni = ".$data->dni);

                if(count($personal) > 0){
                        $foto_url = 'assets/photos/'.$personal[0]['dni'].'.jpg';

                        $foto = file_exists($foto_url);

                        $calendario = DB::select("select calendario.idcalendario, calendario.estado_dia, fecha.idfecha, fecha.fecha, fecha.estado_fecha from calendario, fecha where calendario.idfecha = fecha.idfecha and calendario.idproyecto = ".$personal[0]['idproyecto']." and fecha.fecha = '".date('Y-m-d', strtotime($ingreso))."';");

                        $hora_nueva = DB::select("select * from hora_nueva, calendario, horario where hora_nueva.idcalendario = calendario.idcalendario and hora_nueva.idhorario = horario.idhorario and hora_nueva.idcalendario = ".$calendario[0]['idcalendario']. " and horario.abreviatura = '".((date('H', strtotime($ingreso)) < 13) ? 'IM' : 'IT')."'");

                        $hora = date('H:i:s', strtotime($ingreso));

                        if(count($hora_nueva) > 0){
                                if($hora >= $hora_nueva[0]['hora_inicio'] && $hora <= $hora_nueva[0]['hora_fin']){
                                       $estado = "P";
                                }else if($hora > $hora_nueva[0]['hora_fin']){
                                       $estado = "T"; 
                                }
                        }else{
                                $horario = DB::select("select * from horario where horario.estado_activo = 1 and horario.abreviatura = '".((date('H', strtotime($ingreso)) < 13) ? 'IM' : 'IT')."'");

                                if($hora >= $horario[0]['hora_inicio'] && $hora <= $horario[0]['hora_fin']){
                                        $estado = "P";
                                }else if($hora > $horario[0]['hora_fin']){
                                        $estado = "T"; 
                                }
                        }

                        $verificar = Asistencia_model::where('idpersonal', '=', $personal[0]['idpersonal'])
                                                     ->where('idproyecto', '=', $personal[0]['idproyecto'])
                                                     ->where('idcalendario', '=', $calendario[0]['idcalendario'])->get();

                        if(count($verificar) > 0){
                                $abreviatura = (count($hora_nueva) > 0) ? $hora_nueva[0]['abreviatura'] : $horario[0]['abreviatura'];

                                if($verificar[0]['abre_asistencia'] == $abreviatura){
                                        $resp = array('code' => 3, 'data' => array(
                                                'personal' => $personal,
                                                'foto' => $foto,
                                                'asistencia' => $verificar));
                                }else{
                                        $asistencia = new Asistencia_model;
                                        $asistencia->fecha_hora = $ingreso;
                                        $asistencia->abre_asistencia = (count($hora_nueva) > 0) ? $hora_nueva[0]['abreviatura'] : $horario[0]['abreviatura'];
                                        $asistencia->estado_asistencia = $estado;
                                        $asistencia->idpersonal = $personal[0]['idpersonal'];
                                        $asistencia->idproyecto = $personal[0]['idproyecto'];
                                        $asistencia->idcalendario = $calendario[0]['idcalendario'];

                                        if($asistencia->save()){
                                              $resp = array('code' => (($estado == "P") ? 1 : 2), 'data' => array(
                                                'personal' => $personal,
                                                'estado' => $estado,
                                                'foto' => $foto,
                                                'asistencia' => $asistencia,
                                                'horario' => (count($hora_nueva) > 0) ? $hora_nueva : $horario));   
                                        }else{
                                              $resp = array('code' => 0);
                                        }
                                }
                        }else{
                                $asistencia = new Asistencia_model;
                                $asistencia->fecha_hora = $ingreso;
                                $asistencia->abre_asistencia = (count($hora_nueva) > 0) ? $hora_nueva[0]['abreviatura'] : $horario[0]['abreviatura'];
                                $asistencia->estado_asistencia = $estado;
                                $asistencia->idpersonal = $personal[0]['idpersonal'];
                                $asistencia->idproyecto = $personal[0]['idproyecto'];
                                $asistencia->idcalendario = $calendario[0]['idcalendario'];

                                if($asistencia->save()){
                                      $resp = array('code' => (($estado == "P") ? 1 : 2), 'data' => array(
                                        'personal' => $personal,
                                        'estado' => $estado,
                                        'foto' => $foto,
                                        'asistencia' => $asistencia,
                                        'horario' => (count($hora_nueva) > 0) ? $hora_nueva : $horario));   
                                }else{
                                      $resp = array('code' => 0);
                                }
                        }


                }else{
                	$resp = array('code' => 0);
                }

                echo json_encode($resp);
	}
}