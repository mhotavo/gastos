<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
		if ($this->session->userdata('login')) {

			$UltimaVez=$this->evento->UltimaVez();
			$TotalSex=$this->evento->TotalSex();
			$Total69=$this->evento->Total69();
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

			$data['datos'] = array(
				"UltimaVez" => $UltimaVez->FECHA,
				#"PrimeraVez" => $PrimeraVez,
				"TotalSex" => $TotalSex->TOTAL,
				"Total69" => $Total69->TOTAL,
				"TotalOralEl" => $TotalOralEl->TOTAL,
				"TotalOralElla" => $TotalOralElla->TOTAL,
				"UltimoAndres" => $UltimoAndres->FECHA,
				"ProximoAndres" => $ProximoAndres->NEXT,
				"ProximaInyeccion" => $ProximaInyeccion->NEXT,
				"diasUltimaVez" => $dias,
				"diasRegla" => $diasRegla,
				"diasProximaRegla" => $diasProximaRegla,
				"diasProxInyec" => $diasProxInyec,
				);

			$this->load->view('home/index', $data);

		} else {
			header("Location:" . base_url());
		}
		
	}


}



