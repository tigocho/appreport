<?php
    class bug extends CI_Controller {

        // conexion del controlador a el model y helpers
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        

        // funcion que muestra en la vista la tabla y su contenido del modulo de areas
        public function index()
        {  
            $sql = "SELECT nove_id,nove_tiem_total FROM ir_novedad where tip_est_id_fk = 1 ORDER BY nove_id asc" ;
            $query = $this->db->query($sql);
             $horas = $query -> result();

            foreach ( $horas as $hora) {
                $hora_fin = explode(":",$hora->nove_tiem_total);
                if ($hora->nove_tiem_total != null && $hora->nove_tiem_total !="") {
                    if (!isset($hora_fin[2])) {
                        print_r($hora->nove_tiem_total);
                        echo "<br>";
                        $tiempo_total = $hora->nove_tiem_total.":00";
                        $sql = "UPDATE public.ir_novedad SET nove_tiem_total='".$tiempo_total."' WHERE nove_id=".$hora->nove_id;   
                        $query = $this->db->query($sql);
                        
                    }
                }
               
                
            }
        }
       
       

    }

?>


