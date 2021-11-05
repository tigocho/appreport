<?php
    class Report_model extends CI_Model {
       // conexion base de datos 
        public function __construct()
        {
            $this->load->database();
            $this->load->library('session');
        }

        // funcion que contiene la consulta que trae las novedades para todos los reportes
        public function get_novelty($inicio,$fin)
        {
                $sql = "SELECT n.nove_id,n.nove_fecha,c.col_login_num,c.col_nom,s.seccion_nom,n.nove_hora_ini,n.nove_hora_fin,n.nove_tiem_total,cg.cate_nom,t.tip_inci_nom,e.est_des,tb.tip_obser_nom,n.nove_obser_descripcion 
                FROM ir_novedad n,ir_colaborador c,ir_seccion s, ir_tipo_incidencia t,ir_estado e,ir_categoria cg, ir_tipo_observacion tb 
                WHERE n.col_id_fk=c.col_id 
                AND n.seccion_id_fk=s.seccion_id 
                AND t.tip_inci_id = n.tip_inci_id_fk 
                AND cg.cate_id = n.cate_id_fk 
                AND n.est_id_fk=e.est_id 
                AND n.tip_obser_id_fk = tb.tip_obser_id 
                AND n.tip_est_id_fk = 1
                AND n.nove_fecha >= '$inicio'
                AND n.nove_fecha <= '$fin'";      
                $query = $this->db->query($sql);
                return $query->result();

        }

         // funcion que contiene la consulta que trae las novedades para reportes call center
        public function get_noveltyCC($inicio,$fin)
        {
                $sql = "SELECT n.nove_id,n.nove_fecha,c.col_login_num,c.col_nom,s.seccion_nom,n.nove_hora_ini,n.nove_hora_fin,n.nove_tiem_total,cg.cate_nom,t.tip_inci_nom,e.est_des,tb.tip_obser_nom,n.nove_obser_descripcion 
                FROM ir_novedad n,ir_colaborador c,ir_seccion s, ir_tipo_incidencia t,ir_estado e,ir_categoria cg, ir_tipo_observacion tb, ir_area a 
                WHERE n.col_id_fk=c.col_id 
                AND n.seccion_id_fk=s.seccion_id 
                AND t.tip_inci_id = n.tip_inci_id_fk 
                AND cg.cate_id = n.cate_id_fk 
                AND n.est_id_fk=e.est_id 
                AND n.tip_obser_id_fk = tb.tip_obser_id 
                AND s.area_id_fk = a.area_id 
                AND a.area_nom ='CALL CENTER' 
                AND n.tip_est_id_fk = 1
                AND n.nove_fecha >= '$inicio'
                AND n.nove_fecha <= '$fin'";      
                $query = $this->db->query($sql);
                return $query->result();
        }

        // funcion que contiene la consulta que trae las novedades para reportes gestion de riesgo
        public function get_noveltygr($inicio,$fin)
        {
                $sql = "SELECT n.nove_id,n.nove_fecha,c.col_login_num,c.col_nom,s.seccion_nom,n.nove_hora_ini,n.nove_hora_fin,n.nove_tiem_total,cg.cate_nom,t.tip_inci_nom,e.est_des,tb.tip_obser_nom,n.nove_obser_descripcion 
                FROM ir_novedad n,ir_colaborador c,ir_seccion s, ir_tipo_incidencia t,ir_estado e,ir_categoria cg, ir_tipo_observacion tb, ir_area a 
                WHERE n.col_id_fk=c.col_id 
                AND n.seccion_id_fk=s.seccion_id 
                AND t.tip_inci_id = n.tip_inci_id_fk 
                AND cg.cate_id = n.cate_id_fk 
                AND n.est_id_fk=e.est_id 
                AND n.tip_obser_id_fk = tb.tip_obser_id 
                AND s.area_id_fk = a.area_id 
                AND a.area_nom ='EVITABILIDAD' 
                AND n.tip_est_id_fk = 1
                AND n.nove_fecha >= '$inicio'
                AND n.nove_fecha <= '$fin'";      
                $query = $this->db->query($sql);
                return $query->result();
        }

        // funcion que contiene la consulta que trae las novedades para reportes referencias
        public function get_noveltyre($inicio,$fin)
        {
                $sql = "SELECT n.nove_id,n.nove_fecha,c.col_login_num,c.col_nom,s.seccion_nom,n.nove_hora_ini,n.nove_hora_fin,n.nove_tiem_total,cg.cate_nom,t.tip_inci_nom,e.est_des,tb.tip_obser_nom,n.nove_obser_descripcion 
                FROM ir_novedad n,ir_colaborador c,ir_seccion s, ir_tipo_incidencia t,ir_estado e,ir_categoria cg, ir_tipo_observacion tb, ir_area a 
                WHERE n.col_id_fk=c.col_id 
                AND n.seccion_id_fk=s.seccion_id 
                AND t.tip_inci_id = n.tip_inci_id_fk 
                AND cg.cate_id = n.cate_id_fk 
                AND n.est_id_fk=e.est_id 
                AND n.tip_obser_id_fk = tb.tip_obser_id 
                AND s.area_id_fk = a.area_id 
                AND a.area_nom ='REFERENCIA/CONTRAREFERENCIA' 
                AND n.tip_est_id_fk = 1
                AND n.nove_fecha >= '$inicio'
                AND n.nove_fecha <= '$fin'";      
                $query = $this->db->query($sql);
                return $query->result();

        }

        // funcion que contiene la consulta que trae las novedades para reportes techologia
        public function get_noveltyti($inicio,$fin)
        {
                $sql = "SELECT n.nove_id,n.nove_fecha,c.col_login_num,c.col_nom,s.seccion_nom,n.nove_hora_ini,n.nove_hora_fin,n.nove_tiem_total,cg.cate_nom,t.tip_inci_nom,e.est_des,tb.tip_obser_nom,n.nove_obser_descripcion 
                FROM ir_novedad n,ir_colaborador c,ir_seccion s, ir_tipo_incidencia t,ir_estado e,ir_categoria cg, ir_tipo_observacion tb, ir_area a 
                WHERE n.col_id_fk=c.col_id 
                AND n.seccion_id_fk=s.seccion_id 
                AND t.tip_inci_id = n.tip_inci_id_fk 
                AND cg.cate_id = n.cate_id_fk 
                AND n.est_id_fk=e.est_id 
                AND n.tip_obser_id_fk = tb.tip_obser_id 
                AND s.area_id_fk = a.area_id 
                AND a.area_nom ='TECNOLOGIA' 
                AND n.tip_est_id_fk = 1
                AND n.nove_fecha >= '$inicio'
                AND n.nove_fecha <= '$fin'";      
                $query = $this->db->query($sql);
                return $query->result();
        }


        public function  save_novelty($datos){




                $query = $this->db->query("select col_id FROM ir_colaborador where col_nom LIKE '%".trim($datos['col_nom'])."%'");
                $colaborador = $query->row_array();
                $query = $this->db->query("select seccion_id FROM ir_seccion where seccion_nom = '".trim($datos['seccion_nom'])."'");
                $seccion = $query->row_array();
                $query = $this->db->query("select cate_id FROM ir_categoria where cate_nom LIKE '%".trim($datos['cate_nom'])."%'");
                $category = $query->row_array();
                $query = $this->db->query("select tip_inci_id FROM ir_tipo_incidencia where tip_inci_nom LIKE '%".trim($datos['tip_inci_nom'])."%'");
                $tipo_inci = $query->row_array();
                $query = $this->db->query("select est_id FROM ir_estado where est_des LIKE '%".trim($datos['est_des'])."%'");
                $estado = $query->row_array();
                $query = $this->db->query("select tip_obser_id FROM ir_tipo_observacion where tip_obser_nom LIKE '%".trim($datos['tip_obser_nom'])."%'");
                $observacion = $query->row_array();
               

                
                $datos=array(

                        'nove_fecha'=>$datos['nove_fecha'],
                        'col_id_fk'=>$colaborador['col_id'],
                        'seccion_id_fk'=>$seccion['seccion_id'],
                        'nove_hora_ini'=>$datos['nove_hora_ini'],
                        'nove_hora_fin'=>$datos['nove_hora_fin'],
                        'nove_tiem_total'=>$datos['nove_tiempo_total'],
                        'cate_id_fk'=>$category['cate_id'],
                        'tip_inci_id_fk'=>$tipo_inci['tip_inci_id'],
                        'est_id_fk'=>$estado['est_id'],
                        'tip_obser_id_fk'=>$observacion['tip_obser_id'],
                        'nove_obser_descripcion'=>$datos['nove_obser_descripcion'],
                        'tip_est_id_fk'=>'1',
                        'usu_id_fk'=>$this->session->userdata('usu_id'), 
                    );
                    return $this->db->insert('ir_novedad',$datos);

        }

    }
    
?>