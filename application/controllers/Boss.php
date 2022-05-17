<?php
    class Boss extends CI_Controller {

        // conexion del controlador a el modal y helpers
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Boss_model');
            $this->load->helper('url_helper');
            $this->load->library('session');
            if (!$this->session->userdata('login')) {
                redirect(base_url());
            }
        }
        


        // funcion que muestra en la vista la tabla y su contenido del modulo de jefes
        public function index()
        {
            $data['title'] = 'Jefes';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('boss/index', $data);
            $this->load->view('templates/footer');
        }


        // funcion que obtiene la informacion para mostrarla en la tabla de jefes
        public function getBoss()
        {
           echo json_encode($this->Boss_model->get_boss());
        }


        // funcion que envia a el model de jefe la informacion capturada por el formulario que crea una nueva jefe
        public function createBoss()
        {
            $retorno = ["estadoRetorno"=> true,
            "mensaje"=> "paila.",
            "retorno"=> []];
            $data = $this->input->post();
            $response = $this->Boss_model->saveBoss($data);
            if ($response){
                $retorno['mensaje'] = "Informacion del jefe guardada correctamente !";
                echo json_encode($retorno);
            }
        }

        // funcion que envia a el model de boss la informacion capturada por el formulario que edita un jefe
        public function editBoss()
        {
            $retorno = ["estadoRetorno"=> true,
            "mensaje"=> "paila.",
            "retorno"=> []];
            $data = $this->input->post();
            $response = $this->Boss_model->editarBoss($data);
            if ($response){
                $retorno['mensaje'] = "Informacion del jefe actualizada correctamente!";
                echo json_encode($retorno);
            }
        }


        // funcion que envia a el model de boss el id del jefe se nesecita "eliminar"
        public function deleteBoss()
        {
            $retorno = ["estadoRetorno"=> true,
            "mensaje"=> "paila.",
            "retorno"=> []];
            $data = $this->input->post();
            $response = $this->Boss_model->eliminar_boss($data);
            if ($response){
                $retorno['mensaje'] = " Informacion del jefe ha sido eliminada correctamente!";
                echo json_encode($retorno);
            }

        }




    }

?>
