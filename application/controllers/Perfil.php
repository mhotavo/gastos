<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {


	public function index()
	{
		if ($this->session->userdata('login')) {
			$this->load->helper('form');


			$this->load->view('perfil/index');
		} else {
			header("Location:" . base_url());
		}
	}

	 

}



