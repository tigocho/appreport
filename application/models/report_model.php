<?php
    class Report_model extends CI_Model {
       // conexion base de datos 
        public function __construct()
        {
            $this->load->database();
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

    }
    
?>