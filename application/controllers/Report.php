<?php
    class report extends CI_Controller {

        // conexion del controlador a el model y helpers
        public function __construct()
        {
            parent::__construct();
            $this->load->model('report_model');
            $this->load->helper('url_helper');
            $this->load->library('session');
            if (!$this->session->userdata('login')) {
                redirect(base_url());
            }
        }

        // funcion que muestra en la vista la tabla y su contenido de todos los reportes
        public function index()
        {    
            $data['title'] = 'Reportes';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('report/index', $data);
            $this->load->view('templates/footer');  
        }

        // funcion que obtiene la informacion para mostrarla en la tabla donde se encuentra todos los reportes
        public function getnovelty($inicio,$fin)
        {
            echo json_encode($this->report_model->get_novelty($inicio,$fin));
        }



        // funcion que muestra en la vista la tabla y su contenido de los reportes call center
        public function CallCenter()
        {
            $data['title'] = 'Reportes Call Center';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('report/call_center', $data);
            $this->load->view('templates/footer'); 
        }


        // funcion que obtiene la informacion para mostrarla en la tabla de reportes call center
        public function getnoveltycc($inicio,$fin)
        {
           echo json_encode($this->report_model->get_noveltycc($inicio,$fin));
        }


        // funcion que muestra en la vista la tabla y su contenido de los reportes gestion de riesgo
        public function GestionRiesgo()
        {
            $data['title'] = 'Reportes Gestion de Riesgo';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('report/gestion_riesgo', $data);
            $this->load->view('templates/footer'); 
        }



        // funcion que obtiene la informacion para mostrarla en la tabla de reportes gestion de riesgo
        public function getnoveltyGR($inicio,$fin)
        {
           echo json_encode($this->report_model->get_noveltygr($inicio,$fin));
        }


         // funcion que muestra en la vista la tabla y su contenido de los reportes referencias
        public function Referencias()
        {
            $data['title'] = 'Reportes referencia y contrarefencias';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('report/referencias', $data);
            $this->load->view('templates/footer'); 
        }


        // funcion que obtiene la informacion para mostrarla en la tabla de reportes  referencias
        public function getnoveltyRe($inicio,$fin)
        {
           echo json_encode($this->report_model->get_noveltyre($inicio,$fin));
        }


        // funcion que muestra en la vista la tabla y su contenido de los reportes techologia
        public function Tecnologia()
        {
            $data['title'] = 'Reportes tecnologia';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('report/tecnologia', $data);
            $this->load->view('templates/footer'); 
        }



        // funcion que obtiene la informacion para mostrarla en la tabla de reportes  techologia
        public function getnoveltyTi($inicio,$fin)
        {
           echo json_encode($this->report_model->get_noveltyti($inicio,$fin));
        }

        public function guardar_archivo(){

            $target_path = "resources/csv/";
            $target_path = $target_path . basename( $_FILES["file"]["name"]);
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_path);



            
            $fp = fopen ($target_path,"r");
            $contador = 0;
            while ($data = fgetcsv ($fp, 1000, ",")) {

                $contador ++;



                if ($contador>1) {

                    //$inicio= date("Y-m-d H:i:s",$data[2]);

                    $inicio = strtotime(str_replace('/', '-', $data[2]));
                    $fin = strtotime(str_replace('/', '-', $data[3]));
                    //$fin= date("Y-m-d H:i:s",$data[3]);
                    if ($inicio !== false) {
                        /* En caso positivo generamos la fecha */
                        $inicio = date("Y-m-d H:i:s", $inicio);
                      } else {
                        /* En caso negativo hacemos algo con la cadena o lanzamos un error */
                        $inicio = 'ERROR EN FECHA';
                      }

                      if ($fin !== false) {
                        /* En caso positivo generamos la fecha */
                        $fin = date("Y-m-d H:i:s", $fin);
                      } else {
                        /* En caso negativo hacemos algo con la cadena o lanzamos un error */
                        $fin = 'ERROR EN FECHA';
                      }

                    // print_r($inicio)."<br>";
                    // print_r($fin)."<br>";

                    $datos=array(



                        'nove_fecha'=>date("Y-m-d"),

                        'col_nom'=>utf8_encode($data[0]),

                        'seccion_nom'=>utf8_encode($data[1]),

                        'nove_hora_ini'=>$inicio,

                        'nove_hora_fin'=>$fin,

                        'nove_tiempo_total'=>$data[4],

                        'cate_nom'=>utf8_encode($data[5]),

                        'tip_inci_nom'=>utf8_encode($data[6]),

                        'est_des'=>utf8_encode($data[7]),

                        'tip_obser_nom'=>utf8_encode($data[8]),

                        'nove_obser_descripcion'=>utf8_encode($data[9]),

                    );



                   $resp = $this->report_model->save_novelty($datos);

                }

                

            }
            fclose ($fp);

            if ($resp) {
                $retorno['mensaje'] = "Informacion guardada correctamente";
                echo json_encode($retorno);
            }else{
                return false;
            }
           
        }








      
    }
?>