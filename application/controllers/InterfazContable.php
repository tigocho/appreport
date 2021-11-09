<?php
  class InterfazContable extends CI_Controller {
    // conexion del controlador a el model y helpers
    public function __construct()
    {
      parent::__construct();
      $this->load->model('interfaz_contable_model');
      $this->load->helper('url_helper');
      $this->load->library('session');
      if (!$this->session->userdata('login')) {
        redirect(base_url());
      }
    }

    public function index(){
      $data['clinicas'] = $this->interfaz_contable_model->getClinicas();
      $data['title'] = "Interfaz contable";
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar');
      $this->load->view('templates/narbar');
      $this->load->view('interfaz_contable/index', $data);
      $this->load->view('templates/footer');
    }

    public function consultar_interfaz_clinica($clinica_id) {
      $data["datos_interfaz_clinica"] = $this->interfaz_contable_model->consultarRegistrosPendientes($clinica_id);
      $data["cantidad_registros_pendientes"] = $this->interfaz_contable_model->obtenerCantidadRegistrosPendientes($clinica_id);
      $data["meses_registros"] = $this->interfaz_contable_model->consultarMesesRegistros($clinica_id);
      $debito_credito = $this->interfaz_contable_model->consultarDebitoCredito($clinica_id);
      $data["debito_credito"] = $debito_credito;
      $data["diferencia"] = "Sin información";
      if(count($debito_credito) > 1) {
        $data["diferencia"] = $debito_credito[0]->val_tran - $debito_credito[1]->val_tran;
      }
      $output = array(
        "html" => $this->load->view("interfaz_contable/include/tabla-registros-pendientes", $data, true),
        "status_code" => 200
      );
      echo json_encode($output);
    }
  }

?>

        