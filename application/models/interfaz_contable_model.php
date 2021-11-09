<?php
class Interfaz_contable_model extends CI_Model
{
  // conexion base de datos 
  public function __construct()
  {
    
    parent::__construct();
    $this->db =$this->load->database('gochotest', TRUE);
    // $this->db =$this->load->database('gocho', TRUE);
    $this->load->library('session');
  }

  //realiza un update a uno de los registros de la tabla info_clinicas que cumpla las condiciones dadas
  public function getClinicas(){
    $this->db->select("cod_empr, nom_empr, nro_cuen");
    $this->db->from("srvg8.kactus.dbo.gn_empre");
    $this->db->where("IND_ESTA", "a");
    $query = $this->db->get();
    return $query->result();
  }

  public function getClinicasRosales(){
    $this->db->select("cod_empr, nom_empr, nro_cuen");
    $this->db->from('vtdomainosp01.kactus.dbo.gn_empre');
    $this->db->where("IND_ESTA", "a");
    $query = $this->db->get();
    return $query->result();
  }

  public function registrosPendientes($clinica_id){
    $this->db->select('NM_NCMOV.NRO_DOCU');
    // Si la clínica es 21 quiere decir que es Rosales, sin embargo a nivel de consulta se debe de cambiar el
    // clinica_id por 1
    if($clinica_id == 21) {
      $clinica_id = 1;
      $this->db->from('vtdomainosp01.kactus.dbo.NM_NCMOV');
    } else {
      $this->db->from('srvg8.kactus.dbo.NM_NCMOV');
    }
    $this->db->where("EST_MOVI", "P");
    $this->db->where("COD_EMPR", $clinica_id);
    return $this;
    $query = $this->db->get();
    return $query->result();
  }

  public function consultarRegistrosPendientes($clinica_id) {
    $query = $this->registrosPendientes($clinica_id);
    $query->db->select('count(*) as cantidad');
    $query->db->group_by("NRO_DOCU");
    $consulta = $query->db->get();
    return $consulta->result();
  }

  public function obtenerCantidadRegistrosPendientes($clinica_id) {
    $query = $this->registrosPendientes($clinica_id);
    $consulta = $query->db->get();
    return $consulta->num_rows();
  }

  public function consultarDebitoCredito($clinica_id) {
    $this->db->select_sum("val_tran");
    $this->db->select("nat_tran");
    // Si la clínica es 21 quiere decir que es Rosales, sin embargo a nivel de consulta se debe de cambiar el
    // clinica_id por 1
    if($clinica_id == 21) {
      $clinica_id = 1;
      $this->db->from('vtdomainosp01.kactus.dbo.NM_NCMOV');
    } else {
      $this->db->from('srvg8.kactus.dbo.NM_NCMOV');
    }
    $this->db->where("est_movi", "p");
    $this->db->where("cod_empr", $clinica_id);
    $this->db->group_by("nat_tran");
    $query = $this->db->get();
    return $query->result();
  }

  public function consultarMesesRegistros($clinica_id) {
    $this->db->select('NM_NCMOV.fec_proc');
    $this->db->select('count(*) as cantidad_mes');
    if($clinica_id == 21) {
      $clinica_id = 1;
      $this->db->from('vtdomainosp01.kactus.dbo.NM_NCMOV');
    } else {
      $this->db->from('srvg8.kactus.dbo.NM_NCMOV');
    }
    $this->db->where("EST_MOVI", "P");
    $this->db->where("COD_EMPR", $clinica_id);
    $this->db->group_by("fec_proc");
    $query = $this->db->get();
    return $query->result();
  }
}
