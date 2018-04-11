<?php class Alta_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	
	public function insertaDoc($documento){

		return $this->db->insert("documento", $documento);

	}

	public function modificaDocumento($datos, $id){
		//update TABLA set DATOS where ID =?
		$this->db->where('idDoc', $id);
		$this->db->update('documento', $datos);

		return TRUE;
	}

	public function insertaUser($user){

		return $this->db->insert("user", $user);

	}

	public function modificaUser($datos, $id){
		$this->db->where('idUser', $id);
		$this->db->update('user', $datos);

		return TRUE;
	}
	

	
}