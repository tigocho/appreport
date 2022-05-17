<?php
    class Category extends CI_Controller {

        // conexion del controlador a el model y helpers
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Category_model');
            $this->load->helper('url_helper');
            $this->load->library('session');
            if (!$this->session->userdata('login')) {
                redirect(base_url());
            }
        }
        
        // funcion que muestra en la vista la tabla y su contenido del modulo de categoria 
        public function index()
        {
            
            $data['title'] = 'Categorias';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('category/index', $data);
            $this->load->view('templates/footer');
            
        }
       
        // funcion que obtiene la informacion para mostrarla en la tabla de categoria
        public function getCategory()
        {
           echo json_encode($this->Category_model->get_category());

        }

        // funcion que envia a el model de category la informacion capturada por el formulario que crea una nueva categoria
        public function createCategory()
        {
            $retorno = ["estadoRetorno"=> true,
            "mensaje"=> "paila.",
            "retorno"=> []];
 
            $data = $this->input->post();
            $response = $this->Category_model->saveCategory($data);
            if ($response){
                $retorno['mensaje'] = "Informacion de categoria guardada correctamente !";
                echo json_encode($retorno);
            }

        }

        // funcion que envia a el model de category la informacion capturada por el formulario que edita un categoria
        public function editCategory()
        {
            $retorno = ["estadoRetorno"=> true,
            "mensaje"=> "paila.",
            "retorno"=> []];

            $data = $this->input->post();
            $response = $this->Category_model->editarCategory($data);
            

            if ($response){
                $retorno['mensaje'] = " Informacion de categoria actualizada correctamente!";
                echo json_encode($retorno);
            }

        }

        // funcion que envia a el model de category el id del categoria se nesecita "eliminar"
        public function deleteCategory()
        {
            $retorno = ["estadoRetorno"=> true,
            "mensaje"=> "paila.",
            "retorno"=> []];

            $data = $this->input->post();
            $response = $this->Category_model->eliminar_category($data);
            if ($response){
                $retorno['mensaje'] = " informacion de categoria eliminada correctamente!";
                echo json_encode($retorno);
            }

        }



    }

?>
