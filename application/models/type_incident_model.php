<?php
    class Type_incident_model extends CI_Model {
       // inicio conexion base de datos 
        public function __construct()
        {
            $this->load->database();
        }
         // fin conexion base de datos 

          // inicio extraccion de los datos tipo incidencia

            public function get_typeincident()
            {
                
            $sql = "SELECT * FROM ir_tipo_incidencia WHERE tip_est_id_fk =1 ";
            $query = $this->db->query($sql);
            return $query -> result();
 
            }
            // fin extraccion de los datos tipo incidencia

            public function get_category()
            {
                
            $sql = "SELECT * FROM ir_categoria WHERE tip_est_id_fk =1 ";
            $query = $this->db->query($sql);
            return $query->result_array();
 
            }


             // inicio de inserccion tipo de incidencia

             public function saveTypeincident($data)
             {
                 return $this->db->insert('ir_tipo_incidencia',$data);
             }
 
              // fin de inserccion tipo de indicencia


              public function editarTypeincident($data)
              {
                  $this->db->where('tip_inci_id',$data['tip_inci_id']);
                  return $this->db->update('ir_tipo_incidencia',$data);
                  
                  
              }

              public function eliminar_typeincident($data)
            {
                $this->db->where('tip_inci_id',$data['tip_inci_id']);
                $this->db->set('tip_est_id_fk',$data['tip_est_id_fk']);
                return $this->db->update('ir_tipo_incidencia',$data);
                
            }


    }


    
?>