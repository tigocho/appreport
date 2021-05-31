<?php
    class Category extends CI_Controller {

        //    inicio conexion del controlador a el modal y url helpers
        public function __construct()
        {
            parent::__construct();
            $this->load->model('category_model');
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
            
            $data['title'] = 'Categorias';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('category/index', $data);
            $this->load->view('templates/footer');
            
        }
        // fin vista a las novedades

        public function getCategory()
        {
           echo json_encode($this->category_model->get_category());

        }


        public function createCategory()
        {
            $retorno = ["estadoRetorno"=> true,
            "mensaje"=> "paila.",
            "retorno"=> []];
 
            $data = $this->input->post();
            $response = $this->category_model->saveCategory($data);
            if ($response){
                $retorno['mensaje'] = "Informacion de categoria guardada correctamente !";
                echo json_encode($retorno);
            }

        }

        public function editCategory()
         {
             $retorno = ["estadoRetorno"=> true,
             "mensaje"=> "paila.",
             "retorno"=> []];
  
             $data = $this->input->post();
             $response = $this->category_model->editarCategory($data);
                

             if ($response){
                 $retorno['mensaje'] = " Informacion de categoria actualizada correctamente!";
                 echo json_encode($retorno);
             }

         }

         public function deleteCategory()
         {
             $retorno = ["estadoRetorno"=> true,
             "mensaje"=> "paila.",
             "retorno"=> []];
  
             $data = $this->input->post();
             $response = $this->category_model->eliminar_category($data);
             if ($response){
                 $retorno['mensaje'] = " informacion de categoria eliminada correctamente!";
                 echo json_encode($retorno);
             }

         }



    }

?>
