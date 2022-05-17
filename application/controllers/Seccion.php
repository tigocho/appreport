<?php
    class Seccion extends CI_Controller {
        
        
        // conexion del controlador a el model y helpers
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Seccion_model');
            $this->load->helper('url_helper');
            $this->load->library('session');
            if (!$this->session->userdata('login')) {
                redirect(base_url());
            }
        }
        
        // funcion que muestra en la vista la tabla y su contenido del modulo de seccion
        public function index()
        {
            $data['title'] = 'Secciones';
            $data['area'] = $this->Seccion_model->getarea();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('seccion/index',$data);
            $this->load->view('templates/footer');

        }

        // funcion que obtiene la informacion para mostrarla en la tabla de secciones
        public function getseccion()
        {
           echo json_encode($this->Seccion_model->get_seccion());

        }


       // funcion que envia a el model de seccion la informacion capturada por el formulario que crea una nueva seccion
        public function createSeccion()
        {
            $retorno = ["estadoRetorno"=> true,
            "mensaje"=> "paila.",
            "retorno"=> []];

            $data = $this->input->post();
            $response = $this->Seccion_model->saveSeccion($data);
            if ($response){
                $retorno['mensaje'] = "Informacion de seccion guardada correctamente!";
                echo json_encode($retorno);
            }

        }
        
        // funcion que envia a el model de seccion la informacion capturada por el formulario que edita un seccion
        public function editSeccion()
        {
            $retorno = ["estadoRetorno"=> true,
            "mensaje"=> "paila.",
            "retorno"=> []];

            $data = $this->input->post();
            $response = $this->Seccion_model->editarSeccion($data);
            if ($response){
                $retorno['mensaje'] = "Informacion de seccion actualizado correctamente";
                echo json_encode($retorno);
            }

        }

        // funcion que envia a el model de seccion el id de la seccion se nesecita "eliminar"
        public function deleteSeccion()
        {
            $retorno = ["estadoRetorno"=> true,
            "mensaje"=> "paila.",
            "retorno"=> []];

            $data = $this->input->post();
            $response = $this->Seccion_model->eliminar_seccion($data);
            if ($response){
                $retorno['mensaje'] = " Informacion de seccion eliminada correctamente!";
                echo json_encode($retorno);
            }

        }

    }
?>