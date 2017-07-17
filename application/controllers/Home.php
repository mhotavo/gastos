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

	public function transportes(){
		$inicio= $this->session->userdata('inicio');
		$fin= date("Y-m-15", strtotime($inicio));
		$fin = new DateTime($fin);
		$fin = $fin->add(new DateInterval('P1M'));
		$fin = $fin->format('Y-m-d');

		$datetime1 = new DateTime($inicio);
		$datetime2 = new DateTime($fin);
		$diasTotales = $datetime1->diff($datetime2);

		$totalMes=6400;
		$fecha = new DateTime($inicio);

		#CICLO TOTAL
		for ($i=0; $i <= $diasTotales->format('%a'); $i++) { 
			#echo 'Dia: ' .$i . '  '.	$inicio=$fecha->format('l Y-m-d'). ' ' .  $totalMes . '<br>';
			$inicio=$fecha->add(new DateInterval('P1D'));
			$inicio=$fecha->format('l');
			switch ($inicio) {
				case 'Monday':
				$totalMes=$totalMes+6400;
				break;
				case 'Tuesday':
				$totalMes=$totalMes+6400;
				break;
				case 'Wednesday':
				$totalMes=$totalMes+6400;
				break;
				case 'Thursday':
				$totalMes=$totalMes+6400;
				break;
				case 'Friday':
				$totalMes=$totalMes+3200;
				break;
				case 'Saturday':
				$totalMes=$totalMes+3200;
				break;
				case 'Sunday':
				$totalMes=$totalMes+0;
				break;
			}
		}

		#CICLO A HOY
		$datetime1 = new DateTime(date("Y-m-d"));
		$datetime2 = new DateTime($fin);
		$diasRestantes = $datetime1->diff($datetime2);

		$totalHoy=6400;
		$fecha = new DateTime($inicio);

		for ($i=0; $i <= $diasRestantes->format('%a'); $i++) { 
			#echo 'Dia: ' .$i . '  '.	$inicio=$fecha->format('l Y-m-d'). ' ' .  $acumulado . '<br>';
			$inicio=$fecha->add(new DateInterval('P1D'));
			$inicio=$fecha->format('l');
			switch ($inicio) {
				case 'Monday':
				$totalHoy=$totalHoy+6400;
				break;
				case 'Tuesday':
				$totalHoy=$totalHoy+6400;
				break;
				case 'Wednesday':
				$totalHoy=$totalHoy+6400;
				break;
				case 'Thursday':
				$totalHoy=$totalHoy+6400;
				break;
				case 'Friday':
				$totalHoy=$totalHoy+3200;
				break;
				case 'Saturday':
				$totalHoy=$totalHoy+3200;
				break;
				case 'Sunday':
				$totalHoy=$totalHoy+0;
				break;
			}
		}

 

		$buses = array(
			'TOTAL_MES' => $totalMes, 
			'TOTAL_A_HOY' => $totalHoy, 
			'DIAS_TOTAL' => $diasTotales->format('%a'), 
			'DIAS_RESTANTES' => $diasRestantes->format('%a'), 
			'FECHA_FIN' => $fin,
			);
 
		$data['BUSES']    = $buses;
		$this->load->view('home/transportes', $data);
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



