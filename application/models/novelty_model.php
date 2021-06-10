<?php
    class Novelty_model extends CI_Model {
        // inicio conexion base de datos 
        public function __construct()
        {
            $this->load->database();
            $this->load->library('session');
           
        }
        // fin conexion base de datos 

        

        // inicio extraccion de los datos de novedad
        public function get_noveltyA()
            {

                $rol = $this->session->userdata('rol_des');
                $id = $this->session->userdata('usu_id');

                if($rol == "lider" || $rol == "colaborador" ){

                    $sql = "SELECT n.nove_id,n.nove_fecha,c.col_login_num,n.nove_obser_descripcion,tb.tip_obser_nom,c.col_nom,s.seccion_nom,n.nove_hora_ini,n.nove_hora_fin,n.nove_tiem_total,cg.cate_nom,t.tip_inci_nom,e.est_des,n.seccion_id_fk,n.col_id_fk,n.tip_inci_id_fk,n.est_id_fk,n.cate_id_fk 
                    FROM ir_novedad n,ir_colaborador c,ir_seccion s, ir_tipo_incidencia t,ir_estado e,ir_categoria cg, ir_tipo_observacion tb 
                    WHERE n.col_id_fk=c.col_id 
                    AND n.seccion_id_fk=s.seccion_id 
                    AND t.tip_inci_id = n.tip_inci_id_fk 
                    AND cg.cate_id = n.cate_id_fk 
                    AND n.est_id_fk=e.est_id 
                    AND n.tip_obser_id_fk = tb.tip_obser_id 
                    AND n.usu_id_fk= $id 
                    AND n.est_id_fk= 1 
                    AND n.tip_est_id_fk = 1";      
                    $query = $this->db->query($sql);
                    return $query->result();

                }else{

                    $sql = "SELECT n.nove_id,n.nove_fecha,c.col_login_num,n.nove_obser_descripcion,tb.tip_obser_nom,c.col_nom,s.seccion_nom,n.nove_hora_ini,n.nove_hora_fin,n.nove_tiem_total,cg.cate_nom,t.tip_inci_nom,e.est_des,n.seccion_id_fk,n.col_id_fk,n.tip_inci_id_fk,n.est_id_fk,n.cate_id_fk 
                    FROM ir_novedad n,ir_colaborador c,ir_seccion s, ir_tipo_incidencia t,ir_estado e,ir_categoria cg, ir_tipo_observacion tb 
                    WHERE n.col_id_fk=c.col_id 
                    AND n.seccion_id_fk=s.seccion_id 
                    AND t.tip_inci_id = n.tip_inci_id_fk 
                    AND cg.cate_id = n.cate_id_fk 
                    AND n.est_id_fk=e.est_id 
                    AND n.tip_obser_id_fk = tb.tip_obser_id 
                    AND n.est_id_fk= 1 
                    AND n.tip_est_id_fk = 1";      
                    $query = $this->db->query($sql);
                    return $query->result();
                }
               
 
            }

            public function get_noveltyC()
            {

                $rol = $this->session->userdata('rol_des');
                $id = $this->session->userdata('usu_id');

                if($rol == "lider" || $rol == "colaborador" ){

                    $sql = "SELECT n.nove_id,n.nove_fecha,c.col_login_num,n.nove_obser_descripcion,tb.tip_obser_nom,c.col_nom,s.seccion_nom,n.nove_hora_ini,n.nove_hora_fin,n.nove_tiem_total,cg.cate_nom,t.tip_inci_nom,e.est_des,n.seccion_id_fk,n.col_id_fk,n.tip_inci_id_fk,n.est_id_fk,n.cate_id_fk 
                    FROM ir_novedad n,ir_colaborador c,ir_seccion s, ir_tipo_incidencia t,ir_estado e,ir_categoria cg, ir_tipo_observacion tb 
                    WHERE n.col_id_fk=c.col_id 
                    AND n.seccion_id_fk=s.seccion_id 
                    AND t.tip_inci_id = n.tip_inci_id_fk 
                    AND cg.cate_id = n.cate_id_fk 
                    AND n.est_id_fk=e.est_id 
                    AND n.tip_obser_id_fk = tb.tip_obser_id 
                    AND n.usu_id_fk= $id 
                    AND n.est_id_fk= 2 
                    AND n.tip_est_id_fk = 1";      
                    $query = $this->db->query($sql);
                    return $query->result();

                }else{

                    $sql = "SELECT n.nove_id,n.nove_fecha,c.col_login_num,n.nove_obser_descripcion,tb.tip_obser_nom,c.col_nom,s.seccion_nom,n.nove_hora_ini,n.nove_hora_fin,n.nove_tiem_total,cg.cate_nom,t.tip_inci_nom,e.est_des,n.seccion_id_fk,n.col_id_fk,n.tip_inci_id_fk,n.est_id_fk,n.cate_id_fk 
                    FROM ir_novedad n,ir_colaborador c,ir_seccion s, ir_tipo_incidencia t,ir_estado e,ir_categoria cg, ir_tipo_observacion tb 
                    WHERE n.col_id_fk=c.col_id 
                    AND n.seccion_id_fk=s.seccion_id 
                    AND t.tip_inci_id = n.tip_inci_id_fk 
                    AND cg.cate_id = n.cate_id_fk 
                    AND n.est_id_fk=e.est_id 
                    AND n.tip_obser_id_fk = tb.tip_obser_id 
                    AND n.est_id_fk= 2 
                    AND n.tip_est_id_fk = 1";      
                    $query = $this->db->query($sql);
                    return $query->result();

                }
            }

            // fin extraccion de los datos de novedad

            public function get_collaborator()
            {
                
            $sql = "SELECT * FROM ir_colaborador where tip_est_id_fk = 1";
            $query = $this->db->query($sql);
            return $query->result_array();
            }

            public function get_seccion()
            {
                
            $sql = "SELECT * FROM ir_seccion where tip_est_id_fk = 1 ";
            $query = $this->db->query($sql);
            return $query->result_array();
 
            }

            public function get_category(){

            $sql = "SELECT * FROM ir_categoria where tip_est_id_fk = 1 ";
            $query = $this->db->query($sql);
            return $query -> result_array();  

            }

            public function get_typeincident($cate_id)
            {
                
            $sql = "SELECT * FROM ir_tipo_incidencia where tip_est_id_fk = 1 AND cate_id_fk = $cate_id";
            $query = $this->db->query($sql);
            return $query -> result();
 
            }

            // inicio de inserccion de agente

            public function saveNovelty($data)
            {
                return $this->db->insert('ir_novedad',$data);
            }

            // fin de inserccion de agente

        
            // inicio de codigo que traer datos al editar de novedad
            public function get_edit_novelty($nove_id)
            {
                
            $sql = "SELECT n.nove_id,n.nove_fecha,c.col_login_num,c.col_nom,s.seccion_nom,n.nove_obser_descripcion,ti.tip_obser_nom,n.nove_hora_ini,n.nove_hora_fin,n.nove_tiem_total,cg.cate_nom,t.tip_inci_nom,e.est_des,n.seccion_id_fk,n.col_id_fk,n.tip_inci_id_fk,n.est_id_fk,n.cate_id_fk,n.tip_obser_id_fk FROM ir_novedad n,ir_colaborador c,ir_seccion s, ir_tipo_incidencia t,ir_estado e,ir_categoria cg,ir_tipo_observacion ti 
            WHERE n.col_id_fk=c.col_id 
            and n.seccion_id_fk=s.seccion_id 
            AND t.tip_inci_id = n.tip_inci_id_fk 
            AND cg.cate_id = n.cate_id_fk 
            AND ti.tip_obser_id = n.tip_obser_id_fk 
            AND n.est_id_fk=e.est_id 
            AND n.nove_id = $nove_id";
            $query = $this->db->query($sql);
            return $query->row();

            } 

            public function editarNovelty($data)
            {
                $this->db->where('nove_id',$data['nove_id']);
                return $this->db->update('ir_novedad',$data);
                
                
            }
            // fin de codigo que traer datos al editar de novedad


            public function eliminar_novelty($data)
            {
                $this->db->where('nove_id',$data['nove_id']);
                $this->db->set('tip_est_id_fk',$data['tip_est_id_fk']);
                return $this->db->update('ir_novedad',$data);
                
            }

            public function getuserinfo($id){

                $sql ="SELECT usu_nom,usu_ape,usu_correo FROM ir_usuario WHERE usu_id = $id";
                $query = $this->db->query($sql);
                return $query->result_array();
            }

            public function getobservacion(){

                $sql ="SELECT * FROM ir_tipo_observacion";
                $query = $this->db->query($sql);
                return $query->result_array();
            }



            
    }
    
?>