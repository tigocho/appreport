<?php
    class ejecuctorTareas extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        public function notificaciones_correo(){
            $Nsemana = date("N");
            $hora = date("H:i");

           if ($Nsemana <=5 ) {
               if ($hora == "16:00") {

                   $this->notifications();

               }
           }
           if ($Nsemana == 6 ) {
               if ($hora == "11:00") {

                   $this->notifications();

               }
           }
           
        }

       public function notifications(){
           $resp=$this->db->query("SELECT u.usu_nom,u.usu_ape,u.usu_correo,j.jefe_nom,j.jefe_ape,j.jefe_correo,n.nove_id FROM ir_novedad n INNER JOIN ir_usuario u ON n.usu_id_fk = u.usu_id INNER JOIN ir_jefe j ON u.jefe_id_fk=j.jefe_id WHERE n.est_id_fk = 1")->result();

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
           foreach ($resp as $data){
           $mail->addAddress($data->usu_correo);
           $mail->addAddress($data->jefe_correo);     
   
           $mail->Subject = 'Hola '.ucwords($data->usu_nom).'  - Appreport';
           $mail->isHTML(true);
           
           $mailContent =  '<b>Cordial Saludo: '.ucwords($data->usu_nom)." ".ucwords($data->usu_ape).'</b>           
           
               <p>Para informarte que aun tienes novedades abiertas  
               Puedes ingresar para cerrar las novedades a traves del siguiente link <a href="'.base_url()."/Novelty/edit/".$data->nove_id.'">  Appreport.</a></p>
               
               <p>Gracias</p>

           
               **********************Mensaje Generado Automáticamente**********************
               <p>Este correo es únicamente informativo y es de uso exclusivo del destinatario(a), puede contener información privilegiada y/o confidencial. Si no es usted el destinatario(a) deberá borrarlo inmediatamente. Queda notificado que el mal uso, divulgación no autorizada, alteración y/o  modificación malintencionada sobre este mensaje y sus anexos quedan estrictamente prohibidos y pueden ser legalmente sancionados. - Appreport-G-OCHO no asume ninguna responsabilidad por estas circunstancias </p>';
           $mail->Body = $mailContent;

           $mail->send();

           }
           
       }    










    }

?>
