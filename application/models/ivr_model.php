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
  $this->db->where('inf_cli_id', $data['inf_cli_id']);
  $this->db->where('inf_cli_cod_esp', $data['inf_cli_cod_esp']);
  $this->db->where('inf_cli_cedula_medico', $data['inf_cli_cedula_medico']);
  return $this->db->delete('IVR_G8_INFO_CLINICAS');
  }

  //inserta un nuevo registro a la tabla de info_clinicas
  public function crear_registro($data){
    if($this->db->insert("IVR_G8_INFO_CLINICAS", $data)){
      return true;
    } else {
      return false;
    }
  }
}
