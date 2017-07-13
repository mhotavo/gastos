<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos extends CI_Controller {


	public function index()
	{
		if ($this->session->userdata('login')) {
			$data['eventos']  =$this->evento->get_all();
			$this->load->view('eventos/index', $data);
		} else {
			header("Location:" . base_url());
		}
	}

	public function agregar()
	{
		if ($this->session->userdata('login')) {

			if ($_POST) {
				$evento = $this->input->post();
				$this->evento->add($evento);
				header("Location:" . base_url(). "eventos");
			} else {
				#Vista
				$this->load->helper('form');
				$this->load->view('eventos/agregar');
			}

		} else {
			header("Location:" . base_url());
		}		
		
	}

	public function editar()
	{
		if ($this->session->userdata('login')) {

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
		} else {
			header("Location:" . base_url());
		}		
		
	}

	public function eliminar()
	{
		if ($this->session->userdata('login')) {
			$id = $this->uri->segment(3);

			if ($id!='') {
				$this->evento->delete($id);
				header("Location:" . base_url(). "eventos");

			} else {
				header("Location:" . base_url());
			}
		} else {
			header("Location:" . base_url());
		}		
		
	}

	public function ver()
	{
		if ($this->session->userdata('login')) {

			#Vista
			$id             = $this->uri->segment(3);
			$data['evento'] = $this->evento->get_evento($id);
			$this->load->helper('form');
			$this->load->view('eventos/ver', $data);


		} else {
			header("Location:" . base_url());
		}		
		
	}

}



