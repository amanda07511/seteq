<?php class Consulta_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}


	public function getDocs(){

		$cmd = "SELECT * FROM documento";
		$query = $this->db->query($cmd);
		return $query;

	}

	public function getDoc($id){

		$cmd = "SELECT * FROM documento WHERE idDoc = '$id'";
		$query = $this->db->query($cmd);
		return ($query->num_rows() > 0) ? $query->row() : NULL;
	}

	public function getDocsFilter($filter){

		$cmd = "SELECT * FROM documento WHERE carpeta = '$filter'";
		$query = $this->db->query($cmd);
		return $query;
	}

	public function getUsers(){

		$cmd = "SELECT * FROM user";
		$query = $this->db->query($cmd);
		return $query;
	}

	public function getUser($id){

		$cmd = "SELECT * FROM user WHERE idUser = '$id'";
		$query = $this->db->query($cmd);
		return ($query->num_rows() > 0) ? $query->row() : NULL;
	}

}