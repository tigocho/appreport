<?php
    class typeincident extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('type_incident_model');
            $this->load->helper('url_helper');
            $this->load->library('session');

            if (!$this->session->userdata('login')) {
                redirect(base_url());
            }
        }
      
        public function index()
        {
            
            $data['title'] = 'tipo incidencia';
            $data['categoria'] = $this->type_incident_model->get_category();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('typeincident/index',$data);
            $this->load->view('templates/footer');
            
        }


        public function gettypeincident()
        {
           echo json_encode($this->type_incident_model->get_typeincident());

        }


        // inicio de inserccion  tipo de incidente
        public function createTypeincident()
         {
             $retorno = ["estadoRetorno"=> true,
             "mensaje"=> "paila.",
             "retorno"=> []];
  
             $data = $this->input->post();
             $response = $this->type_incident_model->saveTypeincident($data);
             if ($response){
                 $retorno['mensaje'] = "informacion de tipo incidencia guardada  correctamente!";
                 echo json_encode($retorno);
             }

         }
         // fin de inserccion  tipo de incidente

         public function editTypeincident()
         {
             $retorno = ["estadoRetorno"=> true,
             "mensaje"=> "paila.",
             "retorno"=> []];
  
             $data = $this->input->post();
             $response = $this->type_incident_model->editarTypeincident($data);
             if ($response){
                 $retorno['mensaje'] = "informacion de tipo incidencia actualizado correctamente";
                 echo json_encode($retorno);
             }

         }

         public function deleteTypeincident()
         {
             $retorno = ["estadoRetorno"=> true,
             "mensaje"=> "paila.",
             "retorno"=> []];
  
             $data = $this->input->post();
             $response = $this->type_incident_model->eliminar_typeincident($data);
             if ($response){
                 $retorno['mensaje'] = " informacion de tipo incidencia eliminada correctamente!";
                 echo json_encode($retorno);
             }

         }

         
        


    }
?>