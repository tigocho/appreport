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
    $data['clinicas'] = $this->ivr_model->get_clinicas();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/narbar');
    $this->load->view('ivr/index', $data);
    $this->load->view('templates/footer');
  }

  //retorna toda la info traida del modelo
  public function getInfoClinicas($cli_id)
  { 
    echo json_encode($this->ivr_model->get_info_clinicas($cli_id));
  }

  public function crearRegistro(){
    $data = $this->input->post();
    $data = array(
			"inf_cli_id" => $this->input->post("id_cli"),
			"inf_cli_cod_esp" => $this->input->post("id_esp"),
			"inf_cli_cedula_medico" => $this->input->post("id_medico"),
			"inf_cli_nomb_esp" => $this->input->post("nomb_esp"),
			"inf_cli_nomb_medico" => $this->input->post("nomb_medico"),
			"inf_cli_lugar_facturacion" => $this->input->post("lugar_facturacion"),
			"inf_cli_lugar_atencion" => $this->input->post("lugar_atencion"),
			"inf_cli_observacion" => $this->input->post("observacion"),
			"inf_cli_validacion" => $this->input->post("validacion"),
		);

    if($this->ivr_model->buscar_registro($data)){
      echo json_encode(array("status_code" => 401,"mensaje" => "El registro que ingresó ya existe."));
    } else{
      $this->ivr_model->crear_registro($data);
      echo json_encode(array("status_code" => 200,"mensaje" => "Registro guardado exitosamente."));
    } 
  
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
      echo json_encode("¡Se actualizó correctamente la información!");
    }
  }

  //elimina un registro de la base de datos
  public function eliminarRegistro(){
    $data = $this->input->post();
    
    $data = array(
      'inf_cli_id' => trim($data['cli_id']),
      'inf_cli_cod_esp' => trim($data['cod_esp']),
      'inf_cli_cedula_medico' => trim($data['cedula_medico']),
      'inf_cli_nomb_esp' => trim($data['nombre_especialidad']),
      'inf_cli_nomb_medico' => trim($data['nombre_medico']),
      'inf_cli_lugar_facturacion' => trim($data['lugar_facturacion']),
      'inf_cli_lugar_atencion' => trim($data['lugar_atencion']),
      'inf_cli_observacion' => trim($data['obseracion']),
      'inf_cli_validacion' => trim($data['validacion']),
    );
  
    $response = $this->ivr_model->eliminar_registro($data);
    if ($response) {
      $registroEliminado = implode(",", $data);
      log_message('error','registro eliminado: '.$registroEliminado);
      echo json_encode("¡Registro eliminado correctamente!");
    }
  }

  //agrega nuevos registros al ivr basándose en un archivo csv que ingresa el usuario
  public function cargarDatosSubidos(){
    $RegistrosNuevos = $_FILES['archivoRegistrosNuevos'];//carga el archivo subido
    $RegistrosNuevos = file_get_contents($RegistrosNuevos['tmp_name']);//captura el nombre del archivo temporal y saca su contenido
    $RegistrosNuevos = explode("\n", $RegistrosNuevos);//divide el contenido en una lista
    $RegistrosNuevos = array_filter($RegistrosNuevos);

    foreach($RegistrosNuevos as $RegistroNuevo) {
      if(strlen($RegistroNuevo)<20){//si elregistro tiene menos de 20 caracteres es una fila vacía en el archivo
        continue;
      } else {
        $RegistroNuevoList[] = explode(";", $RegistroNuevo); //toma un nuevo registro y lo separa en una lista por comas  
      }
    } 

    $data["registros"] = $RegistroNuevoList;

    $output = array(
			"html" => $this->load->view("includes/tabla-info-clinicas-ivr", $data, true),
			"confirmacion" => true
		);

    echo json_encode($output);
  }

  //agrega los registros cargados en documento csv
  public function crearRegistrosCargados(){
    $data = json_decode($_POST['data'], true);
    $existentes = []; 

    $this->db->trans_start();
    //Se iteran los registros y se van agregando uno por uno a la base
    foreach($data as $registro){
      $registroTemp = array(
          'inf_cli_id' => trim($registro['idClinica']),
          'inf_cli_cod_esp' => trim($registro['idEspecialidad']),
          'inf_cli_cedula_medico' => trim($registro['cedulaMedico']),
          'inf_cli_nomb_esp' => trim($registro['nombreEspecialidad']),
          'inf_cli_nomb_medico' => trim($registro['nombreMedico']),
          'inf_cli_lugar_facturacion' => trim($registro['lugarFacturacion']),
          'inf_cli_lugar_atencion' => trim($registro['lugarAtencion']),
          'inf_cli_observacion' => trim($registro['observacion']),
          'inf_cli_validacion' => trim($registro['validacion']),
      );

      //verifica si el registro ya existe
      if($this->ivr_model->buscar_registro($registroTemp)){
        array_push($existentes, $registro['fila']);
        continue;
      } else{
        $this->ivr_model->crear_registro($registroTemp);
      } 
    }
    $cantidadExistentes = count($existentes);

    if($cantidadExistentes>0){
      $this->db->trans_rollback();
    } else {
      $this->db->trans_commit();
    }
    
    $this->db->trans_complete();

    $filasExistentes = implode(",", $existentes);

    if($cantidadExistentes>0){
      echo json_encode(array("status_code" => 401,"mensaje" => "Los registros de las siguientes filas ya existen: \n ", "existentes" => $filasExistentes."\n\n", "mensaje2" => " Por favor modifique o elimine los registros de las filas existentes en su archivo local y carguelo a la plataforma nuevamente."));  
    } else {
      echo json_encode(array("status_code" => 200,"mensaje" => "Los registros se han guardado satisfactoriamente"));  
    }   
  }
 
}



?>


