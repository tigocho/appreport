<?php
    class Boss_model extends CI_Model {
        // conexion base de datos 
        public function __construct()
        {
            $this->load->database();
        }
      
        // funcion que contiene la consulta que trae las jefes
        public function get_boss()
        {  
        $sql = "SELECT * FROM ir_jefe WHERE tip_est_id_fk =1 ";
        $query = $this->db->query($sql);
        return $query->result();
        }

        // funcion que contiene el sql que guarda la informacion del jefe
        public function saveBoss($data)
        {
            return $this->db->insert('ir_jefe',$data);
        }

        // funcion que contiene el sql que edita la informacion del jefe
        public function editarBoss($data)
        {
            $this->db->where('jefe_id',$data['jefe_id']);
            return $this->db->update('ir_jefe',$data);
        }

        // funcion que contiene el sql que cambia el tipo de estado "elimina" la informacion de un jefe especifica 
        public function eliminar_boss($data)
        {
            $this->db->where('jefe_id',$data['jefe_id']);
            $this->db->set('tip_est_id_fk',$data['tip_est_id_fk']);
            return $this->db->update('ir_jefe',$data);
        }

    }
    
?>