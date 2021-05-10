<?php
    class User_model extends CI_Model {
       // inicio conexion base de datos 
        public function __construct()
        {
            $this->load->database();
        }
         // fin conexion base de datos 

          // inicio extraccion de los datos de usuario

            public function get_user()
            {
                
            $sql = "SELECT u.usu_id,u.usu_num_doc,u.usu_nom,u.usu_nom_two,u.usu_ape,u.usu_ape_two,u.usu_correo,u.usu_contra,r.rol_des FROM ir_usuario u,ir_rol r WHERE u.rol_id_fk = r.rol_id AND u.tip_est_id_fk = 1 ";
            $query = $this->db->query($sql);
            return $query->result();
 
            }
            // fin extraccion de los datos de usuario

            
            public function get_rol()
            {
                
            $sql = "SELECT * FROM ir_rol ";
            $query = $this->db->query($sql);
            return $query->result_array();
 
            }

            public function saveUser($data)
            {
                return $this->db->insert('ir_usuario',$data);
            }

            public function get_edit_user($usu_id)
            {

                $sql="SELECT u.usu_id,u.usu_num_doc,u.usu_nom,u.usu_nom_two,u.usu_ape,u.usu_ape_two,u.usu_correo,u.usu_contra,r.rol_des,u.rol_id_fk FROM ir_usuario u,ir_rol r WHERE u.rol_id_fk = r.rol_id and u.usu_id = $usu_id";
                $query = $this->db->query($sql);
                return $query->result_array();

            }

            public function editarUser($data)
            {
                $this->db->where('usu_id',$data['usu_id']);
                return $this->db->update('ir_usuario',$data);
                
                
            }

            public function eliminar_user($data)
            {
                $this->db->where('usu_id',$data['usu_id']);
                $this->db->set('tip_est_id_fk',$data['tip_est_id_fk']);
                return $this->db->update('ir_usuario',$data);
                
            }





        }





?>