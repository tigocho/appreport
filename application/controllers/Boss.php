<?php
    class Boss extends CI_Controller {

        //    inicio conexion del controlador a el modal y url helpers
        public function __construct()
        {
            parent::__construct();
            $this->load->model('boss_model');
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
            $data['title'] = 'Jefes';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('boss/index', $data);
            $this->load->view('templates/footer');
        }
        // fin vista a las novedades

        public function getBoss()
        {
           echo json_encode($this->boss_model->get_boss());
        }


        public function createBoss()
         {
             $retorno = ["estadoRetorno"=> true,
             "mensaje"=> "paila.",
             "retorno"=> []];
  
             $data = $this->input->post();
             $response = $this->boss_model->saveBoss($data);
             if ($response){
                 $retorno['mensaje'] = "informacion del jefe guardada correctamente !";
                 echo json_encode($retorno);
             }

         }

         public function editBoss()
         {
             $retorno = ["estadoRetorno"=> true,
             "mensaje"=> "paila.",
             "retorno"=> []];
  
             $data = $this->input->post();
             $response = $this->boss_model->editarBoss($data);
             if ($response){
                 $retorno['mensaje'] = "informacion del jefe actualizada correctamente!";
                 echo json_encode($retorno);
             }

         }

         public function deleteBoss()
         {
             $retorno = ["estadoRetorno"=> true,
             "mensaje"=> "paila.",
             "retorno"=> []];
  
             $data = $this->input->post();
             $response = $this->boss_model->eliminar_boss($data);
             if ($response){
                 $retorno['mensaje'] = " informacion del jefe ha sido eliminada correctamente!";
                 echo json_encode($retorno);
             }

         }




    }

?>
