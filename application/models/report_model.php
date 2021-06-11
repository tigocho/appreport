<?php
    class Report_model extends CI_Model {
       // inicio conexion base de datos 
        public function __construct()
        {
            $this->load->database();
        }
         // fin conexion base de datos 

          // inicio extraccion de los datos de novedad

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

            // fin extraccion de los datos de novedad     
    }
    
?>