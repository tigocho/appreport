<?php
    class Collaborator_model extends CI_Model {
        
        // conexion base de datos
        public function __construct()
        {
            $this->load->database();
        }

        // funcion que contiene el sql que guarda la informacion del colaborador
        public function getcollaborator()
        { 
        $sql = "SELECT c.col_id,c.col_login_num,c.col_nom,c.col_cargo,a.area_nom,c.id_area_fk FROM ir_colaborador c JOIN ir_area a ON c.id_area_fk = a.area_id WHERE c.tip_est_id_fk = 1";
        $query = $this->db->query($sql);
        return $query -> result();
        }
        
        // funcion que contiene el sql que guarda la informacion del area
        public function getarea()
        {
            $sql = "SELECT * FROM ir_area ";
            $query = $this->db->query($sql);
            return $query->result_array();
            
        }
            
       // funcion que contiene el sql que guarda la informacion del colaborador 
        public function savecollaborator($data)
        {
            return $this->db->insert('ir_colaborador',$data);
        }
    
        // funcion que contiene el sql que edita la informacion del colaborador
        public function editarcollaborator($data)
        {
            $this->db->where('col_id',$data['col_id']);
            return $this->db->update('ir_colaborador',$data);
            
        }

        // funcion que contiene el sql que cambia el tipo de estado "elimina" la informacion de un area especifica 
        public function eliminar_collaborator($data)
        {
            $this->db->where('col_id',$data['col_id']);
            $this->db->set('tip_est_id_fk',$data['tip_est_id_fk']);
            return $this->db->update('ir_colaborador',$data);
        }


       

    }
    
?>