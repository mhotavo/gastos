<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->User->check();
	}


	public function index(){
		$dia_corte = $this->session->userdata('corte');
		$inicio      = date("Y-m-$dia_corte");
		if (date("d")<$dia_corte ) {
			$inicio      = strtotime($inicio."- 1 months");
			$inicio = date("Y-m-d",$inicio);
		}
		$fin       = strtotime($inicio."+ 1 months");
		$fin       = date("Y-m-d",$fin);

 
		$totalGastos=$this->Transaccion->sumaGastos($inicio, $fin);
		$totalIngresos=$this->Transaccion->sumaIngresos($inicio, $fin);
		$movimientos=$this->Transaccion->movimientosMes($inicio, $fin);
		print_r($movimientos);
		$data['datos'] = array(
			"totalGastos" => $totalGastos->TOTAL,
			"totalIngresos" => $totalIngresos->TOTAL,
			"saldo" => ($totalIngresos->TOTAL-$totalGastos->TOTAL),
			"movimientos" => $movimientos,

			); 
		$data['creditos']=$this->Credito->index(); exit;
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



