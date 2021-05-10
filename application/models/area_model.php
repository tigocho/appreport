<?php
    class Area_model extends CI_Model {
       // inicio conexion base de datos 
        public function __construct()
        {
            $this->load->database();
        }
        // fin conexion base de datos 

        // inicio extraccion de los datos de area
            public function get_area()
            {
                
            $sql = "SELECT * FROM ir_area WHERE tip_est_id_fk =1 ";
            $query = $this->db->query($sql);
            return $query->result();
 
            }
        // fin extraccion de los datos de area

        // inicio inseccion de los datos de area
            public function saveArea($data)
            {
                return $this->db->insert('ir_area',$data);
            }
        // fin inseccion de los datos de area

        // inicio ediccion de los datos de area 
            public function editararea($data)
            {
                $this->db->where('area_id',$data['area_id']);
                return $this->db->update('ir_area',$data);
            }
        // fin ediccion de los datos de area

        // inicio 'eliminar' de los datos de area
            public function eliminar_area($data)
            {
                $this->db->where('area_id',$data['area_id']);
                $this->db->set('tip_est_id_fk',$data['tip_est_id_fk']);
                return $this->db->update('ir_area',$data);
            }
        // fin 'eliminar' de los datos de area


    }
    
?>