<?php 

class User extends CI_Model
{
	

	public function getUser ($user ='')
	{

		$result=$this->db->query("SELECT * FROM usuarios WHERE (USER='{$user}' OR EMAIL='{$user}')  ");
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return null;
		} 

	}


}
?>