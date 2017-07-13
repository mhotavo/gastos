<?php 

class Concepto extends CI_Model
{
	
	public $ID_CONCEPTO;
	public $CONCEPTO;
	public $TIPO;

	public function ver($id='')
	{
		$this->ID=$id;
		$this->db->where('ID', $this->ID);
		$query = $this->db->get('logs');
		return $query->result();
	}

	public function index()
	{
		$query = $this->db->get('conceptos'); 
		return $query->result();
	} 



	public function add($log=null)
	{
		if ($log!=null) {
			$this->CONCEPTO      = $log['NOMBRE'];
			$this->TIPO      = $log['TIPO'];
			$this->db->insert('conceptos', $this);
		}
	}

	public function update($log=null)
	{


		if ($log!=null) {

			$this->ID_CONCEPTO = $log['ID_CONCEPTO'];
			$this->CONCEPTO    = $log['NOMBRE'];
			$this->TIPO        = $log['TIPO'];
			$this->db->where('ID_CONCEPTO', $this->ID_CONCEPTO); 
			$this->db->update('conceptos', $this);
		}
	}

	public function delete($id='')
	{
		if ($id!='') {
			$this->ID_CONCEPTO = $id;
			$this->db->where('ID_CONCEPTO', $this->ID_CONCEPTO);
			$this->db->delete('conceptos');
		}
	}



}
?>