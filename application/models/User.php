<?php 

class User extends CI_Model
{
	
	public  $ID;
	public  $USER;
	public  $PASS;
	public  $EMAIL;
	public  $NOMBRES;
	public  $P_APELLIDO;
	public  $S_APELLIDO;
	public  $INICIO_MES;
	public  $FIN_MES;

	public function getUser ($user ='')
	{

		$result=$this->db->query("SELECT * FROM usuarios WHERE (USER='{$user}' OR EMAIL='{$user}')  ");
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return null;
		} 

	}
	public function check()
	{
		if (!$this->session->userdata('login')) {
			header("Location:" . base_url());
		}
	}

	public function add()
	{
		$this->db->insert('usuarios', $this);
	}

	public function update()
	{

		$this->db->where('ID', $this->ID); 
		$this->db->update('usuarios', $this);
	}

	public function delete()
	{
		$this->db->where('ID', $this->ID);
		$this->db->delete('usuarios');
	}




}
?>