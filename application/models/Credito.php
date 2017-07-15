<?php 

class Credito extends CI_Model
{
	
	public $ID;
	public $CREDITO;
	public $SALDO;
	public $FECHA_VEN;
	public $TOTAL_CUOTAS;
	public $CUOTAS_PAGAS;
	public $INTERES;

	public function ver($id='')
	{
		$this->ID=$id;
		$this->db->where('ID', $this->ID);
		$query = $this->db->get('creditos');
		return $query->result();
	}

	public function index()
	{
		$query = $this->db->query('SELECT * FROM creditos ORDER BY CREDITO ASC'); 
		return $query->result();
	} 

	public function ingresos()
	{
		$query = $this->db->query('SELECT * FROM creditos WHERE TIPO="I" ORDER BY CONCEPTO ASC'); 
		return $query->result();
	} 

	public function gastos()
	{
		$query = $this->db->query('SELECT * FROM creditos WHERE TIPO="G" ORDER BY CONCEPTO ASC'); 
		return $query->result();
	} 


	public function add($credito=null)
	{
		if ($credito!=null) {
			$this->CREDITO      = $credito['CREDITO'];
			$this->SALDO        = $credito['SALDO'];
			$this->FECHA_VEN    = $credito['FECHA_VEN'];
			$this->TOTAL_CUOTAS = $credito['TOTAL_CUOTAS'];
			$this->CUOTAS_PAGAS = $credito['CUOTAS_PAGAS'];
			$this->INTERES      = $credito['INTERES'];
			$this->db->insert('creditos', $this);
		}
	}

	public function update($credito=null)
	{
		if ($credito!=null) {
			$this->ID           = $credito['ID'];
			$this->CREDITO      = $credito['CREDITO'];
			$this->SALDO        = $credito['SALDO'];
			$this->FECHA_VEN    = $credito['FECHA_VEN'];
			$this->TOTAL_CUOTAS = $credito['TOTAL_CUOTAS'];
			$this->CUOTAS_PAGAS = $credito['CUOTAS_PAGAS'];
			$this->INTERES      = $credito['INTERES'];
			$this->db->where('ID', $this->ID); 
			$this->db->update('creditos', $this);
		}
	}

	public function delete($id='')
	{
		if ($id!='') {
			$this->ID = $id;
			$this->db->where('ID', $this->ID);
			$this->db->delete('creditos');
		}
	}

	public function updateSaldo($credito=null, $action='')
	{
		$fecha= date("Y-m-d");
		if ($action=='add') {
			$this->ID   = $credito['ID_CREDITO'];
			$query = $this->db->query('
				UPDATE creditos 
				SET SALDO=(SALDO-'.$credito['VALOR'].') ,
				TOTAL_CUOTAS=(TOTAL_CUOTAS-1),
				CUOTAS_PAGAS=(CUOTAS_PAGAS+1),
				ULTIMO_PAGO="'.$fecha.'"
				WHERE ID='.$this->ID.' '); 
		} elseif ($action=='update') {
			$this->ID   = $credito['ID_CREDITO'];
			$query = $this->db->query('
				UPDATE creditos 
				SET SALDO=(SALDO+'.$credito['SALDO_ANTERIOR'].') ,
				TOTAL_CUOTAS=(TOTAL_CUOTAS+1),
				CUOTAS_PAGAS=(CUOTAS_PAGAS-1),
				ULTIMO_PAGO="'.$fecha.'"
				WHERE ID='.$this->ID.' '); 
		}
	}



}
?>