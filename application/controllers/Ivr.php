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
  public function editarInfoClinicas(){
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

  //agrega nuevos registros al ivr basándose en un archivo csv que ingresa el usuario
  public function cargarDatosSubidos(){
    $RegistrosNuevos = $_FILES['archivoRegistrosNuevos'];//carga el archivo subido
    $RegistrosNuevos = file_get_contents($RegistrosNuevos['tmp_name']);//captura el nombre del archivo temporal y saca su contenido
    $RegistrosNuevos = explode("\n", $RegistrosNuevos);//divide el contenido en una lista
    $RegistrosNuevos = array_filter($RegistrosNuevos);
 
    foreach($RegistrosNuevos as $RegistroNuevo) {
      $RegistroNuevoList[] = explode(";", $RegistroNuevo); //toma un nuevo registro y lo separa en una lista por comas  
    } 

    $data["registros"] = $RegistroNuevoList;

    $output = array(
			"html" => $this->load->view("includes/tabla-info-clinicas-ivr", $data, true),
			"confirmacion" => true
		);

    echo json_encode($output);
  }

  public function crearRegistrosCargados(){
    $data = $this->input->post();
    // foreach($data as $value => $idClinica){
    //     //$data["codigoEspecialidad"] = $this->input->post("CodigoEspecialidad-".$value);
    //     var_dump($value);
    //     //$this->model->crear_registro($data);
    // }
    return true;
    //echo json_encode($data);

  }
// foreach($this->input->post("idClinica") as $vlaue => $idClinica){
//   $data["codigoEspecialidad"] = $this->input->post("codigoEspecialidad.0")
//   $this->model->crear-registro($data)
// }

}



?>


