<?php
    class Type_incident_model extends CI_Model {
       
       // conexion base de datos 
        public function __construct()
        {
            $this->load->database();
        }
         
        // funcion que contiene la consulta que trae los tipos de incidencias
        public function get_typeincident()
        {
        $sql = "SELECT t.*,c.cate_nom FROM ir_tipo_incidencia t LEFT JOIN ir_categoria c ON t.cate_id_fk = c.cate_id WHERE t.tip_est_id_fk =1";
        $query = $this->db->query($sql);
        return $query -> result();

        }

        // funcion que contiene la consulta que trae las categorias
        public function get_category()
        {
        $sql = "SELECT * FROM ir_categoria WHERE tip_est_id_fk =1 ";
        $query = $this->db->query($sql);
        return $query->result_array();
        }

        // funcion que contiene el sql que guarda la informacion de los tipos de incidencias
        public function saveTypeincident($data)
        {
            return $this->db->insert('ir_tipo_incidencia',$data);
        }
 
        // funcion que contiene el sql que edita la informacion de los tipos de incidencias
        public function editarTypeincident($data)
        {
            $this->db->where('tip_inci_id',$data['tip_inci_id']);
            return $this->db->update('ir_tipo_incidencia',$data);
            
            
        }

          // funcion que contiene el sql que cambia el tipo de estado "elimina" la informacion de un tipo de incidencia especifica 
        public function eliminar_typeincident($data)
        {
            $this->db->where('tip_inci_id',$data['tip_inci_id']);
            $this->db->set('tip_est_id_fk',$data['tip_est_id_fk']);
            return $this->db->update('ir_tipo_incidencia',$data);
            
        }


    }


    
?>