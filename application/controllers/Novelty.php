<?php
    class Novelty extends CI_Controller {

        // conexion del controlador a el model y helpers
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
        
        // funcion que muestra en la vista la tabla y su contenido del modulo de novedades abiertas 
        public function abiertas()
        {
            $data['title'] = 'Novedades abiertas';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('novelty/abiertas', $data);
            $this->load->view('templates/footer');
        }

        // funcion que obtiene la informacion para mostrarla en la tabla de novedades abiertas
        public function getnoveltyab()
        {
           echo json_encode($this->novelty_model->get_noveltyA());
        }

        // funcion que muestra en la vista la tabla y su contenido del modulo de novedades cerradas
        public function cerradas()
        {
            $data['title'] = 'Novedades cerradas';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('novelty/cerradas', $data);
            $this->load->view('templates/footer');
        }
        
        // funcion que obtiene la informacion para mostrarla en la tabla de novedades cerradas
        public function getnoveltyce()
        {
            echo json_encode($this->novelty_model->get_noveltyC());
        }

        // funcion que muestra en la vista el formulario donde se crea una nueva novedad
        public function create()
        {
            $data['title'] = 'Registro nueva novedad';
            $data['seccion'] = $this->novelty_model->get_seccion();
            $data['colaborador'] = $this->novelty_model->get_collaborator();
            $data['categoria'] = $this->novelty_model->get_category();
            $data['observacion'] = $this->novelty_model->getobservacion();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('novelty/create', $data);
            $this->load->view('templates/footer'); 
        }

        // funcion que obtiene la informacion para mostrarla en el select de tipo de incidencia
        public function gettypeincident()
        {  
            $cate_id = $this->input->post('cate_id');
            echo json_encode($this->novelty_model->get_typeincident($cate_id));
        }

        // funcion que envia a el model de novelty la informacion capturada por el formulario que crea una nueva novedad
        public function createNovelty()
        {
            $retorno = ["estadoRetorno"=> true,
            "mensaje"=> "paila.",
            "retorno"=> []];

            $data = $this->input->post();
            if ($data["nove_tiem_total"] !=null || $data["nove_tiem_total"]!="") {
                $hora_fin = explode(":",$data["nove_tiem_total"]);
                $data["nove_tiem_total"]= $hora_fin[0].":".$hora_fin[1].":00";
            }
            $response = $this->novelty_model->saveNovelty($data);
            if ($response){
                $retorno['mensaje'] = "informacion de novedad registrada correctamente!";
                echo json_encode($retorno);
            }
            $id = $data['usu_id_fk'];
            $this->sendEmail($id);
        }

        // funcion que muestra en la vista el formulario donde se editar la novedad
        public function edit($nove_id)
        {
            $data['title'] = 'Editar novedad';
            $data['seccion'] = $this->novelty_model->get_seccion();
            $data['colaborador'] = $this->novelty_model->get_collaborator();
            $data['categoria'] = $this->novelty_model->get_category();
            $data['novelty'] = $this->novelty_model->get_edit_novelty($nove_id);
            $data['observacion'] = $this->novelty_model->getobservacion();
            $data['incidencias'] = $this->novelty_model->get_typeincident($data['novelty']->cate_id_fk);
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/narbar');
            $this->load->view('novelty/edit', $data);
            $this->load->view('templates/footer');
            
        }
        
        // funcion que envia a el model de novelty la informacion capturada por el formulario que edita una novedad
        public function editNovelty()
        {
             $retorno = ["estadoRetorno"=> true,
             "mensaje"=> "paila.",
             "retorno"=> []];
  
             $data = $this->input->post();
             $response = $this->novelty_model->editarNovelty($data);
                

             if ($response){
                 $retorno['mensaje'] = "Informacion de novedad actualizada correctamente!";
                 echo json_encode($retorno);
             }

        }

        // funcion que envia a el model de novelty el id de la novedad se nesecita "eliminar"
        public function deleteNovelty()
        {
            $retorno = ["estadoRetorno"=> true,
            "mensaje"=> "paila.",
            "retorno"=> []];

            $data = $this->input->post();
            $response = $this->novelty_model->eliminar_novelty($data);
            if ($response){
                $retorno['mensaje'] = " Informacion de novedad eliminada correctamente!";
                echo json_encode($retorno);
            }

        }

        //funcion que envia un correo notificando cuando la novedad es creada
        public function sendEmail($id)
        {
            $resp=$this->db->query("SELECT u.usu_nom, j.jefe_nom,j.jefe_ape,j.jefe_correo from ir_usuario u, ir_jefe j WHERE u.jefe_id_fk = j.jefe_id AND j.tip_est_id_fk =1 AND u.usu_id = $id")->row();
           
            if(empty($resp->jefe_correo)){

                return false;

            }else{


                $jefe_correo = $resp->jefe_correo;
                $this->load->library('phpmailer_lib');
        
                $mail = $this->phpmailer_lib->load();
        
                $mail->isSMTP();
                $mail->SMTPDebug = 0;
                $mail->Host = 'email-smtp.us-east-1.amazonaws.com';
                $mail->Port = 587;
                $mail->SMTPSecure = 'tls';
                $mail->SMTPAuth   = true;
                $mail->Username = 'AKIAVRBYRDHYGRZ6RFNY';
                $mail->Password = 'BEfVfi8Lj/RlW+1cz7M5FDO4qaoG9zULfcDU1wd4HWSu';
                $mail->SetFrom('notificaciones@ospedale.com.co', 'Appreport G-Ocho');
                $mail->CharSet  = 'UTF-8';
        
    
                $mail->addAddress($jefe_correo);     
        
                $mail->Subject = 'Hola '.ucwords($resp->jefe_nom).' se ha registrado un incidente - Appreport';
                $mail->isHTML(true);
                
                $mailContent =  '<b>Cordial Saludo: '.ucwords($resp->jefe_nom)." ".ucwords($resp->jefe_ape).'</b>           
                
                    <p>Para informarte que el integrante '.ucwords($resp->usu_nom).' de tu equipo de trabajo presento un incidente;
                    Puedes ingresar para revisar su reporte a traves del siguiente link <a href="'.base_url().'">  Appreport.</a></p>
                    
                    <p>Gracias</p>

                
                    **********************Mensaje Generado Automáticamente**********************
                    <p>Este correo es únicamente informativo y es de uso exclusivo del destinatario(a), puede contener información privilegiada y/o confidencial. Si no es usted el destinatario(a) deberá borrarlo inmediatamente. Queda notificado que el mal uso, divulgación no autorizada, alteración y/o  modificación malintencionada sobre este mensaje y sus anexos quedan estrictamente prohibidos y pueden ser legalmente sancionados. - Appreport-G-OCHO no asume ninguna responsabilidad por estas circunstancias </p>';
                $mail->Body = $mailContent;             
            
                if($mail->send()):
                return true;
                else:        
                    return false;
                endif;
            }
        }


         
    }


?>