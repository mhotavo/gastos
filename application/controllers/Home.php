<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->User->check();
	}


	public function index(){
		$totalGastos=$this->Transaccion->sumaGastos();
		$totalIngresos=$this->Transaccion->sumaIngresos();
		$data['datos'] = array(
			"totalGastos" => $totalGastos->TOTAL,
			"totalIngresos" => $totalIngresos->TOTAL,
			"saldo" => ($totalIngresos->TOTAL-$totalGastos->TOTAL),
			); 
		$this->load->view('home/index', $data);
	}

	public function backup()
	{
	// Load the DB utility class
		$this->load->dbutil();
	// Backup your entire database and assign it to a variable
		$backup = $this->dbutil->backup();
	// Load the file helper and write the file to your server
		$this->load->helper('file');
		write_file('/path/to/gastos-bd-'.date('Y-m-d').'.gz', $backup);
	// Load the download helper and send the file to your desktop
		$this->load->helper('download');
		force_download('gastos-bd-'.date('Y-m-d').'.gz', $backup);
		header("Location:" . base_url(). "home");
	}

}



