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
        public function Techologia()
        {
            $data['title'] = 'Reportes techologia';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('report/techologia', $data);
            $this->load->view('templates/footer'); 
        }



        // funcion que obtiene la informacion para mostrarla en la tabla de reportes  techologia
        public function getnoveltyTi($inicio,$fin)
        {
           echo json_encode($this->report_model->get_noveltyti($inicio,$fin));
        }
      
    }
?>