<?php
    class Login extends CI_controller
    {

        // conexion del controlador a el model y helpers
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->model('Login_model');
            $this->load->library('form_validation');
            $this->load->library('session');  
        }

        // funcion que muestra en la interfaz donde el usuario se loguea 
        public function index()
        {
            $this->form_validation->set_rules('usu_num_doc' ,'usu_num_doc', 'required');
            $this->form_validation->set_rules('usu_contra' ,'usu_contra', 'required|callback_verifica');
            if($this->form_validation->run() == false)
            {  
                $this->load->view('Login');
            
            }
            else
            {
                redirect('Novelty/index');
            }
        }


        // funcion que verifica si el usuario existe y permite ingresar al menu del aplicativo
        public function verifica()
        {
            $usu_num_doc = $this->input->post('usu_num_doc');
            $usu_contra = $this->input->post('usu_contra');
            

            if($this->Login_model->login($usu_num_doc,$usu_contra))
            {
                redirect('inicio/index');
            }
            else
            {
                $this->session->set_flashdata('mensaje', 'Número de documento o contraseña incorrecto');
                redirect('login');
            }
        }

        //funcion que cierra la seccion 
        public function logout()
        {
            $this->session->sess_destroy();
            redirect('login');
        }



        //funcion que envia la contraseña al correo 
        public function forgot_pass()
        {
            if($this->input->post('forgot_pass'))
            {
                $email=$this->input->post('email');
                $query=$this->db->query("SELECT usu_correo,usu_contra FROM ir_usuario WHERE tip_est_id_fk = 1 AND usu_correo='$email'");
                $row=$query->row();
                if(!empty($row)){
                    $correo_usuario =$row->usu_correo;
                    $pass=$row->usu_contra;
                    $asunto = 'Recuperar contraseña'; 
                    $body= '<b> cordial saludo Estimado usuario</b>            
                            <p>Usted ha solicitado recuperar la contraseña en la plataforma de bitacora novedades.
                            
                            <p> su contraseña es: <b> '.$this->encrypt->decode($pass).' </b> </p>
                        
                            **********************Mensaje Generado Automáticamente**********************
                            <p>Este correo es únicamente informativo y es de uso exclusivo del destinatario(a), puede contener información privilegiada y/o confidencial. Si no es usted el destinatario(a) deberá borrarlo inmediatamente. Queda notificado que el mal uso, divulgación no autorizada, alteración y/o  modificación malintencionada sobre este mensaje y sus anexos quedan estrictamente prohibidos y pueden ser legalmente sancionados. - APPREPORT-G-OCHO no asume ninguna responsabilidad por estas circunstancias </p>'; 
                            $resp = enviar_correo($correo_usuario,$asunto,$body);
                        if ($resp) {
                            $this->session->set_flashdata('correo', 'La contraseña fue enviada a su correo');
                            redirect('login');
                        }
                }else{
               // $data['error']="Correo incorrecto!";
                print_r($row);
                return ;
                }
            
            }
        //$this->load->view('forgot_pass',@$data);	
    }


                    
    }
?>



