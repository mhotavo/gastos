<?php 

class Evento extends CI_Model
{
	
	public $ID_EVENTO;
	public $LUGAR;
	public $TIPO;
	public $DESCRIPCION;
	public $FECHA;
	public $USUARIOLOG;

	public function get_evento($id='')
	{
		$this->ID_EVENTO=$id;
		$this->db->where('ID_EVENTO', $this->ID_EVENTO);
		$query = $this->db->get('evento');
		return $query->result();
	}

	public function get_all()
	{
		$query = $this->db->query('SELECT * FROM evento ORDER BY FECHA ASC');
		return $query->result();
	}

	public function add($evento=null)
	{
		if ($evento!=null) {
			$this->LUGAR       = $_POST['lugar'];
			$this->TIPO        = $_POST['tipo'];
			$this->DESCRIPCION = $_POST['descripcion'];
			$this->FECHA = $_POST['fecha'];
			$this->USUARIOLOG     = $this->session->userdata('id');
			$this->db->insert('evento', $this);
		}
	}

	public function update($evento=null)
	{
		if ($evento!=null) {
			$this->ID_EVENTO   = $evento['id'];
			$this->LUGAR       = $evento['lugar'];
			$this->TIPO        = $evento['tipo'];
			$this->DESCRIPCION = $evento['descripcion'];
			$this->FECHA       = $evento['fecha'];
			$this->USUARIOLOG  = $this->session->userdata('id');
			$this->db->where('ID_EVENTO', $this->ID_EVENTO);
			$this->db->update('evento', $this);
		}
	}

	public function delete($id='')
	{
		if ($id!='') {
			$this->ID_EVENTO = $id;
			$this->db->where('ID_EVENTO', $this->ID_EVENTO);
			$this->db->delete('evento');
		}
	}

	public function UltimaVez(){
		$result = $this->db->query("SELECT FECHA FROM evento WHERE TIPO='Sex' ORDER BY FECHA DESC LIMIT 1");
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return null;
		} 
	}

	public function PrimeraVez(){
		$result = $this->db->query("SELECT FECHA FROM evento  WHERE TIPO='Sex' ORDER BY FECHA ASC LIMIT 1");
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return null;
		} 
	}

	public function TotalSex(){
		$result = $this->db->query("SELECT count(*) AS TOTAL FROM evento WHERE TIPO='Sex'");
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return null;
		} 
	}

	public function Total69(){
		$result = $this->db->query("SELECT count(*) AS TOTAL FROM evento WHERE TIPO='69' ");
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return null;
		} 
	}

	public function TotalOralEl(){
		$result = $this->db->query("SELECT count(*) AS TOTAL FROM evento WHERE TIPO='El'");
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return null;
		} 
	}

	public function TotalOralElla(){
		$result = $this->db->query("SELECT count(*) AS TOTAL FROM evento WHERE TIPO='Ella'");
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return null;
		} 
	}

	public function UltimoAndres(){
		$result = $this->db->query("SELECT FECHA FROM evento  WHERE TIPO='Andres' ORDER BY FECHA DESC LIMIT 1");
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return null;
		} 
	}

	public function ProximoAndres(){
		$result = $this->db->query("SELECT   DATE_ADD(FECHA, INTERVAL 28 DAY) AS NEXT FROM evento  WHERE TIPO='Andres' ORDER BY FECHA DESC LIMIT 1");
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return null;
		} 
	}

	public function ProximaInyeccion(){
		$result = $this->db->query("SELECT   DATE_ADD(FECHA, INTERVAL 30 DAY) AS NEXT FROM evento  WHERE TIPO='Inyeccion' ORDER BY FECHA DESC LIMIT 1");
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return null;
		} 
	}


}
?>