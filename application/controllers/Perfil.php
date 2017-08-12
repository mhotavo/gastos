<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->User->check();
	}


	public function index()
	{
		if ($_POST) {
			
			$user = $this->input->post();

			$this->User->ID         = 	 $this->session->userdata('id');
			$this->User->EMAIL      = $user['EMAIL'];
			$this->User->NOMBRES    = $user['NOMBRES'];
			$this->User->P_APELLIDO = $user['P_APELLIDO'];
			$this->User->S_APELLIDO = $user['S_APELLIDO'];
			$this->User->INICIO_MES = $user['INICIO_MES'];
			$this->User->FIN_MES    = $user['FIN_MES'];
			$this->User->USER       = $this->session->userdata('user');
			$this->User->PASS       = $user['PASS_ACTUAL'];
			
			$this->User->update();
			header("Location:" . base_url()."login/logout");
		} else {

			$data['usuario'] = $this->User->getUser($this->session->userdata('user'));
			$this->load->helper('form');
			$this->load->view('perfil/index', $data);
		}
		


	}



}



