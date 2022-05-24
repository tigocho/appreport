<?php
    class Category_model extends CI_Model {
        
        // conexion base de datos 
        public function __construct()
        {
            $this->load->database();
        }
        
        // funcion que contiene la consulta que trae las categoria
        public function get_category()
        {  
        $sql = "SELECT * FROM ir_categoria WHERE tip_est_id_fk =1 ";
        $query = $this->db->query($sql);
        return $query->result();
        }
        
        // funcion que contiene el sql que guarda la informacion del categoria
        public function saveCategory($data)
        {
            return $this->db->insert('ir_categoria',$data);
        }
        
        // funcion que contiene el sql que edita la informacion del categoria 
        public function editarCategory($data)
        {
            $this->db->where('cate_id',$data['cate_id']);
            return $this->db->update('ir_categoria',$data);
            
        }

        // funcion que contiene el sql que cambia el tipo de estado "elimina" la informacion de un categoria especifica 
        public function eliminar_category($data)
        {
            $this->db->where('cate_id',$data['cate_id']);
            $this->db->set('tip_est_id_fk',$data['tip_est_id_fk']);
            return $this->db->update('ir_categoria',$data);
        }
    





    }
    
?>
