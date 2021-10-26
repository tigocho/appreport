<?php
class Ivr_model extends CI_Model
{
  // conexion base de datos 
  public function __construct()
  {
    $this->load->database();
    $this->load->library('session');
  }

  //retorna todos los registros de la tabla info_clinicas
  public function getInfoClinicas()
  {
    $this->db->select('*');
    $this->db->from('ir_info_clinicas');
    $query = $this->db->get();
    return $query->result();
  }

  //realiza un update a uno de los registros de la tabla info_clinicas que cumpla las condiciones dadas
  public function editar_info_clinicas($data){
    $this->db->where('inf_cli_id', $data['inf_cli_id']);
    $this->db->where('inf_cli_cod_esp', $data['inf_cli_cod_esp']);
    $this->db->where('inf_cli_cedula_medico', $data['inf_cli_cedula_medico']);
    return $this->db->update('ir_info_clinicas', $data);
  }
}
