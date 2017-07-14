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
		$this->load->helper('form');
		$this->load->view('perfil/index');
	}



}



