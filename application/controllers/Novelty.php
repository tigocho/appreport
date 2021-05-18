<?php
    class Novelty extends CI_Controller {

        //    inicio conexion del controlador a el modal y url helpers
        public function __construct()
        {
            parent::__construct();
            $this->load->model('novelty_model');
            $this->load->helper('url_helper');
            $this->load->library('session');
            if (!$this->session->userdata('login')) {
                redirect(base_url());
            }
        }
         //    fin conexion del controlador a el modal y url helpers


        // inicio vista a las novedades
        public function abiertas()
        {
            $data['title'] = 'novedades abiertas';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('novelty/abiertas', $data);
            $this->load->view('templates/footer');
        }

        public function cerradas()
        {
            $data['title'] = 'novedades cerradas';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('novelty/cerradas', $data);
            $this->load->view('templates/footer');
        }
        
        // fin vista a las novedades

        public function getnoveltyab()
         {
            echo json_encode($this->novelty_model->get_noveltyA());
         }

         public function getnoveltyce()
         {
            echo json_encode($this->novelty_model->get_noveltyC());
         }


         // inicio vista a formulario

        public function create()
        {
           
            $data['title'] = 'registro nueva novedad';
            $data['area'] = $this->novelty_model->get_area();
            $data['colaborador'] = $this->novelty_model->get_collaborator();
            $data['categoria'] = $this->novelty_model->get_category();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('novelty/create', $data);
            $this->load->view('templates/footer');
            
        }

         // fin vista a las formulario

         public function gettypeincident()
         {  $cate_id = $this->input->post('cate_id');
            echo json_encode($this->novelty_model->get_typeincident($cate_id));
         }

         // inicio de inserccion de novedad
         public function createNovelty()
         {
             $retorno = ["estadoRetorno"=> true,
             "mensaje"=> "paila.",
             "retorno"=> []];
  
             $data = $this->input->post();
             $response = $this->novelty_model->saveNovelty($data);
             if ($response){
                 $retorno['mensaje'] = "informacion de novedad registrada correctamente!";
                 echo json_encode($retorno);
             }

         }
         // fin de inserccion de novedad

          // inicio vista ediccion de  las novedades
        public function edit($nove_id)
        {
            $data['title'] = 'editar novedad';
            $data['area'] = $this->novelty_model->get_area();
            $data['colaborador'] = $this->novelty_model->get_collaborator();
            $data['categoria'] = $this->novelty_model->get_category();
            $data['novedad'] = $this->novelty_model->get_edit_novelty($nove_id);
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('novelty/edit', $data);
            $this->load->view('templates/footer');
            
        }
        // fin vista ediccion de  las novedades

        // inicio de ediccion  de novedad
        public function editNovelty()
         {
             $retorno = ["estadoRetorno"=> true,
             "mensaje"=> "paila.",
             "retorno"=> []];
  
             $data = $this->input->post();
             $response = $this->novelty_model->editarNovelty($data);
                

             if ($response){
                 $retorno['mensaje'] = "informacion de novedad actualizada correctamente!";
                 echo json_encode($retorno);
             }

         }

         // inicio de ediccion de novedad

         public function deleteNovelty()
         {
             $retorno = ["estadoRetorno"=> true,
             "mensaje"=> "paila.",
             "retorno"=> []];
  
             $data = $this->input->post();
             $response = $this->novelty_model->eliminar_novelty($data);
             if ($response){
                 $retorno['mensaje'] = " informacion de novedad eliminada correctamente!";
                 echo json_encode($retorno);
             }

         }
         

            
         
    }
?>