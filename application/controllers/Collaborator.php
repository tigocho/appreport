<?php
    class Collaborator extends CI_Controller {

        //    inicio conexion del controlador a el modal y url helpers.
        public function __construct()
        {
            parent::__construct();
            $this->load->model('collaborator_model');
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
            $data['title'] = 'Colaboradores';
            $data['area'] = $this->collaborator_model->getarea();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('collaborator/index', $data);
            $this->load->view('templates/footer');
            
        }
        // fin vista a las novedades

        public function getcollaborator()
        {
             echo json_encode ($this->collaborator_model->getcollaborator());

        }

        // inicio de inserccion de colaborador
        public function createCollaborator()
         {
             $retorno = ["estadoRetorno"=> true,
             "mensaje"=> "paila.",
             "retorno"=> []];
  
             $data = $this->input->post();
             $response = $this->collaborator_model->saveCollaborator($data);
             if ($response){
                 $retorno['mensaje'] = "informacion del colaborador guardada correctamente !";
                 echo json_encode($retorno);
             }

         }
         // fin de inserccion de colaborador


         public function editCollaborator()
         {
             $retorno = ["estadoRetorno"=> true,
             "mensaje"=> "paila.",
             "retorno"=> []];
  
             $data = $this->input->post();
             $response = $this->collaborator_model->editarCollaborator($data);
                

             if ($response){
                 $retorno['mensaje'] = " informacion del colaborador actualizada correctamente!";
                 echo json_encode($retorno);
             }

         }


         public function deleteCollaborator()
         {
             $retorno = ["estadoRetorno"=> true,
             "mensaje"=> "paila.",
             "retorno"=> []];
  
             $data = $this->input->post();
             $response = $this->collaborator_model->eliminar_collaborator($data);
             if ($response){
                 $retorno['mensaje'] = " informacion del colaborador eliminada correctamente!";
                 echo json_encode($retorno);
             }

         }


        

    }
?>
