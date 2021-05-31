<?php
    class Seccion extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('seccion_model');
            $this->load->helper('url_helper');
            $this->load->library('session');

            if (!$this->session->userdata('login')) {
                redirect(base_url());
            }
        }
      
        public function index()
        {
            
            $data['title'] = 'Secciones';
            $data['area'] = $this->seccion_model->getarea();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('seccion/index',$data);
            $this->load->view('templates/footer');
            
        }


        public function getseccion()
        {
           echo json_encode($this->seccion_model->get_seccion());

        }


        // inicio de inserccion  seccion
        public function createSeccion()
         {
             $retorno = ["estadoRetorno"=> true,
             "mensaje"=> "paila.",
             "retorno"=> []];
  
             $data = $this->input->post();
             $response = $this->seccion_model->saveSeccion($data);
             if ($response){
                 $retorno['mensaje'] = "Informacion de seccion guardada correctamente!";
                 echo json_encode($retorno);
             }

         }
         // fin de inserccion  tipo de incidente

         public function editSeccion()
         {
             $retorno = ["estadoRetorno"=> true,
             "mensaje"=> "paila.",
             "retorno"=> []];
  
             $data = $this->input->post();
             $response = $this->seccion_model->editarSeccion($data);
             if ($response){
                 $retorno['mensaje'] = "Informacion de seccion actualizado correctamente";
                 echo json_encode($retorno);
             }

         }

         public function deleteSeccion()
         {
             $retorno = ["estadoRetorno"=> true,
             "mensaje"=> "paila.",
             "retorno"=> []];
  
             $data = $this->input->post();
             $response = $this->seccion_model->eliminar_seccion($data);
             if ($response){
                 $retorno['mensaje'] = " Informacion de seccion eliminada correctamente!";
                 echo json_encode($retorno);
             }

         }

    }
?>