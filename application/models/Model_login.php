<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

	public function cek_login($email, $password)
	{
		$this->db->from('tb_user');
		// $this->db->where('email', $email);
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		return $this->db->get();
		
		
		
	}

}

/* End of file Model_login.php */


?>
