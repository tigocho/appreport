<?php
    class inicio extends CI_Controller {

        // conexion a los helpers
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url_helper');
            $this->load->library('session');
            if (!$this->session->userdata('login')) {
                redirect(base_url());
            }
        }
        
        // funcion que muestra en el inicio de la aplicacion
        public function index()
        {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('inicio/index');
            $this->load->view('templates/footer');
            
        }
        


    }
?>