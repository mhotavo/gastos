<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->User->check();
	}


	public function index(){
		$inicio=$this->session->userdata('inicio');
		$fin=$this->session->userdata('fin');
		$totalGastos   = $this->Transaccion->sumaGastos($inicio, $fin);
		$totalIngresos = $this->Transaccion->sumaIngresos($inicio, $fin);
		$data['datos'] = array(
			"totalGastos"   => $totalGastos->TOTAL,
			"totalIngresos" => $totalIngresos->TOTAL,
			"saldo"         => ($totalIngresos->TOTAL-$totalGastos->TOTAL)
			); 

		$data['creditos'] = $this->Credito->index();
		$data['gastos']   = $this->Transaccion->mensuales($inicio,$fin, 'G');
		$data['ingresos'] = $this->Transaccion->mensuales($inicio,$fin, 'I');
		
		foreach ($this->Credito->index() as $a => $credito) {

			$ultimo=date("Y-m", strtotime($credito->ULTIMO_PAGO));  
			if (date("Y-m")>$ultimo ) {
				$data['creditosPorPagar'][$a] = array(
					'ID_CONCEPTO' => $credito->ID, 
					'CONCEPTO' => $credito->CREDITO, 
					'VENCE' => $credito->FECHA_VEN, 
					'ESTADO' => 'PAGO PENDIENTE', 
					'TIPO' => 'CREDITO', 
					);
			}


		}
		foreach ($this->Concepto->index() as $a => $concepto) {
			if ($concepto->MENSUAL=='S' AND $concepto->ID_CONCEPTO!='12'  ) {
				foreach ($data['gastos'] as $b => $pago) {
					$data['porPagar'][$a] = array(
						'ID_CONCEPTO' => $concepto->ID_CONCEPTO, 
						'CONCEPTO' => $concepto->CONCEPTO, 
						'VENCE' => $concepto->FECHA_VEN, 
						'ESTADO' => 'PAGO PENDIENTE', 
						'TIPO' => 'OTROS CONCEPTOS', 
						);
				}
			}

		}

		$this->load->view('home/index', $data);
	}

	public function deudas(){

		$data['creditos']    = $this->Credito->index();
		$this->load->view('home/deudas', $data);
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



