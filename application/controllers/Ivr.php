<?php
class Ivr extends CI_Controller
{

  // conexion a los helpers y modelos necesarios
  public function __construct()
  {
    parent::__construct();
    $this->load->model('ivr_model');
    $this->load->helper('url_helper');
    $this->load->library('session');
    if (!$this->session->userdata('login')) {
      redirect(base_url());
    }
  }

  //función que genera la pantalla principal de la configuración de la información del IVR
  public function index()
  {
    $data['title'] = "Configuración IVR";
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/narbar');
    $this->load->view('ivr/index', $data);
    $this->load->view('templates/footer');
  }

  //retorna toda la info traida del modelo
  public function getInfoClinicas()
  {
    echo json_encode($this->ivr_model->getInfoClinicas());
  }

  //edita un registro con el data ingresado en el modal
  public function editar_info_clinicas(){
    $data = $this->input->post();

    $data = array(
      'inf_cli_id' => trim($data['inf_cli_id']),
      'inf_cli_cod_esp' => trim($data['inf_cli_cod_esp']),
      'inf_cli_cedula_medico' => trim($data['inf_cli_cedula_medico']),
      'inf_cli_nomb_esp' => trim($data['inf_cli_nomb_esp']),
      'inf_cli_nomb_medico' => trim($data['inf_cli_nomb_medico']),
      'inf_cli_lugar_facturacion' => trim($data['inf_cli_lugar_facturacion']),
      'inf_cli_lugar_atencion' => trim($data['inf_cli_lugar_atencion']),
      'inf_cli_observacion' => trim($data['inf_cli_observacion']),
      'inf_cli_validacion' => trim($data['inf_cli_validacion']),
    );
    $response = $this->ivr_model->editar_info_clinicas($data);

    if ($response) {
      echo json_encode("Se actualizó correctamente la información!");
    }
  }
}

?>


