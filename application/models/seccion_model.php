<?php
    class Seccion_model extends CI_Model {
       // inicio conexion base de datos 
        public function __construct()
        {
            $this->load->database();
        }
         // fin conexion base de datos 

          // inicio extraccion de los datos secccion

            public function get_seccion()
            {
                
            $sql = "SELECT s.*,a.* FROM ir_seccion s JOIN ir_area a ON s.area_id_fk = a.area_id WHERE s.tip_est_id_fk = 1";
            $query = $this->db->query($sql);
            return $query -> result();
 
            }
            // fin extraccion de los datos seccion

            public function getarea()
            {
            $sql = "SELECT * FROM ir_area ";
            $query = $this->db->query($sql);
            return $query->result_array();
            
            }

             // inicio de inserccion seccion

             public function saveSeccion($data)
             {
                 return $this->db->insert('ir_seccion',$data);
             }
 
              // fin de inserccion seccion


              public function editarSeccion($data)
              {
                  $this->db->where('seccion_id',$data['seccion_id']);
                  return $this->db->update('ir_seccion',$data);
                  
                  
              }

              public function eliminar_seccion($data)
            {
                $this->db->where('seccion_id',$data['seccion_id']);
                $this->db->set('tip_est_id_fk',$data['tip_est_id_fk']);
                return $this->db->update('ir_seccion',$data);
                
            }


    }


    
?>