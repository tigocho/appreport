<?php
    class Area extends CI_Controller {

        //    inicio conexion del controlador a el modal y url helpers
        public function __construct()
        {
            parent::__construct();
            $this->load->model('area_model');
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
            
            $data['title'] = 'Areas';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('area/index', $data);
            $this->load->view('templates/footer');
            
        }
        // fin vista a las novedades

        public function getarea()
        {
           echo json_encode($this->area_model->get_area());

        }



        // inicio de inserccion de area
        public function createArea()
         {
             $retorno = ["estadoRetorno"=> true,
             "mensaje"=> "paila.",
             "retorno"=> []];
  
             $data = $this->input->post();
             $response = $this->area_model->saveArea($data);
             if ($response){
                 $retorno['mensaje'] = "informacion del colaborador guardada correctamente !";
                 echo json_encode($retorno);
             }

         }
         // fin de inserccion de area

         public function editArea()
         {
             $retorno = ["estadoRetorno"=> true,
             "mensaje"=> "paila.",
             "retorno"=> []];
  
             $data = $this->input->post();
             $response = $this->area_model->editararea($data);
             if ($response){
                 $retorno['mensaje'] = "informacion del area actualizada correctamente!";
                 echo json_encode($retorno);
             }

         }


         public function deletearea()
         {
             $retorno = ["estadoRetorno"=> true,
             "mensaje"=> "paila.",
             "retorno"=> []];
  
             $data = $this->input->post();
             $response = $this->area_model->eliminar_area($data);
             if ($response){
                 $retorno['mensaje'] = " informacion de la area ha sido eliminada correctamente!";
                 echo json_encode($retorno);
             }

         }


    }
?>