<?php
    class Novelty extends CI_Controller {

        //    inicio conexion del controlador a el modal y url helpers
        public function __construct()
        {
            parent::__construct();
            $this->load->model('novelty_model');
            $this->load->helper('url_helper');
            $this->load->library('session');
            $this->load->database();
            if (!$this->session->userdata('login')) {
                redirect(base_url());
            }
        }
         //    fin conexion del controlador a el modal y url helpers


        // inicio vista a las novedades
        public function abiertas()
        {
            $data['title'] = 'Novedades abiertas';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('novelty/abiertas', $data);
            $this->load->view('templates/footer');
        }

        public function cerradas()
        {
            $data['title'] = 'Novedades cerradas';
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

            //   $id = $data['usu_id_fk'];
            //   $this->sendEmail($id);

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


    //      public function sendEmail($id){
           
            
    //         $resp=$this->db->query("SELECT usu_nom,usu_ape,usu_correo FROM ir_usuario WHERE usu_id = $id")->row();
            
    //         // $correo_usuario = "aprendiz.sistemas3@ospedale.com.co";
    //         $correo_usuario = $resp->usu_correo;
            
            
            
    //         $this->load->library('phpmailer_lib');
    
    //         $mail = $this->phpmailer_lib->load();
    
    //         $mail->isSMTP();
    //         $mail->SMTPDebug = 0;
    //         $mail->Host = 'email-smtp.us-east-1.amazonaws.com';
    //         $mail->Port = 587;
    //         $mail->SMTPSecure = 'tls';
    //         $mail->SMTPAuth   = true;
    //         $mail->Username = 'AKIAVRBYRDHYGRZ6RFNY';
    //         $mail->Password = 'BEfVfi8Lj/RlW+1cz7M5FDO4qaoG9zULfcDU1wd4HWSu';
    //         $mail->SetFrom('notificaciones@ospedale.com.co', 'Appreport G-Ocho');
    //         $mail->CharSet  = 'UTF-8';
      
    //         $mail->addAddress($correo_usuario); 
    //         // $mail->addAddress('dangellojr@ospedale.com.co');     
    
    //         $mail->Subject = 'Hola '.$resp->usu_nom.' se ha registrado un incidente a tu nombre - Appreport';
    //         $mail->isHTML(true);
            
    //         $mailContent =  '<center><b>Estimado: '.$resp->usu_nom.' '.$resp->usu_ape.'</b></center>           
               
             
    //              Puede ingresar para revisar su incidente a traves de este link <a href="'."http://181.129.171.26:9898/appreport/".''.''.'"> a Appreport.</a><br>
               
    //             **********************Mensaje Generado Automáticamente**********************
    //             <p>Este correo es únicamente informativo y es de uso exclusivo del destinatario(a), puede contener información privilegiada y/o confidencial. Si no es usted el destinatario(a) deberá borrarlo inmediatamente. Queda notificado que el mal uso, divulgación no autorizada, alteración y/o  modificación malintencionada sobre este mensaje y sus anexos quedan estrictamente prohibidos y pueden ser legalmente sancionados. - Appreport-G-OCHO no asume ninguna responsabilidad por estas circunstancias </p>';
    //         $mail->Body = $mailContent;             
          
    //         if($mail->send()):
    //            return true;
    //         else:        
    //             return false;
    //         endif;
            
    // }
         

            
         
    }
?>