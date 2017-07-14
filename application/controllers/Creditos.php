<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Creditos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->User->check();
	}

	public function index()
	{
		$data['creditos']  = $this->Credito->index();
		$this->load->view('creditos/index', $data);
	}

	public function agregar()
	{
		if ($_POST) {
			$credito = $this->input->post();
			$this->Credito->add($credito);
			header("Location:" . base_url(). "creditos");
		} else {
				#Vista
			$this->load->helper('form');
			$this->load->view('creditos/agregar');
		}
	}

	public function editar()
	{
		if ($_POST) {
			$credito = $this->input->post();
			$credito['ID']=  $this->uri->segment(3);
			$this->Credito->update($credito);
			header("Location:" . base_url(). "creditos");
		} else {
				#Vista
			$id = $this->uri->segment(3);
			$data['credito'] = $this->Credito->ver($id);
			$this->load->helper('form');
			$this->load->view('creditos/editar', $data);
		}
	}

	public function eliminar()
	{
		$id = $this->uri->segment(3);
		if ($id!='') {
			$this->Credito->delete($id);
			header("Location:" . base_url(). "creditos");

		} else {
			header("Location:" . base_url());
		}
	}

	public function agregarAbono()
	{
		if ($_POST) {
			$abono                = $this->input->post();
			$abono['ID_CONCEPTO'] = "12";
			$this->Transaccion->add($abono);
			//Actualizar Saldo del credito
			$this->Credito->updateSaldo($abono,"add"); 
			header("Location:" . base_url(). "transacciones");
		} else {
			#Vista
			$data['creditos'] = $this->Credito->index();
			$this->load->helper('form');
			$this->load->view('abonos/agregar', $data);
		}
	}

	public function editarAbono()
	{
		if ($_POST) {
			$abono                   = $this->input->post();
			$abono['ID_TRANSACCION'] = $this->uri->segment(3);
			$abono['ID_CONCEPTO']    = "12";
			$abono['SALDO_ANTERIOR'] = 	$this->Transaccion->ver($abono['ID_TRANSACCION'])[0]->VALOR;

			if ($abono['SALDO_ANTERIOR']!=$abono['VALOR']) {
				$this->Credito->updateSaldo($abono,"update"); 
				$this->Credito->updateSaldo($abono,"add"); 
			}
			$this->Transaccion->update($abono); 
			//Actualizar Saldo del credito
			
			header("Location:" . base_url(). "transacciones");
		} else {
				#Vista
			$id             = $this->uri->segment(3);
			$data['abono'] = $this->evento->get_evento($id);
			$this->load->helper('form');
			$this->load->view('abonos/agregar', $data);
		}
	}

}



