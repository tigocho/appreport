<?php
    class Collaborator_model extends CI_Model {
       // inicio conexion base de datos 
            public function __construct()
            {
                $this->load->database();
            }
        // fin conexion base de datos 

        // inicio extraccion de los datos de colaborador

            // public function get_collaborator()
            // {  
            // $sql = "SELECT * FROM ir_colaborador ";
            // $query = $this->db->query($sql);
            // return $query->result_array();
            // }

            public function getcollaborator()
            { 
            $sql = "SELECT c.col_id,c.col_login_num,c.col_nom,c.col_cargo,a.area_nom,c.id_area_fk FROM ir_colaborador c JOIN ir_area a ON c.id_area_fk = a.area_id WHERE c.tip_est_id_fk = 1";
            $query = $this->db->query($sql);
            return $query -> result();
            }
        // fin extraccion de los datos de colaborador

        public function getarea()
        {
            $sql = "SELECT * FROM ir_area ";
            $query = $this->db->query($sql);
            return $query->result_array();
            
        }
            

        // inicio de inserccion de colaborador

            public function savecollaborator($data)
            {
                return $this->db->insert('ir_colaborador',$data);
            }
        // fin de inserccion de colaborador

        // inicio de ediccion de colaborador
             public function editarcollaborator($data)
             {
                 $this->db->where('col_id',$data['col_id']);
                 return $this->db->update('ir_colaborador',$data);
                 
             }
        // fin de ediccion de colaborador

        // inicio de 'eliminar' de colaborador
             public function eliminar_collaborator($data)
             {
                 $this->db->where('col_id',$data['col_id']);
                 $this->db->set('tip_est_id_fk',$data['tip_est_id_fk']);
                 return $this->db->update('ir_colaborador',$data);
             }
        // fin de 'eliminar' de colaborador


    }
    
?>