<?php
    class User extends CI_Controller {

        // conexion del controlador a el model y helpers
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
        
        // funcion que muestra en la vista la tabla y su contenido del modulo de usuarios 
        public function index()
        {
            $data['title'] = 'Usuarios';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer');
            
        }
        
        // funcion que obtiene la informacion para mostrarla en la tabla de los usuarios
        public function getuser()
        {
           echo json_encode($this->user_model->get_user());
        }

        // funcion que muestra en la vista el formulario donde se crea un nuevo usuario
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

        // funcion que envia a el model de user la informacion capturada por el formulario que crea un nuevo usuario
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

        // funcion que muestra en la vista el formulario donde se editar un usuario
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

        // funcion que envia a el model de user la informacion capturada por el formulario que edita un usuario
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

         // funcion que envia a el model de user el id de la novedad se nesecita "eliminar"
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

         // funcion que obtiene la informacion para mostrarla en el select de jefes
        public function getboss()
        {
        echo json_encode($this->user_model->get_boss());
        }
        
        // funcion que obtiene la informacion para mostrarla en el input text donde se visualiza el correo del jefe inmediato
        public function getbossC()
        {
            $id = $this->input->post('jefe_id');
        echo json_encode($this->user_model->get_bossC($id));
        }

        //funcion que permite verificar si el numero de documento ya se encuentra registrado
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