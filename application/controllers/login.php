<?php
class Login extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('login_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        

        
    }
    public function index()
    {
        $this->form_validation->set_rules('usu_num_doc' ,'usu_num_doc', 'required');
        $this->form_validation->set_rules('usu_contra' ,'usu_contra', 'required|callback_verifica');
        if($this->form_validation->run() == false)
        {  
            $this->load->view('login');
        
        }
        else
        {
            redirect('Novelty/index');
        }
    }
    public function verifica()
    {
        $usu_num_doc = $this->input->post('usu_num_doc');
        $usu_contra = $this->input->post('usu_contra');
        

        if($this->login_model->login($usu_num_doc,$usu_contra))
        {
            redirect('inicio/index');
        }
        else
        {
            $this->session->set_flashdata('mensaje', 'numero de documento o contraseña incorrecto');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function forgot_pass()
	{
		if($this->input->post('forgot_pass'))
		{
			$email=$this->input->post('email');
			$query=$this->db->query("SELECT usu_correo,usu_contra FROM ir_usuario WHERE tip_est_id_fk = 1 AND usu_correo='$email'");
			$row=$query->row();
			if(!empty($row)){
                $user_email=$row->usu_correo;
                $pass=$row->usu_contra;
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
                $mail->addAddress($user_email);          

                    $mail->Subject = 'Recuperar contraseña';
                    $mail->isHTML(true);
                    $mailContent = 

                        '<b> cordial saludo Estimado usuario</b>            
                        <p>Usted ha solicitado recuperar la contraseña en la plataforma de bitacora novedades.
                        
                        <p> su contraseña es: <b> '.$pass.' </b> </p>
                    
                        **********************Mensaje Generado Automáticamente**********************
                        <p>Este correo es únicamente informativo y es de uso exclusivo del destinatario(a), puede contener información privilegiada y/o confidencial. Si no es usted el destinatario(a) deberá borrarlo inmediatamente. Queda notificado que el mal uso, divulgación no autorizada, alteración y/o  modificación malintencionada sobre este mensaje y sus anexos quedan estrictamente prohibidos y pueden ser legalmente sancionados. - APPREPORT-G-OCHO no asume ninguna responsabilidad por estas circunstancias </p>';
                    $mail->Body = $mailContent;  
                    
                    if ($mail->send()) {
                        $this->session->set_flashdata('mensaje', 'La contraseña fue enviada a su correo');
                        redirect('login');
                    }

                   

            }else{
			$data['error']="Correo invalido!";
			}
		
	    }
	   $this->load->view('forgot_pass',@$data);	
   }


	            
}
?>



