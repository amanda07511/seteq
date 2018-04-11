<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Usuario_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function login($email){

		$cmd = "SELECT * FROM user WHERE email like binary '$email'";
		$query = $this->db->query($cmd);
		return ($query->num_rows() == 1) ? $query->row() : NULL;

	}

}