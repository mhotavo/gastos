<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
		if ($this->session->userdata('login')) {

			$totalGastos=$this->Transaccion->sumaGastos();
			$totalIngresos=$this->Transaccion->sumaIngresos();
			/*$Total69=$this->evento->Total69();
			$TotalOralEl=$this->evento->TotalOralEl();
			$TotalOralElla=$this->evento->TotalOralElla();
			$UltimoAndres=$this->evento->UltimoAndres();
			$ProximoAndres=$this->evento->ProximoAndres();
			$ProximaInyeccion=$this->evento->ProximaInyeccion();

			#Dias de cuanto fue la última vez
			$dateUltimaVez = new DateTime($UltimaVez->FECHA);
			$hoy = new DateTime(date("Y-m-d"));
			$interval = $dateUltimaVez->diff($hoy);
			$dias=$interval->format('Hace %a día(s)');
			#Dias desde la ultima regla
			$ultRegla = new DateTime($UltimoAndres->FECHA);
			$interval = $hoy->diff($ultRegla);
			$diasRegla=$interval->format('Hace %a día(s)');
			#Dias proxima regla
			$proximaRegla = new DateTime($ProximoAndres->NEXT);
			$interval = $hoy->diff($proximaRegla);
			$diasProximaRegla=$interval->format('En %a día(s)');
			#Dias proxima inyeccion
			$proxInyec = new DateTime($ProximaInyeccion->NEXT);
			$interval = $hoy->diff($proxInyec);
			$diasProxInyec=$interval->format('En %a día(s)');
*/
			$data['datos'] = array(
				"totalGastos" => $totalGastos->TOTAL,
				"totalIngresos" => $totalIngresos->TOTAL,
				"saldo" => ($totalIngresos->TOTAL-$totalGastos->TOTAL),
				); 

				$this->load->view('home/index', $data);

			} else {
				header("Location:" . base_url());
			}

		}


		public function backup()
		{
			if ($this->session->userdata('login')) {
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
			} else {
				header("Location:" . base_url());
			}
		}

	}



