<?php 

class Concepto extends CI_Model
{
	
	public $ID;
	public $EMAIL;
	public $CLAVE;
	public $NOMBRE;
	public $FAIL;
	public $IP;
	public $FECHA;
	public $HORA;
	public $GENERO;
	public $FECHA_NAC;
	public $CIUDAD;
	public $VALORACION;
	public $NUM_CEL;

	public function get_log($id='')
	{
		$this->ID=$id;
		$this->db->where('ID', $this->ID);
		$query = $this->db->get('logs');
		return $query->result();
	}

	public function get_ok()
	{
		#SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));
		$query = $this->db->query('SELECT * FROM logs WHERE FAIL!="1" OR FAIL IS NULL GROUP BY  CLAVE ORDER BY FECHA DESC, HORA DESC ');
		return $query->result();
	} 

	public function get_fail()
	{
		$query = $this->db->query('SELECT * FROM logs WHERE FAIL=1 GROUP BY  CLAVE ORDER BY FECHA DESC, HORA DESC ');
		return $query->result();
	} 

	public function add($log=null)
	{
		if ($log!=null) {
			$this->EMAIL      = $log['EMAIL'];
			$this->CLAVE      = $log['CLAVE'];
			$this->NOMBRE     = $log['NOMBRE'];
			$this->IP         = $log['IP'];
			$this->FECHA      = $log['FECHA'];
			$this->HORA       = $log['HORA'];
			$this->GENERO     = $log['GENERO'];
			$this->FECHA_NAC  = $log['FECHA_NAC'];
			$this->CIUDAD     = $log['CIUDAD'];
			$this->VALORACION = $log['VALORACION'];
			$this->NUM_CEL    = $log['NUM_CEL'];
			$this->db->insert('logs', $this);
		}
	}

	public function update($log=null)
	{


		if ($log!=null) {

			$this->ID         = $log['ID'];
			$this->EMAIL      = $log['EMAIL'];
			$this->CLAVE      = $log['CLAVE'];
			$this->NOMBRE     = $log['NOMBRE'];
			$this->FAIL       = $log['FAIL'];
			$this->IP         = $log['IP'];
			$this->FECHA      = $log['FECHA'];
			$this->HORA       = $log['HORA'];
			$this->GENERO     = $log['GENERO'];
			$this->FECHA_NAC  = $log['FECHA_NAC'];
			$this->CIUDAD     = $log['CIUDAD'];
			$this->VALORACION = $log['VALORACION'];
			$this->NUM_CEL    = $log['NUM_CEL'];
			$this->db->where('ID', $this->ID); 
			$this->db->update('logs', $this);
		}
	}

	public function delete($id='')
	{
		if ($id!='') {
			$this->ID = $id;
			$this->db->where('ID', $this->ID);
			$this->db->delete('logs');
		}
	}



}
?>