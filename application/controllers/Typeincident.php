<?php
    class typeincident extends CI_Controller {
        
        // conexion del controlador a el model y helpers
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
      
        // funcion que muestra en la vista la tabla y su contenido del modulo de tipo de incidencia
        public function index()
        {
            
            $data['title'] = 'Tipo incidencia';
            $data['categoria'] = $this->type_incident_model->get_category();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('typeincident/index',$data);
            $this->load->view('templates/footer');
            
        }

        // funcion que obtiene la informacion para mostrarla en la tabla de tipo de incidencia
        public function gettypeincident()
        {
           echo json_encode($this->type_incident_model->get_typeincident());

        }


       // funcion que envia a el model de typeincident la informacion capturada por el formulario que crea una nuevo tipo de incidencia
        public function createTypeincident()
        {
            $retorno = ["estadoRetorno"=> true,
            "mensaje"=> "paila.",
            "retorno"=> []];

            $data = $this->input->post();
            $response = $this->type_incident_model->saveTypeincident($data);
            if ($response){
                $retorno['mensaje'] = "Informacion de tipo incidencia guardada  correctamente!";
                echo json_encode($retorno);
            }

        }
        
        // funcion que envia a el model de typeincident la informacion capturada por el formulario que edita un tipo de incidencia
        public function editTypeincident()
        {
            $retorno = ["estadoRetorno"=> true,
            "mensaje"=> "paila.",
            "retorno"=> []];

            $data = $this->input->post();
            $response = $this->type_incident_model->editarTypeincident($data);
            if ($response){
                $retorno['mensaje'] = "Informacion de tipo incidencia actualizado correctamente";
                echo json_encode($retorno);
            }

        }

        // funcion que envia a el model de typrincident el id del tipo de incidencia se nesecita "eliminar"
        public function deleteTypeincident()
        {
            $retorno = ["estadoRetorno"=> true,
            "mensaje"=> "paila.",
            "retorno"=> []];

            $data = $this->input->post();
            $response = $this->type_incident_model->eliminar_typeincident($data);
            if ($response){
                $retorno['mensaje'] = " Informacion de tipo incidencia eliminada correctamente!";
                echo json_encode($retorno);
            }

        }

         
        


    }
?>