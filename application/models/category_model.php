<?php
    class Category_model extends CI_Model {
       // inicio conexion base de datos 
            public function __construct()
            {
                $this->load->database();
            }
        // fin conexion base de datos 

        // inicio extraccion de los datos de category
            public function get_category()
            {  
            $sql = "SELECT * FROM ir_categoria WHERE tip_est_id_fk =1 ";
            $query = $this->db->query($sql);
            return $query->result();
            }
        // fin extraccion de los datos de category

        // inicio inseccion de los datos de category
            public function saveCategory($data)
            {
                return $this->db->insert('ir_categoria',$data);
            }
        // inicio inseccion de los datos de category

        // inicio inseccion de los datos de category
            public function editarCategory($data)
            {
                $this->db->where('cate_id',$data['cate_id']);
                return $this->db->update('ir_categoria',$data);
                
            }
        // inicio 'eliminar' de los datos de category
            public function eliminar_category($data)
            {
                $this->db->where('cate_id',$data['cate_id']);
                $this->db->set('tip_est_id_fk',$data['tip_est_id_fk']);
                return $this->db->update('ir_categoria',$data);
            }
        // fin 'eliminar' de los datos de cateegory 





    }
    
?>