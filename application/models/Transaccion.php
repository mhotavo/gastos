<?php 

class Transaccion extends CI_Model
{
	
	public $ID_TRANSACCION;
	public $ID_CONCEPTO;
	public $ID_CREDITO;
	public $VALOR;
	public $FECHA;
	public $DESCRIPCION;
	public $ID_USUARIO;


	public function ver($id='')
	{
		$this->ID_TRANSACCION=$id;  
		$query = $this->db->query('SELECT * FROM transaccion t LEFT JOIN conceptos c ON (t.ID_CONCEPTO=c.ID_CONCEPTO) WHERE ID_TRANSACCION="'.$this->ID_TRANSACCION.'" ORDER BY FECHA DESC'); 
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
			$this->ID_CONCEPTO = $transaccion['ID_CONCEPTO'];
			$this->ID_CREDITO  = $transaccion['ID_CREDITO'];
			$this->VALOR       = $transaccion['VALOR'];
			$this->FECHA       = $transaccion['FECHA'];
			$this->DESCRIPCION = $transaccion['DESCRIPCION'];
			$this->ID_USUARIO  = $this->session->userdata('id');
			$this->db->insert('transaccion', $this);
		}
	}

	public function update($transaccion=null)
	{
		if ($transaccion!=null) {
			$this->ID_TRANSACCION = $transaccion['ID_TRANSACCION'];
			$this->ID_CONCEPTO    = $transaccion['ID_CONCEPTO'];
			$this->ID_CREDITO     = $transaccion['ID_CREDITO'];
			$this->VALOR          = $transaccion['VALOR'];
			$this->FECHA          = $transaccion['FECHA'];
			$this->DESCRIPCION    = $transaccion['DESCRIPCION'];
			$this->ID_USUARIO     = $this->session->userdata('id');
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



	public function sumaGastos($inicio, $fin){
		$result = $this->db->query("SELECT SUM(t.VALOR) AS TOTAL FROM transaccion t LEFT JOIN conceptos c ON (t.ID_CONCEPTO=c.ID_CONCEPTO) WHERE c.TIPO='G'  AND FECHA BETWEEN '$inicio' AND '$fin'");
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return null;
		} 
	}

	public function sumaIngresos($inicio, $fin){
		$sql="SELECT SUM(t.VALOR) AS TOTAL  FROM transaccion t LEFT JOIN conceptos c ON (t.ID_CONCEPTO=c.ID_CONCEPTO) WHERE c.TIPO='I'  AND FECHA BETWEEN '$inicio' AND '$fin'";
		$result = $this->db->query($sql);
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return null;
		} 
	}

	public function mensuales($inicio, $fin, $tipo){
		$query = $this->db->query("SELECT *  FROM transaccion t LEFT JOIN conceptos c ON (t.ID_CONCEPTO=c.ID_CONCEPTO) WHERE c.TIPO='$tipo' AND FECHA BETWEEN '$inicio' AND '$fin' ORDER BY t.FECHA DESC, c.CONCEPTO DESC");
		return $query->result();
	}	

	public function mensualConsolidado($inicio, $fin, $tipo){
		$query = $this->db->query("SELECT *, SUM(t.VALOR) AS TOTAL FROM transaccion t LEFT JOIN conceptos c ON (t.ID_CONCEPTO=c.ID_CONCEPTO) WHERE c.TIPO='$tipo' AND FECHA BETWEEN '$inicio' AND '$fin'  GROUP BY c.CONCEPTO ORDER BY c.CONCEPTO ASC");
		return $query->result();
	}


}
?>