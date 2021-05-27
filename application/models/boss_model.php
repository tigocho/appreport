<?php
    class Boss_model extends CI_Model {
       // inicio conexion base de datos 
            public function __construct()
            {
                $this->load->database();
            }
        // fin conexion base de datos 

        // inicio extraccion de los datos de jefes
            public function get_boss()
            {  
            $sql = "SELECT * FROM ir_jefe WHERE tip_est_id_fk =1 ";
            $query = $this->db->query($sql);
            return $query->result();
            }
        // fin extraccion de los datos de jefes

            public function saveBoss($data)
            {
                return $this->db->insert('ir_jefe',$data);
            }

            public function editarBoss($data)
            {
                $this->db->where('jefe_id',$data['jefe_id']);
                return $this->db->update('ir_jefe',$data);
            }

            public function eliminar_boss($data)
            {
                $this->db->where('jefe_id',$data['jefe_id']);
                $this->db->set('tip_est_id_fk',$data['tip_est_id_fk']);
                return $this->db->update('ir_jefe',$data);
            }

    }
    
?>