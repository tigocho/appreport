<?php
    class Ivr_model extends CI_Model {
       // conexion base de datos 
        public function __construct()
        {
            $this->load->database();
            $this->load->library('session');
        }

        public function getInfoClinicas(){
            $this->db->select('inf_cli_nomb_esp, inf_cli_nomb_medico, inf_cli_lugar_facturacion, inf_cli_lugar_atencion, inf_cli_observacion, inf_cli_validacion');
            $this->db->from('ir_info_clinicas');
            $query = $this->db->get();
            return $query->result();
        }   
    }
    
?>