<?php
class Ivr_model extends CI_Model
{
  // conexion base de datos 
  public function __construct()
  { 
    parent::__construct();
    $this->db =$this->load->database('gocho', TRUE);
    $this->load->library('session');
  }
  
  //retorna las clinicas
  public function get_clinicas(){
    $this->db->select('cli_id, cli_name');
    $this->db->from('IVR_G8_CONEXIONES_CLINICAS');
    $this->db->where('cli_software', 'HOSVITAL');
    $query = $this->db->get();
    return $query->result();
  }

  //retorna todos los registros de la tabla info_clinicas
  public function get_info_clinicas($cli_id){
    if($cli_id == 0){
      $this->db->select('*');
      $this->db->from('IVR_G8_INFO_CLINICAS');
    } else {
			$this->db->select('*');
      $this->db->from('IVR_G8_INFO_CLINICAS');
      $this->db->where('inf_cli_id', $cli_id);
    }
    $query = $this->db->get();
    return $query->result();
  }

  //realiza un update a uno de los registros de la tabla info_clinicas que cumpla las condiciones dadas
  public function editar_info_clinicas($data){
    $this->db->where('inf_cli_id', $data['inf_cli_id']);
    $this->db->where('inf_cli_cod_esp', $data['inf_cli_cod_esp']);
    $this->db->where('inf_cli_cedula_medico', $data['inf_cli_cedula_medico']);
    return $this->db->update('IVR_G8_INFO_CLINICAS', $data);
  }

  public function buscar_registro($data){
    $this->db->select("*");
    $this->db->from("IVR_G8_INFO_CLINICAS");
    $this->db->where('inf_cli_id', $data['inf_cli_id']);
    $this->db->where('inf_cli_cod_esp', $data['inf_cli_cod_esp']);
    $this->db->where('inf_cli_cedula_medico', $data['inf_cli_cedula_medico']);
    if($this->db->get()->num_rows() > 0){
      return true;
    } else {
      return false;
    }
  }

  //busca la tabla default de una clínica
  public function buscar_default($data){
    $this->db->select("*");
    $this->db->from("IVR_G8_INFO_CLINICAS");
    $this->db->where('inf_cli_id', $data['inf_cli_id']);
    $this->db->where('inf_cli_cod_esp', 0);
    $this->db->where('inf_cli_cedula_medico', 0);
    if($this->db->get()->num_rows() > 0){
      return true;
    } else {
      return false;
    }
  }

  //elimina un registro 
  public function eliminar_registro($data){
		// parte donde se elimina el info clinicas
		$this->db->where('inf_cli_id', $data['inf_cli_id']);
		$this->db->where('inf_cli_cod_esp', $data['inf_cli_cod_esp']);
		$this->db->where('inf_cli_cedula_medico', $data['inf_cli_cedula_medico']);
		$info_clinicas_eliminacion = $this->db->delete('IVR_G8_INFO_CLINICAS');
		// parte donde se eliminan los días
		$this->db->where('icd_cli_id', $data['inf_cli_id']);
		$this->db->where('icd_cli_cod_esp', $data['inf_cli_cod_esp']);
		$this->db->where('icd_cli_cedula_medico', $data['inf_cli_cedula_medico']);
		$info_clinicas_dias_eliminacion = $this->db->delete('IVR_G8_INFO_CLINICAS_DIAS');
		if($info_clinicas_eliminacion) {
			log_message("error", "Si se eliminó el info clinicas");
		}
		if($info_clinicas_dias_eliminacion) {
			log_message("error", "Si se eliminó los días");
		}
		return true;
  }

  //inserta un nuevo registro a la tabla de info_clinicas
  public function crear_registro($data){
    if($this->db->insert("IVR_G8_INFO_CLINICAS", $data)){
      return true;
    } else {
      return false;
    }
  }
  //elimina los registros selecionandos 
  public function eliminarRegistrosMultiples($inf_cli_id, $inf_cli_cod_esp, $inf_cli_cedula_medico){
		// parte donde se elimina el info clinicas
    $this->db->where('inf_cli_id', $inf_cli_id);
    $this->db->where('inf_cli_cod_esp', $inf_cli_cod_esp);
    $this->db->where('inf_cli_cedula_medico', $inf_cli_cedula_medico);
		$info_clinicas_eliminacion = $this->db->delete('IVR_G8_INFO_CLINICAS');
		// parte donde se eliminan los días
		$this->db->where('icd_cli_id', $inf_cli_id);
		$this->db->where('icd_cli_cod_esp', $inf_cli_cod_esp);
		$this->db->where('icd_cli_cedula_medico', $inf_cli_cedula_medico);
		$info_clinicas_dias_eliminacion = $this->db->delete('IVR_G8_INFO_CLINICAS_DIAS');
		if($info_clinicas_eliminacion) {
			log_message("error", "Si se eliminó el info clinicas en multiples");
		}
		if($info_clinicas_dias_eliminacion) {
			log_message("error", "Si se eliminó los días en multiples");
		}
		return true;
  }

	public function asignarDias($dias, $data) {
		foreach($dias as $dia) {
			$data_info_cli_dias = array(
				"icd_cli_id" => $data["inf_cli_id"],
				"icd_cli_cod_esp" => $data["inf_cli_cod_esp"],
				"icd_cli_cedula_medico" => $data["inf_cli_cedula_medico"],
				"icd_dia" => $dia,
				"icd_activo" => 1,
				"icd_created_at" => date("Ymd H:i:s"),
				"icd_updated_at" => date("Ymd H:i:s"),
			);
			$result = $this->db->insert("IVR_G8_INFO_CLINICAS_DIAS", $data_info_cli_dias);
		}
		return $result;
	}

	public function actualizarDias($infoDias, $data) {
		try{
			// Actualizamos los días, en caso de que se eliminen algunos, se eliminan
			$this->actualizarDiasDisponibles($data, $infoDias["dias"]);
			$this->db->set("icd_cli_lugar_facturacion", $data["inf_cli_lugar_facturacion"]);
			$this->db->set("icd_cli_lugar_atencion", $data["inf_cli_lugar_atencion"]);
			$this->db->set("icd_cli_observacion", $data["inf_cli_observacion"]);
			$this->db->set("icd_horario_inicio_manana", $infoDias["icd_horario_inicio_manana"]);
			$this->db->set("icd_horario_fin_manana", $infoDias["icd_horario_fin_manana"]);
			// $this->db->set("icd_horario_inicio_tarde", $infoDias["icd_horario_inicio_tarde"]);
			// $this->db->set("icd_horario_fin_tarde", $infoDias["icd_horario_fin_tarde"]);
			$this->db->where("icd_cli_id", $data["inf_cli_id"]);
			$this->db->where("icd_cli_cod_esp", $data["inf_cli_cod_esp"]);
			$this->db->where("icd_cli_cedula_medico", $data["inf_cli_cedula_medico"]);
			$this->db->where("icd_dia", $infoDias["dia_seleccionado"]);
			return $this->db->update('IVR_G8_INFO_CLINICAS_DIAS');
		} catch(PDOException $e) {
			echo  $e->getMessage();
		}
	}

	public function getInfoMedico($cli_id, $cli_cod_esp, $cli_cedula_medico, $dia) {
		$this->db->select("*");
    $this->db->from("IVR_G8_INFO_CLINICAS_DIAS");
		$this->db->where('icd_cli_id', $cli_id);
    $this->db->where('icd_cli_cod_esp', $cli_cod_esp);
    $this->db->where('icd_cli_cedula_medico', $cli_cedula_medico);
    $this->db->where('icd_dia', $dia);
		$query = $this->db->get();
		return $query->row();
	}

	public function getInfoMedicoDias($cli_id, $cli_cod_esp, $cli_cedula_medico) {
		$this->db->select("icd_dia");
    $this->db->from("IVR_G8_INFO_CLINICAS_DIAS");
		$this->db->where('icd_cli_id', $cli_id);
    $this->db->where('icd_cli_cod_esp', $cli_cod_esp);
    $this->db->where('icd_cli_cedula_medico', $cli_cedula_medico);
		$this->db->where('icd_deleted_at IS NULL');
		$query = $this->db->get();
		$diasActHabilitados = $query->result_array();
		$diasMedico = array_map (function($value){
			return $value['icd_dia'];
		} , $diasActHabilitados);
		return $diasMedico;
	}

	public function getInfoGeneralMedico($icd_cli_id, $icd_cli_cod_esp, $icd_cli_cedula_medico) {
		$this->db->select("icd_dia");
    $this->db->from("IVR_G8_INFO_CLINICAS_DIAS");
		$this->db->where('icd_cli_id', $icd_cli_id);
    $this->db->where('icd_cli_cod_esp', $icd_cli_cod_esp);
    $this->db->where('icd_cli_cedula_medico', $icd_cli_cedula_medico);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function actualizarDiasDisponibles($data, $dias) {
		foreach($dias as $dia) {
			// Se busca el día SI SELECCIONADO
			$diaMedico = $this->getInfoMedico($data["inf_cli_id"], $data["inf_cli_cod_esp"], $data["inf_cli_cedula_medico"], $dia);
			if(isset($diaMedico->icd_id)) {
				// En caso de que se encuentre, entonces mirar si estaba eliminado
				if($diaMedico->icd_deleted_at != null) {
					// En caso de que estuviese eliminado, se restaura
					$this->db->set("icd_deleted_at", null);
					$this->db->where("icd_cli_id", $data["inf_cli_id"]);
					$this->db->where("icd_cli_cod_esp", $data["inf_cli_cod_esp"]);
					$this->db->where("icd_cli_cedula_medico", $data["inf_cli_cedula_medico"]);
					$this->db->update('IVR_G8_INFO_CLINICAS_DIAS');
				}
			} else {
				// En caso de que no exista en la tabla aun, se crea
				$data_info_cli_dias = array(
					"icd_cli_id" => $data["inf_cli_id"],
					"icd_cli_cod_esp" => $data["inf_cli_cod_esp"],
					"icd_cli_cedula_medico" => $data["inf_cli_cedula_medico"],
					"icd_dia" => $dia,
					"icd_activo" => 1,
					"icd_created_at" => date("Ymd H:i:s"),
					"icd_updated_at" => date("Ymd H:i:s"),
				);
				$result = $this->db->insert("IVR_G8_INFO_CLINICAS_DIAS", $data_info_cli_dias);
				if($result){
					log_message("error", "Si se creo el nuevo registro");
				}
			}
		}
		// Se mira la información actualmente habilitada
		$infoGeneralMedico = $this->getInfoGeneralMedico($data["inf_cli_id"], $data["inf_cli_cod_esp"], $data["inf_cli_cedula_medico"]);
		// Días actualmente hábilitados
		$diasActHabilitados = array_map (function($value){
			return $value['icd_dia'];
		} , $infoGeneralMedico);
		// Comparamos la información actualmente habilitado contra la que recién se actualizó
		$diasDeshabilitados = array_diff($diasActHabilitados, $dias);
		// Solo va a entrar si existe algún día por deshabilitar
		log_message("error", "estos son los deshabilitados " . implode(",", $diasDeshabilitados));
		if(count($diasDeshabilitados) > 0) {
			$dataActualizar = array(
				'icd_deleted_at' => date("Ymd H:i:s"),
			);
			$where = array(
				'icd_dia' => $diasDeshabilitados
			);
			$this->db->where("icd_cli_id", $data["inf_cli_id"]);
			$this->db->where("icd_cli_cod_esp", $data["inf_cli_cod_esp"]);
			$this->db->where("icd_cli_cedula_medico", $data["inf_cli_cedula_medico"]);
			$this->db->group_start(); // Inicio de agrupación
			$this->db->or_where_in('icd_dia', $where['icd_dia']);
			$this->db->group_end(); // Fin de agrupación
			$this->db->update('IVR_G8_INFO_CLINICAS_DIAS', $dataActualizar);
		}
	}

	public function getInfoDefaultMedico($cli_id, $cli_cod_esp, $cli_cedula_medico) {
		$this->db->select("*");
    $this->db->from("IVR_G8_INFO_CLINICAS");
		$this->db->where('inf_cli_id', $cli_id);
    $this->db->where('inf_cli_cod_esp', $cli_cod_esp);
    $this->db->where('inf_cli_cedula_medico', $cli_cedula_medico);
		$query = $this->db->get();
		return $query->row();
	}

	public function crearRegistroDias($data) {
		if($this->db->insert("IVR_G8_INFO_CLINICAS_DIAS", $data)){
      return true;
    } else {
      return false;
    }
	}

}
