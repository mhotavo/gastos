<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transacciones extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->User->check();
	}

	public function index()
	{
		$data['transacciones']  =$this->Transaccion->index();
		$this->load->view('transacciones/index', $data);
	}


	public function agregar()
	{
		if ($_POST) {
			$transaccion = $this->input->post();
			$transaccion['ID_CREDITO']=  NULL;
			$this->Transaccion->add($transaccion);
			header("Location:" . base_url(). "home");
		}
	}

	public function editar()
	{
		if ($_POST) {
			$transaccion                   = $this->input->post();
			$transaccion['ID_TRANSACCION'] = $this->uri->segment(3);
			#Creamos ID del credio
			if (isset($transaccion['ID_CONCEPTO'])) {
				$transaccion['ID_CREDITO']=NULL;
			} 
			$this->Transaccion->update($transaccion);
			header("Location:" . base_url(). "home");
		}  else {
			# Vista
			$this->load->helper('form');
			$id                  = $this->uri->segment(3);
			$data['transaccion'] = $this->Transaccion->get($id,'','');
			if ($data['transaccion'][0]->TIPO=='G') {
				$data['concepto']    = $this->Concepto->gastos();
			} else {
				$data['concepto']    = $this->Concepto->ingresos();
			}

			if ($data['transaccion'][0]->ID_CREDITO=='') {
				$this->load->view('transacciones/editar', $data);
			} else {
				$data['creditos'] = $this->Credito->index();
				$this->load->view('abonos/editar', $data);
			}
			
		}
	}

	public function ingresos()
	{
		#Vista
		$this->load->helper('form');
		$data['concepto'] = $this->Concepto->ingresos();
		$data['titulo'] = "Ingresos";
		$this->load->view('transacciones/agregar', $data);
	}

	public function gastos()
	{
		#Vista
		$this->load->helper('form');
		$data['concepto'] = $this->Concepto->gastos();
		$data['titulo'] = "Gastos";
		$this->load->view('transacciones/agregar', $data);
	}

	public function eliminar()
	{
		$id = $this->uri->segment(3);
		if ($id!='') {
			$idCredito=  $this->Transaccion->get($id,'','')[0]->ID_CREDITO; 
			if ($idCredito!=null) {
				$abono['ID_CREDITO']=$idCredito;
				$abono['SALDO_ANTERIOR']= $this->Transaccion->get($id,'','')[0]->VALOR;
				$this->Credito->updateSaldo($abono,"update"); 
			}
			$this->Transaccion->delete($id);
			header("Location:" . base_url(). "home");

		} else {
			header("Location:" . base_url());
		}
	}

	public function ver()
	{
		#Vista
		$id             = $this->uri->segment(3);
		$data['evento'] = $this->evento->get_evento($id);
		$this->load->helper('form');
		$this->load->view('eventos/ver', $data);
	}

}



