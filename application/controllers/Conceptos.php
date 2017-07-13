<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conceptos extends CI_Controller {


	public function index()
	{
		if ($this->session->userdata('login')) {

			$data['conceptos']  = $this->Concepto->index();
			$this->load->view('conceptos/index', $data);

		} else {
			header("Location:" . base_url());
		}
	}

	public function inactivos()
	{
		if ($this->session->userdata('login')) {
			$data['conceptos']  = $this->Log->get_fail();
			$this->load->view('conceptos/index', $data);
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
			write_file('/path/to/backup-bd-'.date('Y-m-d').'.gz', $backup);
			// Load the download helper and send the file to your desktop
			$this->load->helper('download');
			force_download('backup-bd-'.date('Y-m-d').'.gz', $backup);
			header("Location:" . base_url(). "conceptos");
		} else {
			header("Location:" . base_url());
		}
	}


	public function agregar()
	{
		if ($this->session->userdata('login')) {
			if ($_POST) {
				$Concepto = $this->input->post();
				$this->Concepto->add($Concepto);
				header("Location:" . base_url(). "conceptos");
			} else {
				#Vista
				$this->load->helper('form');
				$this->load->view('conceptos/agregar');
			}

		} else {
			header("Location:" . base_url());
		}		
		
	}

	public function editar()
	{
		if ($this->session->userdata('login')) {

			if ($_POST) {
				$concepto = $this->input->post();
				$concepto['ID_CONCEPTO']=  $this->uri->segment(3);
				$this->Concepto->update($concepto);
				header("Location:" . base_url(). "conceptos");
			} else {
				#Vista
				$id = $this->uri->segment(3);
				$data['concepto'] = $this->Concepto->ver($id);
				$this->load->helper('form');
				$this->load->view('conceptos/editar', $data);

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
				$this->Concepto->delete($id);
				header("Location:" . base_url(). "conceptos");

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
			$data['log'] = $this->Log->get_log($id);
			$this->load->helper('form');
			$this->load->view('conceptos/ver', $data);


		} else {
			header("Location:" . base_url());
		}		
		
	}

}



