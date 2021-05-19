<?php
    class report extends CI_Controller {

        //    inicio conexion del controlador a el modal y url helpers
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
         //    fin conexion del controlador a el modal


        // inicio vista a las novedades
        public function index()
        {
            
            $data['title'] = 'Reportes';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('report/index', $data);
            $this->load->view('templates/footer');
            
        }
        // fin vista a las novedades

        public function getnovelty($inicio,$fin)
         {
            $data = $this->input->post();
            echo json_encode($this->report_model->get_novelty($inicio,$fin));
            
         }
      
    }
?>