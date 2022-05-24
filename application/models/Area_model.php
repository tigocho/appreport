<?php
    class Area_model extends CI_Model {
       
        // conexion base de datos 
        public function __construct()
        { 
            $this->load->database();
        }
       
        // funcion que contiene la consulta que trae las areas
        public function get_area()
        { 
        $sql = "SELECT * FROM ir_area WHERE tip_est_id_fk =1 ";
        $query = $this->db->query($sql);
        return $query->result();
        }
        
        // funcion que contiene el sql que guarda la informacion del area 
        public function saveArea($data)
        {
            return $this->db->insert('ir_area',$data);
        }

        // funcion que contiene el sql que edita la informacion del area 
        public function editararea($data)
        {
            $this->db->where('area_id',$data['area_id']);
            return $this->db->update('ir_area',$data);
        }
        

        // funcion que contiene el sql que cambia el tipo de estado "elimina" la informacion de un area especifica 
        public function eliminar_area($data)
        {
            $this->db->where('area_id',$data['area_id']);
            $this->db->set('tip_est_id_fk',$data['tip_est_id_fk']);
            return $this->db->update('ir_area',$data);
        }
        

    }
    
?>
