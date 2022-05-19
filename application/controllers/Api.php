<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

class Api extends RestController
{
  public function __construct() {
    parent::__construct();
		$this->load->library(array('session', 'form_validation'));
    $this->load->model('Report_model');
  }

  public function reporteCallCenter_post(){
    $data = $this->post();
    $rules = $this->getRules();
    require APPPATH . '/helpers/credentials.php';
    if (!$this->form_validation->validar_formulario($data, $rules)) {
			$this->response($this->form_validation->get_ultimo_error(), 400); //bad_request
		}
    if($data["token"] !== $token){
      $this->response("Token no valido", 400); //bad_request
    }
    $fecha_inicio = $data["fecha_inicio"];
    $fecha_fin = $data["fecha_fin"];
    $reporteCallCenter = $this->Report_model->get_noveltycc($fecha_inicio, $fecha_fin);
    $response = true;
    $http_code = $response ? RestController::HTTP_OK : RestController::HTTP_INTERNAL_ERROR;
		$this->response(["mensaje" => "success", "reportes" => $reporteCallCenter], $http_code);
  }

  public function getRules()
	{
		return [
			['field' => 'fecha_inicio', 'label' => 'Fecha de inicio', 'rules' => 'required'],
      ['field' => 'fecha_fin', 'label' => 'Fecha final', 'rules' => 'required'],
      ['field' => 'token', 'label' => 'token', 'rules' => 'required'],
		];
	}
}