<?php
    class Area extends CI_Controller {

        // conexion del controlador a el model y helpers
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
        

        // funcion que muestra en la vista la tabla y su contenido del modulo de areas
        public function index()
        {  
            $data['title'] = 'Areas';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('area/index', $data);
            $this->load->view('templates/footer'); 
        }
       
        // funcion que obtiene la informacion para mostrarla en la tabla de areas
        public function getarea()
        {
           echo json_encode($this->area_model->get_area());
        }



        // funcion que envia a el model de area la informacion capturada por el formulario que crea una nueva area
        public function createArea()
        {
            $retorno = ["estadoRetorno"=> true,
            "mensaje"=> "paila.",
            "retorno"=> []];
            $data = $this->input->post();
            $response = $this->area_model->saveArea($data);
            if ($response){
                $retorno['mensaje'] = "Informacion del colaborador guardada correctamente !";
                echo json_encode($retorno);
            }

        }
         
        // funcion que envia a el model de area la informacion capturada por el formulario que edita un area
        public function editArea()
        {
            $retorno = ["estadoRetorno"=> true,
            "mensaje"=> "paila.",
            "retorno"=> []];
            $data = $this->input->post();
            $response = $this->area_model->editararea($data);
            if ($response){
                $retorno['mensaje'] = "Informacion del area actualizada correctamente!";
                echo json_encode($retorno);
            }

        }

        // funcion que envia a el model de area el id del area se nesecita "eliminar"
        public function deletearea()
        {
            $retorno = ["estadoRetorno"=> true,
            "mensaje"=> "paila.",
            "retorno"=> []];
            $data = $this->input->post();
            $response = $this->area_model->eliminar_area($data);
            if ($response){
                $retorno['mensaje'] = " Informacion de la area ha sido eliminada correctamente!";
                echo json_encode($retorno);
            }

        }


    }

?>
