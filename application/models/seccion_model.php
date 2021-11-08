<?php
    class Seccion_model extends CI_Model {
       
        // inicio conexion base de datos 
        public function __construct()
        {
            $this->load->database();
        }
        
        // funcion que contiene la consulta que trae las secciones
        public function get_seccion()
        {
            
        $sql = "SELECT s.*,a.* FROM ir_seccion s JOIN ir_area a ON s.area_id_fk = a.area_id WHERE s.tip_est_id_fk = 1";
        $query = $this->db->query($sql);
        return $query -> result();

        }
       
        // funcion que contiene la consulta que trae las areas
        public function getarea()
        {
        $sql = "SELECT * FROM ir_area ";
        $query = $this->db->query($sql);
        return $query->result_array();
        
        }

        // funcion que contiene el sql que guarda la informacion del secciones
        public function saveSeccion($data)
        {
            return $this->db->insert('ir_seccion',$data);
        }

        // funcion que contiene el sql que edita la informacion del secciones
        public function editarSeccion($data)
        {
            $this->db->where('seccion_id',$data['seccion_id']);
            return $this->db->update('ir_seccion',$data);
        }

         // funcion que contiene el sql que cambia el tipo de estado "elimina" la informacion de un seccion especifica 
        public function eliminar_seccion($data)
        {
            $this->db->where('seccion_id',$data['seccion_id']);
            $this->db->set('tip_est_id_fk',$data['tip_est_id_fk']);
            return $this->db->update('ir_seccion',$data);
        }


    }


    
?>