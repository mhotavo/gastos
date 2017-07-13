<?php 

class Transaccion extends CI_Model
{
	
	public $ID_TRANSACCION;
	public $ID_CONCEPTO;
	public $VALOR;
	public $FECHA;
	public $DESCRIPCION;
	public $ID_USUARIO;


	public function get_transaccion($id='')
	{
		$this->ID_TRANSACCION=$id;
		$this->db->where('ID_TRANSACCION', $this->ID_TRANSACCION);
		$query = $this->db->get('transaccion');
		return $query->result();
	}

	public function index()
	{
		$query = $this->db->query('SELECT * FROM transaccion t LEFT JOIN conceptos c ON (t.ID_CONCEPTO=c.ID_CONCEPTO) ORDER BY FECHA DESC'); 
		return $query->result();
	} 

	public function add($transaccion=null)
	{
		if ($transaccion!=null) {
			$this->ID_CONCEPTO   = $transaccion['ID_CONCEPTO'];
			$this->VALOR       = $transaccion['VALOR'];
			$this->FECHA        = $transaccion['FECHA'];
			$this->DESCRIPCION = $transaccion['DESCRIPCION'];
			$this->ID_USUARIO     = $this->session->userdata('id');
			$this->db->insert('transaccion', $this);
		}
	}

	public function update($transaccion=null)
	{
		if ($transaccion!=null) {
			$this->ID_TRANSACCION   = $transaccion['ID_TRANSACCION'];
			$this->ID_CONCEPTO   = $transaccion['ID_CONCEPTO'];
			$this->VALOR       = $transaccion['VALOR'];
			$this->FECHA        = $transaccion['FECHA'];
			$this->DESCRIPCION = $transaccion['DESCRIPCION'];
			$this->ID_USUARIO  = $this->session->userdata('id');
			$this->db->where('ID_TRANSACCION', $this->ID_TRANSACCION);
			$this->db->update('transaccion', $this);
		}
	}

	public function delete($id='')
	{
		if ($id!='') {
			$this->ID_TRANSACCION = $id;
			$this->db->where('ID_TRANSACCION', $this->ID_TRANSACCION);
			$this->db->delete('transaccion');
		}
	}

	public function UltimaVez(){
		$result = $this->db->query("SELECT FECHA FROM transaccion WHERE TIPO='Sex' ORDER BY FECHA DESC LIMIT 1");
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return null;
		} 
	}

	public function PrimeraVez(){
		$result = $this->db->query("SELECT FECHA FROM transaccion  WHERE TIPO='Sex' ORDER BY FECHA ASC LIMIT 1");
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return null;
		} 
	}

	public function TotalSex(){
		$result = $this->db->query("SELECT count(*) AS TOTAL FROM transaccion WHERE TIPO='Sex'");
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return null;
		} 
	}

	public function Total69(){
		$result = $this->db->query("SELECT count(*) AS TOTAL FROM transaccion WHERE TIPO='69' ");
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return null;
		} 
	}

	public function TotalOralEl(){
		$result = $this->db->query("SELECT count(*) AS TOTAL FROM transaccion WHERE TIPO='El'");
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return null;
		} 
	}

	public function TotalOralElla(){
		$result = $this->db->query("SELECT count(*) AS TOTAL FROM transaccion WHERE TIPO='Ella'");
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return null;
		} 
	}

	public function UltimoAndres(){
		$result = $this->db->query("SELECT FECHA FROM transaccion  WHERE TIPO='Andres' ORDER BY FECHA DESC LIMIT 1");
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return null;
		} 
	}

	public function ProximoAndres(){
		$result = $this->db->query("SELECT   DATE_ADD(FECHA, INTERVAL 28 DAY) AS NEXT FROM transaccion  WHERE TIPO='Andres' ORDER BY FECHA DESC LIMIT 1");
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return null;
		} 
	}

	public function ProximaInyeccion(){
		$result = $this->db->query("SELECT   DATE_ADD(FECHA, INTERVAL 30 DAY) AS NEXT FROM transaccion  WHERE TIPO='Inyeccion' ORDER BY FECHA DESC LIMIT 1");
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return null;
		} 
	}


}
?>