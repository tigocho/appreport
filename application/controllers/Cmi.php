<?php
	class Cmi extends CI_Controller
	{
		// conexion del controlador a el model y helpers
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			if (!$this->session->userdata('login')) {
					redirect(base_url());
			}
		}

		// funcion que muestra en la vista la tabla y su contenido del modulo de categoria 
		public function index()
		{
			
			$data['title'] = 'Cmi';
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/narbar');
			$this->load->view('cmi/index', $data);
			$this->load->view('templates/footer');
				
		}
	}
?>
