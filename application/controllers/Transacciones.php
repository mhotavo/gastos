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
			$this->Transaccion->add($transaccion);
			header("Location:" . base_url(). "transacciones");
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

	public function editar()
	{
		if ($_POST) {
			$evento = $this->input->post();
			$evento['id']=  $this->uri->segment(3);
			$this->evento->update($evento);
			header("Location:" . base_url(). "eventos");
		} else {
				#Vista
			$id             = $this->uri->segment(3);
			$data['evento'] = $this->evento->get_evento($id);
			$this->load->helper('form');
			$this->load->view('eventos/editar', $data);
		}
	}

	public function eliminar()
	{
		$id = $this->uri->segment(3);
		if ($id!='') {
			$this->evento->delete($id);
			header("Location:" . base_url(). "eventos");
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



