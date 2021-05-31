<?php
    class User extends CI_Controller {

        //    inicio conexion del controlador a el modal y url helpers
        public function __construct()
        {
            parent::__construct();
            $this->load->model('user_model');
            $this->load->helper('url_helper');
            $this->load->library('session');
            if (!$this->session->userdata('login')) {
                redirect(base_url());
            }
        }
         //    fin conexion del controlador a el modal


        // inicio vista de usuario
        public function index()
        {
            $data['title'] = 'Usuarios';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer');
            
        }
        // fin vista de usuario

        public function getuser()
        {
           echo json_encode($this->user_model->get_user());
        }

        public function create()
        {
            $data['title'] = 'Creacion de nuevo usuario';
            $data['rol'] = $this->user_model->get_rol();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('user/create', $data);
            $this->load->view('templates/footer');
            
        }


        public function createUser()
        {
            $retorno = ["estadoRetorno"=> true,
            "mensaje"=> "paila.",
            "retorno"=> []];
 
            $data = $this->input->post();
            $response = $this->user_model->saveUser($data);
            if ($response){
                $retorno['mensaje'] = "Informacion del usuario registrada correctamente!";
                echo json_encode($retorno);
            }

        }

        public function edit($usu_id)
        {
            $data['title'] = 'Edicion cuenta de usuario';
            $data['rol'] = $this->user_model->get_rol();
            $data['jefe'] = $this->user_model->getboss();
            $data['usuario'] = $this->user_model->get_edit_user($usu_id);
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
            
        }


        public function editUser()
         {
             $retorno = ["estadoRetorno"=> true,
             "mensaje"=> "paila.",
             "retorno"=> []];
  
             $data = $this->input->post();
             $response = $this->user_model->editarUser($data);
                

             if ($response){
                 $retorno['mensaje'] = "Informacion del usuario actualizada correctamente!";
                 echo json_encode($retorno);
             }

         }

         public function deleteUser()
         {
             $retorno = ["estadoRetorno"=> true,
             "mensaje"=> "paila.",
             "retorno"=> []];
  
             $data = $this->input->post();
             $response = $this->user_model->eliminar_user($data);
             if ($response){
                 $retorno['mensaje'] = " Informacion de usuario eliminada correctamente!";
                 echo json_encode($retorno);
             }

         }

         public function getboss()
         {
            echo json_encode($this->user_model->get_boss());
         }
 
         public function getbossC()
         {
             $id = $this->input->post('jefe_id');
            echo json_encode($this->user_model->get_bossC($id));
         }

         public function existsNumDoc($num_doc)
        {
           
           $resultado = $this->user_model->existsnumDoc($num_doc);

           if(empty($resultado)){

            echo json_encode(0);

           }else{

            echo json_encode(1);

           }
        }


    }
?>