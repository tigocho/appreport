<?php
    class Collaborator extends CI_Controller {

        // conexion del controlador a el model y helpers
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
        
        // funcion que muestra en la vista la tabla y su contenido del modulo de colaborador
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
       
        // funcion que obtiene la informacion para mostrarla en la tabla de colaborador
        public function getcollaborator()
        {
            echo json_encode ($this->collaborator_model->getcollaborator());
        }

        // funcion que envia a el model de collaborator la informacion capturada por el formulario que crea una nuevo colaborador
        public function createCollaborator()
        {
            $retorno = ["estadoRetorno"=> true,
            "mensaje"=> "paila.",
            "retorno"=> []];

            $data = $this->input->post();
            $response = $this->collaborator_model->saveCollaborator($data);
            if ($response){
                $retorno['mensaje'] = "Informacion del colaborador guardada correctamente !";
                echo json_encode($retorno);
            }

        }
         
        // funcion que envia a el model de collaborator la informacion capturada por el formulario que edita un colaborador
        public function editCollaborator()
        {
            $retorno = ["estadoRetorno"=> true,
            "mensaje"=> "paila.",
            "retorno"=> []];

            $data = $this->input->post();
            $response = $this->collaborator_model->editarCollaborator($data);
            

            if ($response){
                $retorno['mensaje'] = " Informacion del colaborador actualizada correctamente!";
                echo json_encode($retorno);
            }

        }

        // funcion que envia a el model de collaborator el id del colaborador se nesecita "eliminar"
        public function deleteCollaborator()
        {
            $retorno = ["estadoRetorno"=> true,
            "mensaje"=> "paila.",
            "retorno"=> []];

            $data = $this->input->post();
            $response = $this->collaborator_model->eliminar_collaborator($data);
            if ($response){
                $retorno['mensaje'] = " Informacion del colaborador eliminada correctamente!";
                echo json_encode($retorno);
            }

        }


        

    }
?>
